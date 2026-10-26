<?php

namespace Tests\Feature;

use App\Services\SakhashreeIntentRouter;
use App\Services\SakhashreeKnowledgeService;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Http;
use Mockery;
use Tests\TestCase;

class SakhashreeChatbotFlowTest extends TestCase
{
    public function test_basic_conversation_returns_without_searching_website_content(): void
    {
        $router = Mockery::mock(SakhashreeIntentRouter::class);
        $router->shouldReceive('route')
            ->once()
            ->with('Hi', [], '')
            ->andReturn([
                'intent' => 'conversation',
                'answer' => 'Hi! I’m Sakhashree AI Guide. How can I help you explore our offerings?',
                'search_query' => '',
                'conversation_summary' => '',
                'conversation_ending' => false,
            ]);

        $knowledge = Mockery::mock(SakhashreeKnowledgeService::class);
        $knowledge->shouldNotReceive('search');

        $this->app->instance(SakhashreeIntentRouter::class, $router);
        $this->app->instance(SakhashreeKnowledgeService::class, $knowledge);

        $this->postJson('/ai-guide/chat', ['message' => 'Hi'])
            ->assertOk()
            ->assertJsonPath('decision', 'conversation')
            ->assertJsonPath('sources', [])
            ->assertJsonPath('message', 'Hi! I’m Sakhashree AI Guide. How can I help you explore our offerings?');
    }

    public function test_contextual_consultation_query_and_selected_sources_reach_final_answer(): void
    {
        config(['services.openai.key' => 'test-api-key']);

        $history = [
            ['role' => 'user', 'content' => 'We have tried five times; each time it is a baby girl. How can chakra healing help us?'],
            ['role' => 'assistant', 'content' => 'What matters most to you about it right now?'],
        ];
        $summary = 'Visitor asks whether chakra healing may provide spiritual support for a personal family concern.';
        $searchQuery = 'Whether documented Sakhashree chakra-healing or spiritual consultation offerings can support emotional wellbeing around the visitor’s concern about conceiving a baby boy; no sex-selection or medical-treatment claims.';

        $router = Mockery::mock(SakhashreeIntentRouter::class);
        $router->shouldReceive('route')
            ->once()
            ->with('Baby boy', Mockery::on(function (array $actual) use ($history): bool {
                return $actual === $history;
            }), $summary)
            ->andReturn([
                'intent' => 'consultation',
                'answer' => '',
                'search_query' => $searchQuery,
                'conversation_summary' => $summary,
                'conversation_ending' => false,
            ]);

        $source = [
            'type' => 'Service',
            'title' => 'Chakra Yoga',
            'content' => 'Documented information about chakra yoga sessions and spiritual practice.',
            'url' => 'https://sakhashree.epuratech.com/discover_chakra_yog',
        ];

        $knowledge = Mockery::mock(SakhashreeKnowledgeService::class);
        $knowledge->shouldReceive('search')->once()->with($searchQuery, 7)->andReturn([$source]);
        $knowledge->shouldReceive('formatContext')->once()->with([$source])->andReturn('Documented chakra yoga information.');
        $knowledge->shouldReceive('publicSources')->once()->with([$source])->andReturn([
            ['title' => 'Chakra Yoga', 'url' => $source['url'], 'type' => 'Service'],
        ]);

        $this->app->instance(SakhashreeIntentRouter::class, $router);
        $this->app->instance(SakhashreeKnowledgeService::class, $knowledge);

        Http::fake([
            'https://api.openai.com/v1/chat/completions' => Http::response([
                'choices' => [[
                    'message' => [
                        'content' => json_encode([
                            'answer' => 'I understand this is important to you. Chakra healing cannot determine or guarantee a baby’s sex. If you are interested in spiritual reflection or emotional support, I can explain our documented chakra-yoga offering; for fertility questions, please speak with a qualified healthcare professional.',
                            'source_indices' => [1],
                        ]),
                    ],
                ]],
            ], 200),
        ]);

        $this->postJson('/ai-guide/chat', [
            'message' => 'Baby boy',
            'history' => $history,
            'conversation_summary' => $summary,
        ])
            ->assertOk()
            ->assertJsonPath('decision', 'consultation')
            ->assertJsonPath('conversation_summary', $summary)
            ->assertJsonPath('sources.0.title', 'Chakra Yoga');

        Http::assertSent(function (ClientRequest $request): bool {
            $payload = $request->data();
            $messages = $payload['messages'] ?? [];

            return ($payload['response_format']['type'] ?? '') === 'json_object'
                && count($messages) === 4
                && str_contains($messages[0]['content'] ?? '', 'Conversation summary: Visitor asks whether chakra healing may provide spiritual support')
                && ($messages[1]['content'] ?? '') === 'We have tried five times; each time it is a baby girl. How can chakra healing help us?'
                && ($messages[2]['content'] ?? '') === 'What matters most to you about it right now?'
                && ($messages[3]['content'] ?? '') === 'Baby boy';
        });
    }
}

<?php

namespace Tests\Unit;

use App\Services\SakhashreeIntentRouter;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SakhashreeIntentRouterTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.openai.key' => 'test-api-key',
            'services.openai.chat_model' => 'gpt-4o-mini',
            'services.openai.intent_model' => 'gpt-4o-mini',
        ]);
    }

    public function test_short_follow_up_is_routed_with_history_and_summary(): void
    {
        Http::fake([
            'https://api.openai.com/v1/chat/completions' => Http::response([
                'choices' => [[
                    'message' => [
                        'content' => json_encode([
                            'intent' => 'consultation',
                            'answer' => '',
                            'search_query' => 'Visitor asks whether Sakhashree chakra-healing or spiritual consultation offerings can support emotional wellbeing around their concern about conceiving a baby boy; do not imply sex selection or medical treatment.',
                            'conversation_summary' => 'Visitor is exploring whether chakra healing may offer spiritual support for a personal family concern.',
                            'conversation_ending' => false,
                        ]),
                    ],
                ]],
            ], 200),
        ]);

        $history = [
            ['role' => 'user', 'content' => 'We have tried five times; each time it is a baby girl. How can chakra healing help us?'],
            ['role' => 'assistant', 'content' => 'What matters most to you about it right now?'],
        ];

        $result = app(SakhashreeIntentRouter::class)->route(
            'Baby boy',
            $history,
            'Visitor asked whether chakra healing can help with a personal family concern.'
        );

        $this->assertSame('consultation', $result['intent']);
        $this->assertStringContainsString('chakra-healing', $result['search_query']);
        $this->assertStringContainsString('spiritual support', $result['conversation_summary']);
        $this->assertFalse($result['conversation_ending']);

        Http::assertSent(function (ClientRequest $request): bool {
            $payload = $request->data();
            $messages = $payload['messages'] ?? [];

            return count($messages) === 4
                && str_contains($messages[0]['content'] ?? '', 'Existing conversation summary')
                && ($messages[1]['content'] ?? '') === 'We have tried five times; each time it is a baby girl. How can chakra healing help us?'
                && ($messages[2]['content'] ?? '') === 'What matters most to you about it right now?'
                && ($messages[3]['content'] ?? '') === 'Baby boy'
                && ($payload['response_format']['type'] ?? '') === 'json_object';
        });
    }

    public function test_basic_conversation_does_not_require_retrieval_query(): void
    {
        Http::fake([
            'https://api.openai.com/v1/chat/completions' => Http::response([
                'choices' => [[
                    'message' => [
                        'content' => json_encode([
                            'intent' => 'conversation',
                            'answer' => 'Hi! I’m Sakhashree AI Guide. I can help you explore our documented spiritual offerings and resources.',
                            'search_query' => '',
                            'conversation_summary' => '',
                            'conversation_ending' => false,
                        ]),
                    ],
                ]],
            ], 200),
        ]);

        $result = app(SakhashreeIntentRouter::class)->route('Hi');

        $this->assertSame('conversation', $result['intent']);
        $this->assertSame('', $result['search_query']);
        $this->assertStringContainsString('Sakhashree AI Guide', $result['answer']);
        Http::assertSentCount(1);
    }

    public function test_brief_acknowledgement_does_not_erase_existing_conversation_summary(): void
    {
        Http::fake([
            'https://api.openai.com/v1/chat/completions' => Http::response([
                'choices' => [[
                    'message' => [
                        'content' => json_encode([
                            'intent' => 'conversation',
                            'answer' => 'You’re welcome!',
                            'search_query' => '',
                            'conversation_summary' => '',
                            'conversation_ending' => false,
                        ]),
                    ],
                ]],
            ], 200),
        ]);

        $summary = 'Visitor is comparing documented RRCT consultation options and has not yet asked about pricing.';
        $result = app(SakhashreeIntentRouter::class)->route(
            'Thanks',
            [['role' => 'user', 'content' => 'Tell me about RRCT consultations.']],
            $summary
        );

        $this->assertSame($summary, $result['conversation_summary']);
        $this->assertFalse($result['conversation_ending']);
    }

    public function test_goodbye_clears_the_conversation_summary(): void
    {
        Http::fake([
            'https://api.openai.com/v1/chat/completions' => Http::response([
                'choices' => [[
                    'message' => [
                        'content' => json_encode([
                            'intent' => 'conversation',
                            'answer' => 'Goodbye! Take care, and you’re welcome to return whenever you need information about Sakhashree.',
                            'search_query' => '',
                            'conversation_summary' => '',
                            'conversation_ending' => true,
                        ]),
                    ],
                ]],
            ], 200),
        ]);

        $result = app(SakhashreeIntentRouter::class)->route(
            'Bye',
            [['role' => 'user', 'content' => 'I was asking about RRCT.']],
            'Visitor was exploring RRCT information.'
        );

        $this->assertTrue($result['conversation_ending']);
        $this->assertSame('', $result['conversation_summary']);
    }
}

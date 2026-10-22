# Sakhashree AI Guide — root data.json integration patch

This patch installs the chatbot integration into the supplied original Sakhashree Laravel source and uses the content team's root-level `data.json`. No crawler is included or needed.

## Added
- `app/Http/Controllers/SakhashreeChatbotController.php` — validates chat requests and calls OpenAI server-side.
- `app/Services/SakhashreeKnowledgeService.php` — reads `base_path('data.json')`, performs weighted keyword matching, and returns source links.
- `resources/views/partials/frontend/ai-guide-widget.blade.php` — chakra-inspired frontend widget.
- `SAKHASHREE_AI_GUIDE_SETUP.md` — setup and deployment notes.
- `CHATBOT_CHANGES_MANIFEST.md` — this file.

## Updated
- `.env.example` — adds empty OpenAI environment placeholders.
- `.htaccess` — denies direct HTTP access to `/data.json` if the Laravel project root is the web document root.
- `config/services.php` — adds server-side OpenAI configuration.
- `resources/views/layouts/frontend.blade.php` — includes the chatbot on the homepage and adds the CSRF meta tag.
- `routes/web.php` — registers the chatbot endpoint with rate limiting.

## Not included
The website/content team must supply `data.json` at the Laravel project root beside `artisan` and `composer.json`. It is intentionally not a placeholder in this patch. Do not put it in `public/`. The real `.env` and API credentials are not included.

Test on staging first and verify the incoming JSON schema, relevant source URLs, and answer quality before production deployment.

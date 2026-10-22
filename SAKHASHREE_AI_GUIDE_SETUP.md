# Sakhashree AI Guide — Phase 1 setup

The chatbot reads the root-level `data.json` supplied by the website/content team. It does not crawl the site at runtime and it does not query the Laravel database for chatbot knowledge.

## Request flow

1. A visitor submits a question in the homepage widget.
2. Laravel reads `<project-root>/data.json` via `base_path('data.json')`.
3. `SakhashreeKnowledgeService` applies keyword matching to prebuilt `chunks` or page records and ranks relevant content.
4. The controller sends only the top matches to OpenAI from the server.
5. The visitor receives the generated answer plus official source-page links.

## Expected `data.json` format

Preferred format:

```json
{
  "site": "https://sakhashree.epuratech.com/",
  "generated_at": "2026-10-22T00:00:00Z",
  "pages": [
    {
      "url": "https://sakhashree.epuratech.com/about-me",
      "title": "About Sakhashree",
      "headings": ["About Sakhashree"],
      "content": "Full searchable page text..."
    }
  ]
}
```

The retrieval service also supports prebuilt top-level `chunks`, a top-level `documents` or `data` list, a top-level list of page records, and chunks nested within page records. Page records should include an official absolute `url` (or `source_url`/`link`), a title, and searchable text in fields such as `content`, `text`, `body`, `page_content`, `description`, or `excerpt`. Prebuilt chunks should include `source_url` (or `url`), `title`, and `text` (or `content`).

**Important:** the incoming data file has not been provided as part of this patch. Put the other developer's approved `data.json` at the same level as `artisan`, `composer.json`, and `routes/`. Do not put it in `public/`. The code has a safe fallback if the file is missing, invalid, or has no usable records. The service currently imposes a 20 MB file-size limit to avoid excessive memory usage on shared hosting.

## OpenAI configuration

Set these values in the server-side `.env` only:

```dotenv
OPENAI_API_KEY=your_new_rotated_key
OPENAI_CHAT_MODEL=gpt-4o-mini
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-real-domain.example
```

Never put the API key in the widget JavaScript, `data.json`, GitHub, or any public file. If a key was previously exposed, revoke it and use a new one. Do not replace or regenerate the production `APP_KEY` as part of this change.

## Deployment checklist

1. Back up the existing application and database; test on staging first.
2. Apply the patch and add the supplied root-level `data.json`.
3. Confirm the root `.htaccess` denies direct HTTP access to `/data.json`, and verify the hosting document root is configured safely (preferably Laravel's `public/` directory).
4. Confirm the hosting PHP version and extensions match the application's `composer.json`.
5. If SSH/terminal access is available, run `php artisan config:clear` and then `php artisan config:cache` from the project root.
6. Test the homepage widget, API request, rate limiting, source links, and several known questions. Check Laravel logs privately if a request fails.
7. Review actual JSON field names and test relevance before enabling it for public visitors.

## Phase 1 boundaries

No live database retrieval, scraping, video analysis, booking/enquiry submission, payment, live availability, or human handoff is implemented. Spiritual/chakra content is not medical diagnosis or treatment.

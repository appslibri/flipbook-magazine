# Repository Guidelines

## Project Structure & Module Organization
- Multiple plugin variants live at the root as `flipbook-*` (e.g., `flipbook-kutis`).
- Inside each variant:
  - `flipbook.php` — plugin bootstrap (menus, shortcode, hooks).
  - `app/` — PHP classes (`class-flipbook-*.php`) in MVC style (controller, model, view, helpers).
  - `data/` — static assets and demos: `javascript/`, `style/`, `files/`, sample HTML.
  - `images/` — icons and plugin assets.
  - `Licensing/` — third-party licenses/attributions (when present).

## Build, Test, and Development Commands
- No build step required. Run inside a WordPress site.
- Install one variant:
  - Copy/symlink a folder (e.g., `flipbook-kutis`) to `wp-content/plugins/flipbook-kutis`.
  - Activate with WP-CLI: `wp plugin activate flipbook-kutis` or via WP Admin.
- Linting (optional if WPCS/PHPCS is available):
  - `vendor/bin/phpcs --standard=WordPress flipbook-*/app`

## Coding Style & Naming Conventions
- WordPress Coding Standards (WPCS): tabs for indentation; Yoda conditions where appropriate; escape on output.
- PHP in `app/` uses hyphenated filenames: `class-flipbook-<component>.php`.
- Classes: `FlipBook_<Component>`; functions: snake_case; keep lines ≤ 120 chars; prefer early returns.
- Avoid global state except where required for WP hooks/filters.

## Testing Guidelines
- No bundled automated tests. If adding tests, use WP PHPUnit.
- Suggested layout: `tests/app/test-flipbook-<component>.php` mirroring source paths.
- Manual verification:
  - Activate the plugin, add `[flipbook id="123"]` to a page, and confirm rendering.
  - Verify admin pages load and actions respect nonces/capabilities.

## Commit & Pull Request Guidelines
- Commits: imperative, scoped, and focused (e.g., "Fix shortcode output escaping").
- PRs should include:
  - Summary, rationale, affected variant (e.g., `flipbook-kutis/`), and test steps.
  - Screenshots/GIFs for UI changes and links to related issues.

## Security & Configuration Tips
- Sanitize inputs (`sanitize_text_field`, `intval`) and escape outputs (`esc_html`, `esc_attr`).
- Protect admin actions with nonces (`wp_nonce_field`, `check_admin_referer`) and capability checks.
- Use WP helpers for paths/URLs (`plugins_url`, `plugin_dir_path`); avoid direct file access.

## Agent-Specific Notes
- Change only the intended `flipbook-*` folder; keep patterns consistent across variants.
- Do not rename or reorganize top-level folders without explicit approval.

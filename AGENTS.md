# Repository Guidelines

## Project Structure & Module Organization
Plugin variants live at the root as `flipbook-*` directories. Each contains `flipbook.php` for bootstrap logic, `app/` for MVC-style PHP classes (`class-flipbook-<component>.php`), `data/` for sample assets (`javascript/`, `style/`, `files/`), `images/` for icons, and `Licensing/` when third-party notices are required. Keep changes isolated to the relevant variant and mirror cross-cutting fixes manually across siblings.

## Build, Test, and Development Commands
No build step is required; run a variant inside a WordPress install. Copy or symlink a folder into `wp-content/plugins/<variant>` and activate it: `wp plugin activate flipbook-kutis`. Use WP-CLI for quick enable/disable cycles while iterating. When PHPCS is available, lint with `vendor/bin/phpcs --standard=WordPress flipbook-*/app` before opening a pull request.

## Coding Style & Naming Conventions
Follow WordPress Coding Standards: tabs for indentation, snake_case functions, and Yoda comparisons. File names in `app/` stay hyphenated, while classes use the `FlipBook_<Component>` prefix. Escape every output (`esc_html`, `esc_attr`, `wp_kses_post`) and sanitize input (`sanitize_text_field`, `intval`) at entry points. Keep lines under 120 characters, stick to early returns, and avoid introducing global state beyond WordPress hooks.

## Testing Guidelines
There is no bundled automation. If you add PHPUnit tests, mirror the source tree under `tests/app/test-flipbook-<component>.php`. Manual checks remain mandatory: activate the plugin, embed `[flipbook id="123"]` on a page, verify assets load from `data/`, and confirm admin forms honor nonces and capability checks. Test any uploads or downloads touched by your change set.

## Commit & Pull Request Guidelines
Write imperative, focused commits (e.g., `Fix shortcode output escaping`). Every PR should call out the affected plugin variant, summarize the change, list manual/automated test steps, and link issues. Provide screenshots or GIFs for UI-facing adjustments, especially when altering icons, viewer chrome, or sample demos.

## Security & Configuration Tips
Use WordPress helpers for paths/URLs (`plugin_dir_path`, `plugins_url`) instead of hardcoded locations. Guard privileged actions with `current_user_can` and nonce pairs (`wp_nonce_field`, `check_admin_referer`). Assume only the plugin directory is writable and omit secrets from the repo.

## Agent-Specific Notes
Modify only the requested `flipbook-*` folder unless explicitly told otherwise. Preserve the shared structure, keep shortcode names and hooks in sync across variants, and note any manual verification steps you could not perform.

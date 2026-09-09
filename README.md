# ISEET WordPress Child Theme

<p>
  <img src="https://img.shields.io/badge/WordPress-Child%20Theme-21759B?style=flat-square&logo=wordpress&logoColor=white" alt="WordPress child theme">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Accessibility-WCAG%202.1%20AA-8B5CF6?style=flat-square" alt="WCAG 2.1 AA">
  <img src="https://img.shields.io/badge/Core%20Web%20Vitals-optimized-brightgreen?style=flat-square" alt="Core Web Vitals optimized">
</p>

A WordPress child theme built on **Twenty Twenty-Four**, focused on the exact things a front-end WordPress role needs: accessible UI components, responsive layout, Core Web Vitals optimization, and a small REST API powered feature.

---

## What's in it

### Accessibility (WCAG 2.1)
- A skip-to-content link, hidden until keyboard-focused (WCAG 2.4.1 — Bypass Blocks)
- Visible, high-contrast `:focus-visible` outlines on links, buttons, and form fields (WCAG 2.4.7)
- Raised text color contrast on muted/secondary text from a failing ~3.9:1 to 7:1, passing WCAG AAA
- Accessible `role="list"` / `role="listitem"` markup on the dynamic posts grid, with an `aria-label`

### Responsive layout
- A 3 → 2 → 1 column CSS grid for the "Latest Posts" component, breakpointed for tablet and mobile
- Fixed-aspect-ratio images (`aspect-ratio: 16/9`) so cards never distort at any width

### Core Web Vitals
- **CLS (layout shift):** post thumbnails get explicit `width`/`height` attributes added automatically, and the site logo is capped so it can't push content around while loading
- **LCP (largest contentful paint):** the first image on a page is marked `loading="eager"` and `fetchpriority="high"`; every image after that is lazy-loaded automatically
- **TBT (total blocking time):** the front-end script is enqueued in the footer with `defer` behavior and never blocks first paint

### REST API
- A custom REST field (`iseet_featured_image_url`) added to the `wp/v2/posts` endpoint, so the front end gets a post's featured image in the same request instead of firing one extra call per post
- A `[iseet_latest_posts]` shortcode that renders an empty, accessible container, then fills it client-side by fetching `wp/v2/posts` — keeping the initial page HTML small

---

## Project structure

```
iseet-child-theme/
├── style.css              Child theme stylesheet — accessibility fixes, responsive grid, CLS prevention
├── functions.php          Asset loading, accessibility helpers, Core Web Vitals filters, REST API field + shortcode
└── assets/
    └── js/
        └── latest-posts.js   Fetches and renders posts from the WordPress REST API
```

---

## How to use it

1. Install and activate the parent theme, **Twenty Twenty-Four** (bundled with WordPress).
2. Copy the `iseet-child-theme` folder into `wp-content/themes/`.
3. Activate **ISEET Child Theme** from Appearance → Themes.
4. Add `[iseet_latest_posts]` to any page or post to render the REST API powered grid.

---

## Tech stack

PHP, JavaScript (vanilla, no build step), CSS, WordPress REST API, WordPress hooks/filters API

---

## Author

**Layan Khayyat**
Business Information Technology student, Princess Sumaya University for Technology (PSUT)

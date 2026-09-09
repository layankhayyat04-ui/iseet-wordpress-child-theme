<div align="center">

<img width="100%" src="https://raw.githubusercontent.com/layankhayyat04-ui/iseet-wordpress-child-theme/main/assets/banner.svg" alt="ISEET Child Theme banner" />

<p>
  <img src="https://img.shields.io/badge/WordPress-Child_Theme-21759B?style=for-the-badge&logo=wordpress&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"/>
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"/>
</p>

<p>
  <img src="https://img.shields.io/badge/WCAG_2.1_AA-Accessible-8B5CF6?style=flat-square"/>
  <img src="https://img.shields.io/badge/Core_Web_Vitals-Optimized-2ea44f?style=flat-square"/>
  <img src="https://img.shields.io/badge/REST_API-Powered-FF6B6B?style=flat-square"/>
  <img src="https://img.shields.io/badge/Build_Step-None_%E2%80%94_Vanilla_JS-0D1117?style=flat-square"/>
</p>

A child theme built on **Twenty Twenty-Four** covering accessible components, responsive layout, Core Web Vitals discipline, and a REST API powered feature.

</div>

<img src="https://raw.githubusercontent.com/layankhayyat04-ui/layankhayyat04-ui/main/assets/divider-gold.svg" width="100%" height="3"/>

<details open>
<summary><h2>📋 &nbsp;What's inside</h2></summary>
<br>

<table width="100%">
<tr>
<td width="25%" valign="top" align="center">

<h3>♿</h3>
<h3><b>Accessibility</b></h3>
<img src="https://img.shields.io/badge/WCAG_2.1-AA/AAA-8B5CF6?style=flat-square"/>

<p align="left">

- Skip-to-content link (WCAG 2.4.1)
- Visible `:focus-visible` outlines (WCAG 2.4.7)
- Muted text contrast raised 3.9:1 → 7:1 (AAA)
- `role="list"` / `aria-label` on dynamic content

</p>

</td>
<td width="25%" valign="top" align="center">

<h3>📐</h3>
<h3><b>Responsive</b></h3>
<img src="https://img.shields.io/badge/Mobile_First-2ea44f?style=flat-square"/>

<p align="left">

- 3 → 2 → 1 column CSS grid
- Breakpoints at 768px and 480px
- Fixed `aspect-ratio: 16/9` cards
- Zero layout distortion at any width

</p>

</td>
<td width="25%" valign="top" align="center">

<h3>⚡</h3>
<h3><b>Core Web Vitals</b></h3>
<img src="https://img.shields.io/badge/CLS_%7C_LCP_%7C_TBT-optimized-2ea44f?style=flat-square"/>

<p align="left">

- Auto image `width`/`height` → no CLS
- First image `fetchpriority="high"`
- Rest lazy-loaded automatically
- Scripts deferred, footer-loaded

</p>

</td>
<td width="25%" valign="top" align="center">

<h3>🔌</h3>
<h3><b>REST API</b></h3>
<img src="https://img.shields.io/badge/wp/v2/posts-custom_field-FF6B6B?style=flat-square"/>

<p align="left">

- Custom `iseet_featured_image_url` field
- `[iseet_latest_posts]` shortcode
- Client-side fetch, zero extra plugins
- Small initial HTML payload

</p>

</td>
</tr>
</table>

</details>

<img src="https://raw.githubusercontent.com/layankhayyat04-ui/layankhayyat04-ui/main/assets/divider-magenta.svg" width="100%" height="3"/>

<details open>
<summary><h2>🗂️ &nbsp;Project structure</h2></summary>
<br>

```
iseet-child-theme/
├── style.css              Child theme stylesheet — accessibility, responsive grid, CLS prevention
├── functions.php          Asset loading, accessibility helpers, Core Web Vitals filters, REST API + shortcode
└── assets/
    └── js/
        └── latest-posts.js   Fetches and renders posts from the WordPress REST API
```

</details>

<img src="https://raw.githubusercontent.com/layankhayyat04-ui/layankhayyat04-ui/main/assets/divider-red.svg" width="100%" height="3"/>

<details>
<summary><h2>🚀 &nbsp;How to use it</h2></summary>
<br>

1. Install and activate the parent theme, **Twenty Twenty-Four** (bundled with WordPress).
2. Copy the `iseet-child-theme` folder into `wp-content/themes/`.
3. Activate **ISEET Child Theme** from **Appearance → Themes**.
4. Add `[iseet_latest_posts]` to any page or post to render the REST API powered grid.

</details>

<img src="https://raw.githubusercontent.com/layankhayyat04-ui/layankhayyat04-ui/main/assets/divider-cyan.svg" width="100%" height="3"/>

<div align="center">

### 🛠️ Tech stack

<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
<img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"/>
<img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"/>
<img src="https://img.shields.io/badge/WordPress-21759B?style=for-the-badge&logo=wordpress&logoColor=white"/>
<img src="https://img.shields.io/badge/REST_API-FF6B6B?style=for-the-badge&logo=fastapi&logoColor=white"/>

<img src="https://raw.githubusercontent.com/layankhayyat04-ui/layankhayyat04-ui/main/assets/divider-gold.svg" width="100%" height="3"/>

**Layan Khayyat**
Business Information Technology student, Princess Sumaya University for Technology (PSUT)

<br/>

<img src="https://readme-typing-svg.demolab.com?font=Fira+Code&size=14&duration=3000&pause=1000&color=00D9FF&center=true&vCenter=true&width=500&lines=Thanks+for+stopping+by!" alt="Typing SVG" />

</div>

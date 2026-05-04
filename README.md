# 🧘 Yoga Flow — WordPress Theme

### Project Overview
A custom WordPress theme for a modern, minimalist yoga studio website.
Visitors can browse yoga classes by type and level, read about instructors,
submit booking inquiries, and stay updated through the blog.
Built from scratch using WordPress's theme and plugin APIs.

---

### Key Features
- Custom WordPress theme built from scratch with a clean, responsive UI
- Classes and instructors managed via Custom Post Types (CPT)
- Class archive with filtering by type and level using custom taxonomies, and individual class pages
- Blog with archive, category filtering, and individual post pages
- Booking inquiry form with class options loaded dynamically from the database
- Carousel to display classes and instructors

---

### Technologies Used
| Technology | Purpose |
|------------|---------|
| WordPress (ACF, CPT, Taxonomies, WP Customizer) | Dynamic content management |
| PHP | Custom page templates |
| Bootstrap 5.3.3 | Responsive layout and grid system |
| Custom CSS | UI styling, modular by page section |
| JavaScript | Hamburger menu, Slick Carousel |
| MySQL  | Database |

---

### Pages

| Type | Page |
|------|------|
| Front Page | Homepage with 6 sections |
| Single Pages | Single blog post, Single class |
| Archive Pages | Blog archive (filter by category), Class archive (filter by type/level) |
| Secondary Pages | About, Contact |
| Global | Header, Footer, Sidebar |

---

### Theme Structure

```
wp-content/themes/projectyogaclient/
│
├── style.css                  # Theme declaration + CSS entry point (@import all modules)
├── functions.php              # Assets, CPTs, Taxonomies, WP Customizer settings
│
├── front-page.php             # Homepage
├── page-about.php             # About page
├── page-contact.php           # Contact page
├── archive-class.php          # Class archive
├── single-class.php           # Class individual 
├── taxonomy-class_type.php    # Filter by class type
├── taxonomy-class_level.php   # Filter by class level
├── single.php                 # Blog individual
├── home.php                   # Blog archive
├── category.php               # Blog category archive
│
├── header.php                 # Global header + nav
├── footer.php                 # Global footer
│
├── css/                       # Modular stylesheets
│   ├── variables.css          # Design tokens (colors, fonts, spacing)
│   ├── global.css             # Base styles
│   ├── global_header.css
│   ├── global_footer.css
│   ├── global_sidebar.css
│   ├── fp_hero-banner.css     # Front page sections (fp_)
│   ├── fp_about.css
│   ├── fp_booking.css
│   ├── fp_class.css
│   ├── fp_blog.css
│   ├── fp_subscribe.css
│   ├── sp_single-class.css    # Single page sections (sp_)
│   ├── sp_single-blog.css
│   ├── ap_archive-classes.css # Archive page sections (ap_)
│   ├── ap_archive-blog.css
│   ├── page_about.css
│   └── page_contact.css
│
└── assets/
    └── js/
        ├── menu.js            # Mobile navigation toggle
        └── slick-init.js      # Slick carousel initialization
```

---

### Getting Started

**Requirements:** XAMPP (or any local server with PHP + MySQL), WordPress

1. Clone the repository or download the theme into your WordPress themes folder:
```bash
git clone https://github.com/vickihi/projectyoga.git
```

2. Place the project under your local server root (e.g. `htdocs/projectyoga`)

3. Create a MySQL database named `projectyoga`

4. Copy `wp-config-sample.php` to `wp-config.php` and configure your database credentials

5. Visit `http://localhost/projectyoga` to complete WordPress installation

6. In WP Admin → Appearance → Themes, activate **Yoga Flow Website**

7. Install and activate the **Advanced Custom Fields (ACF)** plugin

8. Go to Appearance → Customize → **Class Page Settings** to configure the class banner image, subtitle, and booking URL

<?php 

// ====================================================================== 
// Theme Assets Setup: Bootstrap, CSS, Font Awesome, Google Fonts  
// ======================================================================

function yoga_files() {

    /* ================= CSS ================= */

    // Bootstrap CSS     
    wp_enqueue_style(             // wp_enqueue_style($handle, $src, $deps, $ver, $media);
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );

    // Font Awesome
    wp_enqueue_style(
        'fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css'
    );

    // Google Fonts: Cormorant + Poppins
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap',
        array(),
        null
    );

    // Slick CSS
    wp_enqueue_style(
        'slick-css',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css'
    );


    
    /* ================= JS ================= */

    wp_enqueue_style(
        'slick-theme-css',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css',
        ['slick-css']
    );

    // Theme CSS (includes all modular styles via @import)
    wp_enqueue_style(
        'yoga-style',
        get_stylesheet_uri()
    );

    wp_enqueue_script('jquery');

    // Bootstrap JS
    wp_enqueue_script(                  // wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        array(),
        null,
        true
    );

    // Slick JS
    wp_enqueue_script(
        'slick-js',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
        ['jquery'],
        '1.9.0',
        true
    );

    // Slick init
    wp_enqueue_script(
        'slick-init',
        get_template_directory_uri() . '/assets/js/slick-init.js',
        ['slick-js'],
        null,
        true
    );


    // Mobile Menu
    wp_enqueue_script(
        'menu',
        get_template_directory_uri() . '/assets/js/menu.js',
        [],
        null,
        true
    );

}

add_action('wp_enqueue_scripts', 'yoga_files');



// ====================================================== 
// Theme Setup: Menu + Logo + Featured Image 
// ======================================================

function yoga_theme_setup() {

    // Menu and Logo
    add_theme_support('menus');            // Enable Appearance → Menus
    add_theme_support('custom-logo');      // Enable Appearance → Customize → Site Identity → Logo

    register_nav_menus([                   // Register menus - their locations
        'header-menu' => __('Header Navigation', 'projectyogaclient'),
        'footer-menu' => __('Footer Navigation', 'projectyogaclient'),
        'footer-link' => __('Footer Link', 'projectyogaclient'),
    ]);

    // Featured Image
    add_theme_support('post-thumbnails');  // Enable Featured Image option for Blog Posts and CPTs

}

add_action('after_setup_theme', 'yoga_theme_setup');



// ====================================================== 
// Register CPT: Classes 
// ======================================================
function register_yoga_class_cpt() {

    $labels = [   // UI labels display in WP Dashboard

        'name'              => __('Classes', 'projectyogaclient'),           
        'singular_name'     => __('Class', 'projectyogaclient'),                    
        'menu_name'         => __('Classes', 'projectyogaclient'),           
        'name_admin_bar'    => __('Class', 'projectyogaclient'),            

        'add_new'           => __('Add New', 'projectyogaclient'),                   
        'add_new_item'      => __('Add new Class', 'projectyogaclient'),   
        'edit_item'         => __('Edit Class', 'projectyogaclient'),
        'view_item'         => __('View Class', 'projectyogaclient'),
        'search_items'      => __('Search Classes', 'projectyogaclient'),
        'all_items'         => __('All Classes', 'projectyogaclient')

    ];

    $args = [     // CPT settings

        'label'             => __('Class', 'projectyogaclient'),
        'labels'            => $labels,
        'public'            => true,  // 'Classes' is shown in Dashboard and Appearance → Menus
        'show_in_rest'      => true,
        'supports'          => ['title', 'editor', 'thumbnail'],
     
        'menu_icon'         => 'dashicons-universal-access-alt', 
        'menu_position'     => 5,
        "has_archive"       => true,
        'rewrite'           => ['slug' => 'classes'],  // CPT archive URL: yourdomain.com/classes
        'hierarchical'      => false

    ];

    register_post_type('class', $args);   //name of the table in db is 'class'
}

add_action('init', 'register_yoga_class_cpt');


// ====================================================== 
// Register CPT: Team
// ======================================================
add_action('init', function() {
    $labels = [

        'name'              => __('Team', 'projectyogaclient'),  //domain of the theme: name of the folder
        'singular_name'     => __('Instructor', 'projectyogaclient'),
        'menu_name'         => __('Team', 'projectyogaclient'),
        'name_admin_bar'    => __('Instructor', 'projectyogaclient'),
        'add_new'           => __('Add New Member', 'projectyogaclient'),
        'add_new_item'      => __('Add new Person', 'projectyogaclient'),
        'edit_item'         => __('Edit Instructor', 'projectyogaclient'),

    ];

    $args = [

        'label'             => __('Team', 'projectyogaclient'),
        'labels'            => $labels,
        'public'            => true,
        'show_in_rest'      => true,
        'supports'          => ['title', 'editor', 'thumbnail'],

        'menu_icon'         => 'dashicons-groups', 
        'menu_position'     => 6,
        "has_archive"       => true,
        'hierarchical'      => false

    ];


    register_post_type('team', $args);  
});



// ====================================================== 
// Register Class Taxonomies (Class Type and Class Level)
// ======================================================
function register_class_taxonomies() {

    // Class Type Taxonomy
    $labels = [
        'name'              => __('Class Types', 'projectyogaclient'),
        'singular_name'     => __('Class Type', 'projectyogaclient'),
        'menu_name'         => __('Class Types', 'projectyogaclient'),
    ];

    $args = [
        'labels'            => $labels,
        'hierarchical'      => true,   // like categories
        'rewrite'           => ['slug' => 'class-type'],
    ];

    register_taxonomy('class_type', 'class', $args);

    // Class Level Taxonomy
    $labels = [
        'name'              => __('Class Levels', 'projectyogaclient'),
        'singular_name'     => __('Class Level', 'projectyogaclient'),
        'menu_name'         => __('Class Levels', 'projectyogaclient'),
    ];

    $args = [
        'labels'            => $labels,
        'hierarchical'      => true,   // like categories
        'rewrite'           => ['slug' => 'class-level'],
    ];

    register_taxonomy('class_level', 'class', $args);
}

add_action('init', 'register_class_taxonomies');



 
// ==============================================================================
// WP Customize Section: Enable site admin to set Class Page global Settings - 
//                       Banner Image, Banner Subtitle, Booking Page Link
// ==============================================================================

function yoga_customize_section($wp_customize) {

    // Section setting 
    $wp_customize->add_section('yoga_class_global_settings', array(
        'title'    => __('Class Page Settings', 'yoga'),
        'priority' => 30,
    ));


    // 1. Banner Image setting
    $wp_customize->add_setting('class_banner_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(   // Image Upload Control
            $wp_customize,
            'class_banner_image_control', array(
                'label'    => __('Class Banner Image', 'yoga'),
                'section'  => 'yoga_class_global_settings',
                'settings' => 'class_banner_image'
            )
        )
    );


    // 2. Banner Subtitle setting
    $wp_customize->add_setting('class_banner_subtitle', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('class_banner_subtitle_control', array(   // Textarea Control
        'label'    => __('Class Banner Subtitle', 'yoga'),
        'section'  => 'yoga_class_global_settings',
        'settings' => 'class_banner_subtitle',
        'type'     => 'textarea',
    ));


    // 3. Booking Page Link setting 
    $wp_customize->add_setting('class_booking_page_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('class_booking_page_link_control', array(  // Text Control
        'label'    => __('Booking Page URL', 'yoga'),
        'section'  => 'yoga_class_global_settings',
        'settings' => 'class_booking_page_link',
        'type'     => 'text',    
    ));

}

add_action('customize_register', 'yoga_customize_section');

?>

 
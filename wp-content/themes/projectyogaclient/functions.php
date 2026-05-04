<?php 

// ============================================================================== 
// Theme Assets Setup: Bootstrap, CSS, Font Awesome, Google Fonts  
// ==============================================================================
function yoga_files() {

    // Bootstrap CSS     
    wp_enqueue_style(             // wp_enqueue_style($handle, $src, $deps, $ver, $media);
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );

    // Main CSS (includes all modular styles via @import)
    wp_enqueue_style(
        'yoga-style',
        get_stylesheet_uri(), 
        ['bootstrap-css']
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

    wp_enqueue_style(
        'slick-theme-css',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css',
        ['slick-css']
    );
    
    // jQuery 
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

    // Slick init JS
    wp_enqueue_script(
        'slick-init',
        get_template_directory_uri() . '/assets/js/slick-init.js',
        ['slick-js'],
        null,
        true
    );

    // Mobile Menu JS
    wp_enqueue_script(
        'menu',
        get_template_directory_uri() . '/assets/js/menu.js',
        [],
        null,
        true
    );

}

add_action('wp_enqueue_scripts', 'yoga_files');



// ============================================================================== 
// Theme Setup: Menu + Site Logo + Featured Image 
// ==============================================================================
function yoga_theme_setup() {

    // Enable Appearance → Menus
    add_theme_support('menus'); 
    
    // Register menus - their locations
    register_nav_menus([                   
        'header-menu' => __('Header Navigation', 'projectyogaclient'),
        'footer-menu' => __('Footer Navigation', 'projectyogaclient'),
        'footer-link' => __('Footer Link', 'projectyogaclient'),
    ]);

    // Enable Appearance → Customize → Site Identity → Logo
    add_theme_support('custom-logo');      

    // Enable Featured Image option for Blog Posts and CPTs
    add_theme_support('post-thumbnails');  
}

add_action('after_setup_theme', 'yoga_theme_setup');



// ============================================================================== 
// Register CPT: Classes 
// ==============================================================================
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

    register_post_type('class', $args);   
}

add_action('init', 'register_yoga_class_cpt');



// ==============================================================================
// Register CPT: Team
// ==============================================================================
function register_yoga_team_cpt() {
    $labels = [

        'name'              => __('Team', 'projectyogaclient'),
        'singular_name'     => __('Instructor', 'projectyogaclient'),
        'menu_name'         => __('Team', 'projectyogaclient'),
        'name_admin_bar'    => __('Instructor', 'projectyogaclient'),
        'add_new'           => __('Add New', 'projectyogaclient'),
        'add_new_item'      => __('Add New Instructor', 'projectyogaclient'),
        'edit_item'         => __('Edit Instructor', 'projectyogaclient'),
        'view_item'         => __('View Instructor', 'projectyogaclient'),
        'search_items'      => __('Search Instructors', 'projectyogaclient'),
        'all_items'         => __('All Instructors', 'projectyogaclient'),

    ];

    $args = [

        'label'             => __('Team', 'projectyogaclient'),
        'labels'            => $labels,
        'public'            => true,
        'show_in_rest'      => true,
        'supports'          => ['title', 'editor', 'thumbnail'],
        'menu_icon'         => 'dashicons-groups',
        'menu_position'     => 6,
        'has_archive'       => true,
        'hierarchical'      => false

    ];

    register_post_type('team', $args);
}

add_action('init', 'register_yoga_team_cpt');



// ============================================================================== 
// Register Taxonomies for CPT: Classes (Class Type and Class Level)
// ==============================================================================
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
// WP Customizer: 
// - Banner settings (banner image and banner title) for CPT pages (Class and Team)
// - Global Class Booking Link
// ==============================================================================
function register_cpt_banner($wp_customize, $prefix, $label) {

    // image
    $wp_customize->add_setting("{$prefix}_banner_image", array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            "{$prefix}_banner_image_control", array(
                'label'    => __("{$label} Banner Image", 'projectyogaclient'),
                'section'  => 'yoga_cpt_settings',
                'settings' => "{$prefix}_banner_image"
            )
        )
    );

    // title
    $wp_customize->add_setting("{$prefix}_banner_title", array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("{$prefix}_banner_title_control", array(
        'label'    => __("{$label} Banner Title", 'projectyogaclient'),
        'section'  => 'yoga_cpt_settings',
        'settings' => "{$prefix}_banner_title",
        'type'     => 'text',
    ));
}

function yoga_customize_section($wp_customize) {

    // Generate a custom Section for CPT pages: Class and Team 
    $wp_customize->add_section('yoga_cpt_settings', array(
        'title'    => __('Yoga CPTs Settings', 'projectyogaclient'),
        'priority' => 30,
    ));

    // Archive class banner image & title
    register_cpt_banner($wp_customize, 'archive_class', 'Class Archive');

    // Single class banner image & title
    register_cpt_banner($wp_customize, 'single_class', 'Single Class');

    // Archive team banner image & title
    // register_cpt_banner($wp_customize, 'archive_team', 'Team Archive');

    // Single team banner image & title
    // register_cpt_banner($wp_customize, 'single_team', 'Single Archive');

    // Booking Page Link setting 
    $wp_customize->add_setting('class_booking_page_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('class_booking_page_link_control', array(  // Text Control
        'label'    => __('Booking Page URL', 'projectyogaclient'),
        'section'  => 'yoga_cpt_settings',
        'settings' => 'class_booking_page_link',
        'type'     => 'text',    
    ));

}

add_action('customize_register', 'yoga_customize_section');

?>

 
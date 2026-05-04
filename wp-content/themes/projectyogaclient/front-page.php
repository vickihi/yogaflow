<!-- ============================= -->
<!--      Front Page Template      -->
<!-- ============================= -->


<?php get_header(); ?>

<main>

    <!-- ============================ Hero Banner Section =========================== -->  

    <!-- Bg image mobile -->   
    <style>
        .hero-banner {
            background-image: url('<?php the_field("section_banner_image_desktop"); ?>');
        }

        @media (max-width: 768px) {
        .hero-banner {
                background-image: url('<?php the_field("section_banner_image_mobile"); ?>') !important;
                background-position: center top;
                background-size: cover;
            }
        }
    </style>

    <!-- Bg image desktop -->  
    <section class="d-flex align-items-center hero-banner">  <!-- style of bg image is set above -->
        <div class="container">
             <div class="row">
                <div class="col-lg-7 col-md-10">        <!-- set the layout of the banner content -->

                    <!-- Pretitle -->
                    <p class="pretitle hero-pretitle">
                        <?php the_field('section_banner_pretitle'); ?>
                    </p>

                    <!-- Title -->
                    <h1 class="title hero-title">
                        <?php the_field('section_banner_title'); ?>
                    </h1>

                    <!-- Subtitle -->
                    <p class="hero-text">
                        <?php the_field('section_banner_text'); ?>
                    </p>

                    <!-- Button -->
                    <?php 
                        $button_link = get_field('section_banner_button');
                    ?>
     
                    <a href="<?php echo $button_link['url'] ?>" class="btn" target="<?php echo $button_link['target'] ?>">
                        <?php echo $button_link['title'] ?>
                    </a>

                </div>
             </div>
        </div>
    </section>


    <!-- ============================== About Section =============================== -->
    <section class="about">
        <div class="container">
            <div class="row g-5 align-items-center">
                
                <!-- Prepare data -->
                <?php 
                    $aboutimg  = get_field('section_about_image');   
                    $features  = get_field('section_about_features');
                ?>

                <!-- Left: title, text, image mobile, features -->
                <div class="col-lg-6">

                    <!-- Pretitle -->
                    <p class="pretitle about-pretitle">
                        <?php the_field('section_about_pretitle'); ?>
                    </p>
                    
                    <!-- Title -->
                    <h2 class="title about-title">
                        <?php the_field('section_about_title'); ?>
                    </h2>

                    <!-- Text -->
                    <p>
                        <?php the_field('section_about_text'); ?>
                    </p>

                    <!-- Image: Mobile --> 
                    <div class="d-lg-none mb-4">
                        <img src="<?php echo $aboutimg['url'] ?>" alt="<?php echo $aboutimg['alt'] ?>" class="img-fluid"> 
                    </div>

                    <!-- Section Features: icon + title + text -->
                    <div class="row">
                        <div class="col-6">
                            <div class="row g-4 align-items-center">
                                <div class="col-auto">        <!-- Icon occupies minimal width -->
                                    <i class="fa-solid fa-award feature-icon"></i>
                                </div>
                                <div class="col">                          <!-- Title takes the rest of the space -->       
                                    <h3 class="feature-title">
                                        <?php echo $features['feature_1_title']; ?>
                                    </h3>
                                </div>
                            </div>
                            <div>
                                <p><?php echo $features['feature_1_text']; ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row g-4 align-items-center">
                                <div class="col-auto">
                                    <i class="fa-solid fa-people-group feature-icon"></i>
                                </div>
                                <div class="col">
                                    <h3 class="feature-title"><?php echo $features['feature_2_title']; ?></h3>
                                </div>
                            </div>
                            <div>
                                <p><?php echo $features['feature_2_text']; ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row g-4 align-items-center">
                                <div class="col-auto">
                                    <i class="fa-solid fa-leaf feature-icon"></i>
                                </div>
                                <div class="col">
                                    <h3 class="feature-title"><?php echo $features['feature_3_title']; ?></h3>
                                </div>
                            </div>
                            <div>
                                <p><?php echo $features['feature_3_text']; ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row g-4 align-items-center">
                                <div class="col-auto">
                                    <i class="fa-solid fa-calendar-check feature-icon"></i>
                                </div>
                                <div class="col">
                                    <h3 class="feature-title"><?php echo $features['feature_4_title']; ?></h3>
                                </div>
                            </div>
                            <div>
                                <p><?php echo $features['feature_4_text']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: image desktop -->
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="<?php echo $aboutimg['url'] ?>" alt="<?php echo $aboutimg['alt'] ?>" class="img-fluid">
                </div>

            </div>

        </div>
    </section>


    <!-- ============================= Showcase Section ============================= -->
    <section class="showcase">
        <div class="container">

            <div class="row g-5 align-items-center">

                <!-- Prepare data -->
                <?php 
                    $showcaseimg  = get_field('section_showcase_image');   
                ?>

                <!-- Left: image desktop -->
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="<?php echo $showcaseimg['url'] ?>" alt="<?php echo $showcaseimg['alt'] ?>" class="img-fluid"> 
                </div>

                <!-- Right: title, text, button -->
                <div class="col-lg-6">
                    <p class="pretitle showcase-pretitle">
                        <?php the_field('section_showcase_pretitle'); ?>
                    </p>

                    <h2 class="title showcase-title">
                        <?php the_field('section_showcase_title'); ?>
                    </h2>

                    <!-- Image: Mobile (bottom) --> 
                    <div class="d-lg-none mb-4">
                        <img src="<?php echo $showcaseimg['url'] ?>" alt="<?php echo $showcaseimg['alt'] ?>" class="img-fluid"> 
                    </div>

                    <?php the_field('section_showcase_text'); ?>
                    
                    <?php 
                        $button_link = get_field('section_showcase_button');
                    ?>
                    <a href="<?php echo $button_link['url'] ?>" class="btn" target="<?php echo $button_link['target'] ?>">
                        <?php echo $button_link['title'] ?>
                    </a>
                </div>

            </div>

        </div>
    </section>


    <!-- ============================= Booking Section ============================== -->
    <section 
        class="booking"
        style="background-image: url(<?php the_field('section_booking_image'); ?>);"
    >
        <div class="container">

            <!-- Header -->
            <div class="booking-header">
                <p class="pretitle booking-pretitle"><?php the_field('section_booking_pretitle'); ?></p>
                <h2 class="title booking-title"><?php the_field('section_booking_title'); ?></h2>
            </div>

            <!-- Booking card -->
            <div class="booking-card">
                <form class="booking-form" method="post" action=""> <!-- TODO: Placeholder right now, requires booking plugin or custom API integration -->

                    <div class="row g-3 align-items-end">  <!-- Align at bottom -->

                        <!-- Name -->
                        <div class="col-md-3">
                            <label class="form-label" for="booking-name">Name</label>
                            <input 
                                type="text" 
                                id="booking-name" 
                                name="booking_name" 
                                class="form-control" 
                                placeholder="Full Name" 
                                required
                            >
                        </div>

                        <!-- Email -->
                        <div class="col-md-3">
                            <label class="form-label" for="booking-email">Email</label>
                            <input 
                                type="email" 
                                id="booking-email" 
                                name="booking_email" 
                                class="form-control" 
                                placeholder="Your Email" 
                                required
                            >
                        </div>

                        <!-- Date -->
                        <div class="col-md-2">
                            <label class="form-label" for="booking-date">Date</label>
                            <input 
                                type="date" 
                                id="booking-date" 
                                name="booking_date" 
                                class="form-control" 
                                required
                            >
                        </div>

                        <!-- Class：dynamically from CPT class -->
                        <div class="col-md-2">
                            <label class="form-label" for="booking-class">Class</label>
                            <select 
                                id="booking-class" 
                                name="booking_class" 
                                class="form-select" 
                                required
                            >
                                <option value="" hidden selected>Select a class</option>

                                <!-- Custom Query to get all 'class' posts as options -->
                                <?php
                                $classes = new WP_Query(               
                                     array(
                                        'post_type'      => 'class',   
                                        'posts_per_page' => -1,        // Get all posts
                                        'orderby'        => 'title',
                                        'order'          => 'ASC',
                                    )
                                );
                               
                                while($classes->have_posts()){
                                    $classes->the_post(); 
                                ?>

                                    <option value="<?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </option>

                                <?php
                                }
                                wp_reset_postdata();
                                ?>
                            </select>
                        </div>

                        <!-- Experience level: static -->
                        <div class="col-md-2">
                            <label class="form-label" for="booking-level">Experience Level</label>
                            <select 
                                id="booking-level" 
                                name="booking_level" 
                                class="form-select"
                            >
                                <option value="" hidden selected>Select level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                        </div>
                    </div>

                    <!-- Booking button -->
                    <div class="booking-btn-row">
                        <button type="submit" class="btn booking-btn">
                            Reserve Now
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </section>


    <!-- ========================== Classes Carousel Section ============================ -->
    <section class="yoga-class">
        <div class="container">

            <!-- Header -->
            <div class="class-header">
                <p class="pretitle class-pretitle"><?php the_field('section_class_pretitle'); ?></p>
                <h2 class="title class-title"><?php the_field('section_class_title'); ?></h2>
            </div>

            <div class="gallery-carousel">

                <?php
                $classes = new WP_Query(
                    array(
                        'post_type' => 'class',
                        'posts_per_page' => 6,
                        'orderby' => 'rand'
                    )
                );
 
                while ($classes->have_posts()) {
                    $classes->the_post();
                ?>

                <!-- Class cards -->
                <div class="gallery-slide">
                    <article class="card class-card">

                        <!-- Top: thumbnail as bg img -->
                        <?php 
                            $url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        ?>
                        <a href="<?php the_permalink(); ?>">                       
                            <div class="card-thumb-bg class-thumb" style="background-image: url(<?php echo esc_url($url); ?>);"></div> 
                        </a>

                        <!-- Bottom: content -->
                        <div class="class-content">

                            <!-- Title -->
                            <h3 class="card-title class-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3> 

                            <!-- Meta row (icon + text) -->
                            <div class="class-meta">

                                <!-- Level -->
                                <div class="meta-item">
                                    <?php 
                                        $levels = get_the_terms(get_the_ID(), 'class_level'); 
                                    ?>
                                    <i class="fa-solid fa-signal"></i>                                        
                                    <span>
                                        <?php echo esc_html($levels[0]->name) ?>
                                    </span>
                                </div>

                                <!-- Type -->
                                <div class="meta-item">
                                    <?php 
                                        $types = get_the_terms(get_the_ID(), 'class_type'); 
                                    ?>
                                    <i class="fa-solid fa-spa"></i>                                        
                                    <span>
                                        <?php echo esc_html($types[0]->name) ?>
                                    </span>
                                </div>

                                <!-- Duration -->
                                <div class="meta-item">
                                    <i class="fa-solid fa-hourglass-half"></i>
                                    <span><?php the_field('class_duration'); ?></span>
                                </div>
                            </div>

                            <!-- Brief description -->
                            <p class="mb-3 class-excerpt">
                                <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                            </p>

                            <!-- Button -->
                            <a href="<?php the_permalink(); ?>" class="btn">
                                Learn More
                            </a>

                        </div>

                    </article>
                </div>

                <?php 
                }
                wp_reset_postdata(); 
                ?>
            </div>

        </div>
    </section>


    <!-- ============================ Subscribe Section ============================== -->
    <section 
        class="subscribe"
        style="background-image: url(<?php the_field('section_subscribe_image'); ?>);"
    >
        <div class="container">
            <div class="row justify-content-lg-end justify-content-md-center align-items-center">
                <div class="subscribe-content col-lg-6 col-md-7">

                    <!-- Header -->
                    <div class="subscribe-header">
                        <p class="pretitle subscribe-pretitle">
                            <?php the_field('section_subscribe_pretitle'); ?>
                        </p>
                        <h2 class="title subscribe-title">
                            <?php the_field('section_subscribe_title'); ?>
                        </h2>
                    </div>

                    <!-- Text -->
                    <p class="subscribe-text">
                        <?php the_field('section_subscribe_text'); ?>
                    </p>

                    <!-- Form -->
                    <form class="subscribe-form">    <!-- UI demo only, later will be replaced by mailchimp -->
                        <div class="input-group">    <!-- BS component for input with addon -->
                            <span class="input-group-text">Email</span>
                            <input
                            type="email"
                            class="form-control"
                            placeholder="Your Email"
                            required
                            >
                            <button type="submit" class="btn btn-subscribe">Subscribe</button>                                                      
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>


    <!-- ============================== Blog Section ================================ -->
    <section class="blog">
        <div class="container">

            <!-- Header -->
            <div class="blog-header">
                <p class="pretitle blog-pretitle"><?php the_field('section_blog_pretitle'); ?></p>
                <h2 class="title blog-title"><?php the_field('section_blog_title'); ?></h2>
            </div>

            <!-- Blog posts -->
            <?php
            $blog_posts = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'rand'
                )
            );
            ?>

            <div class="row g-4">
                <?php 
                while ($blog_posts->have_posts()) {
                    $blog_posts->the_post();
                ?>

                    <div class="col-lg-4 col-md-6">
                        <article class="card blog-card">

                            <!-- Thumbnail as bg img (top) -->
                            <?php 
                                $url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                            ?>
                            <a href="<?php the_permalink(); ?>">                        
                                <div class="card-thumb-bg blog-thumb" style="background-image: url(<?php echo esc_url($url); ?>);"></div> 
                            </a>

                            <!-- Content (bottom) -->
                            <div class="blog-content">

                                <!-- Date -->
                                <span class="blog-date">
                                    <?php echo get_the_date('d M, Y'); ?>
                                </span>
                               
                                <!-- Title -->
                                <h3 class="card-title blog-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>   

                                <!-- Excerpt -->
                                <p class="blog-excerpt">
                                    <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                </p>

                                <a href="<?php the_permalink(); ?>" class="single-class-link">
                                    Read More >>
                                </a>

                            </div>
                        </article>
                    </div>
                <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
        
    

</main>

<?php get_footer(); ?>
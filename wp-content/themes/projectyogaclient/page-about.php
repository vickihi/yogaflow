<!-- ====================================================== --> 
<!--                  About Page Template                   --> 
<!-- ====================================================== --> 

<?php get_header(); ?>

<?php 
// begin loop
if ( have_posts() ) {
    while ( have_posts()) {
        the_post();
?>

<main>
    <!-- ====================================================== --> 
    <!--                    Banner Section                      -->  
    <!-- ====================================================== -->  
    <?php $page_banner_img = get_field('page_banner_image'); ?>
    <section class="banner" style="background-image: url(<?php echo esc_url($page_banner_img); ?>);">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>


    <!-- ====================================================== --> 
    <!--                   Intro Section                        -->  
    <!-- ====================================================== -->  
    <section class="intro">
        <div class="container">
            <h1>Who we are ...</h1>
            <?php the_field('about_intro') ?>
        </div>
    </section>


    <!-- ====================================================== --> 
    <!--                   Team Section                         -->  
    <!-- ====================================================== -->  
    <section class="instructors">
        <div class="container">
            <h1>Meet Our Team</h1>
            
            <!-- Instructor cards -->
            <?php
            $instructors = new WP_Query(
                array(
                    'post_type' => 'team',
                    'posts_per_page' => 8
                )
            );
            ?>

            <div class="gallery-carousel"> 
                <?php 
                while ($instructors->have_posts()) {
                    $instructors->the_post();
                ?>

                    <div class="gallery-slide"> 
                        <article class="card instructor-card h-100 d-flex flex-column">

                            <!-- Thumbnail as bg img (top) -->
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                    $url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                ?>                        
                                <div class="card-thumb-bg instructor-thumb" style="background-image: url(<?php echo esc_url($url); ?>);"></div> 
                            </a>

                            <!-- Content (bottom) -->
                            <div class="instructor-content d-flex flex-column flex-grow-1">

                                <!-- Title -->
                                <h3 class="card-title instructor-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3> 

                                <?php $classes = get_field('instructor_classes'); ?>
                                <?php if ($classes) : ?>
                                    <?php 
                                    $class_links = array();
                                    foreach ($classes as $class) {
                                        $class_links[] = '<a href="' . get_permalink($class->ID) . '">' . get_the_title($class->ID) . '</a>';
                                    }
                                    echo '<div class="instructor-classes">' . implode(' | ', $class_links) . '</div>';
                                    ?>
                                <?php endif; ?>

                                <div class="instructor-social mt-auto">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>

                                <!-- Short Bio -->
                                <p class="mb-3 instructor_short_bio">
                                    <?php the_field('short_bio'); ?>
                                </p>

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

    <!-- ====================================================== --> 
    <!--                 Mission Section                        -->  
    <!-- ====================================================== -->  
    <section class="mission" style="background-image: url(<?php the_field('about_mission_background'); ?>);">
        <div class="container">
            <div class="row justify-content-lg-end justify-content-md-center align-items-center">
                <div class="mission-content col-lg-6 col-md-7">
                    <h1>Our Mission</h1>
                    <?php the_field('about_mission') ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ====================================================== --> 
    <!--                   Classes Section                      -->  
    <!-- ====================================================== -->  
    <section class="yoga-class">
        <div class="container">
            <h1>Explore Our Classes</h1>

            <!-- Class cards -->
            <?php
            $classes = new WP_Query(
                array(
                    'post_type' => 'class',
                    'posts_per_page' => 6,
                    'orderby' => 'rand'
                )
            );
            ?>

            <div class="gallery-carousel"> 
                <?php 
                while ($classes->have_posts()) {
                    $classes->the_post();
                ?>

                <div class="gallery-slide">
                    <article class="card class-card">

                        <!-- Thumbnail as bg img (top) -->
                        <a href="<?php the_permalink(); ?>">
                            <?php 
                                $url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                            ?>                        
                            <div class="card-thumb-bg class-thumb" style="background-image: url(<?php echo esc_url($url); ?>);"></div> 
                        </a>

                        <!-- Content (bottom) -->
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
                                        $levels = get_the_terms(get_the_ID(), 'class_type'); 
                                    ?>
                                    <i class="fa-solid fa-spa"></i>                                        
                                    <span>
                                        <?php echo esc_html($levels[0]->name) ?>
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

</main>

<?php
    }  
}  
// end loop
?>

<?php get_footer(); ?>
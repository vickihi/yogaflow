<!-- ==================================== -->
<!--     Class Level Category Template    -->
<!-- ==================================== -->


<?php get_header(); ?>


<main>

    <!-- ====================================================== --> 
    <!--                  Fields Preparation                    -->  
    <!-- ====================================================== -->  
    <?php
        $banner_img   = get_theme_mod('archive_class_banner_image');    
        $banner_title = get_theme_mod('archive_class_banner_title');                               
    ?>

    <!-- ====================================================== --> 
    <!--                    Banner Section                      -->  
    <!-- ====================================================== -->
    <section class="banner classes-banner" style="background-image: url(<?php echo esc_url($banner_img); ?>);">
        <div class="container">
            <h1><?php echo esc_html($banner_title); ?></h1>     
        </div>
    </section>

    <!-- ====================================================== --> 
    <!--                    Classes Section                     -->  
    <!-- ====================================================== -->
    <section class="archive-classes">
        <div class="container">

            <div class="row g-5">

                <!-- Main Content (Left) -->
                <div class="col-lg-9">
                    <div class="row g-4">

                        <?php 
                        if ( have_posts() ) {
                            while( have_posts() ) {
                                the_post(); 
                                $thumb_url = get_the_post_thumbnail_url( get_the_ID() );  
                        ?>

                        <div class="col-md-6">
                            <article class="card archive-class-card">

                                <!-- thumbnail as bg img (top) -->
                                <a href="<?php the_permalink(); ?>">
                                    <div class="card-thumb-bg class-thumb" style="background-image: url(<?php echo esc_url($thumb_url); ?>);"></div> 
                                </a>

                                <!-- content (bottom) -->
                                <div class="class-content archive-class-content">

                                    <!-- title -->
                                    <h3  class="card-title class-title">
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

                                        
                                        <!-- Duration -->                                    <!-- Duration -->
                                        <div class="meta-item">
                                            <i class="fa-solid fa-hourglass-half"></i>
                                            <span><?php the_field('class_duration'); ?></span>
                                        </div>

                                    </div>

                                    <!-- class description -->
                                    <p class="class-excerpt">
                                        <?php the_field('class_short_description'); ?>
                                    </p>

                                    <!-- booking button --> 
                                    <a href="<?php the_permalink(); ?>" class="btn">
                                        Book a Class
                                    </a>

                                </div>

                            </article>
                        </div>

                        <?php 
                            } 
                        } 
                        ?>

                    </div>             
                </div>

                <!-- Sidebar (Right) -->
                <aside class="col-lg-3 sidebar-group">
                    <h1 class="sidebar-heading">Explore Our Classes</h1>

                    <div class="mb-5">
                        <h1 class="sidebar-title">Classes By Types</h1>
                        <ul class="sidebar-categories">
                            <?php
                            wp_list_categories(array(
                                'taxonomy'   => 'class_type',
                                'title_li'   => '',
                            ));
                            ?>
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h1 class="sidebar-title">Classes By Levels</h1>
                        <ul class="sidebar-categories">
                            <?php
                            wp_list_categories(array(
                                'taxonomy'   => 'class_level',
                                'title_li'   => '',
                            ));
                            ?>
                        </ul>
                    </div>

                </aside>

            </div>

        </div>
    </section>


</main>


<?php get_footer(); ?>

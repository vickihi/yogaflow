<!-- ============================= -->
<!--     Blog Archive Template     -->
<!-- ============================= -->


<?php get_header(); ?>


<main>
    
    <!-- ====================================================== --> 
    <!--                  Fields Preparation                    -->  
    <!-- ====================================================== -->  
    <?php 
        $blog_page_id = get_option('page_for_posts');
  
        $banner_img_thumb = get_the_post_thumbnail_url($blog_page_id, 'full');  // Blog Page thumbnail as Banner background
        $banner_title = get_the_title($blog_page_id);                           // Blog Page title as Banner title
        $banner_text = get_post_field('post_content', $blog_page_id);           // Blog Page content as Banner text. Cannot use get_the_content() directly, need to apply filters

        $banner_img_acf = get_field('page_banner_image', $blog_page_id);        // General Page ACF img as Banner background
    ?>


    <!-- ====================================================== --> 
    <!--                    Banner Section                      -->  
    <!-- ====================================================== --> 
    <section class="banner posts-banner" style="background-image: url(<?php echo esc_url($banner_img_thumb); ?>);">
        <div class="container">
            <h1><?php echo esc_html($banner_title); ?></h1> 
            <div class="banner-text">
                <?php echo $banner_text; ?>
            </div>     
        </div>
    </section>


    <!-- ====================================================== --> 
    <!--                    Blogs Section                       -->  
    <!-- ====================================================== -->
    <section class="archive-blog">
        <div class="container">
            <div class="row g-5">

                <!-- Main Content (Left) -->
                <div class="col-lg-9">
                    <div class="row g-4">

                        <?php 
                        if ( have_posts() ) {
                            while ( have_posts()) {
                                the_post();
                        ?>

                        <div class="col-lg-4 col-md-6">
                            <article  class="card archive-blog-card"> 
                                
                                <!-- thumbnail as bg img (top) -->
                                <?php 
                                    $url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                ?>     
                                <a href="<?php the_permalink(); ?>">
                                    <div class="card-thumb-bg blog-thumb" style="background-image: url(<?php echo esc_url($url); ?>);"></div> 
                                </a>

                                <!-- content (bottom) -->
                                <div class="archive-blog-content">

                                    <!-- category -->
                                    <div class="meta-item mb-3">
                                        <i class="fa-solid fa-tags"></i>
                                        <span><?php the_category(', '); ?></span>
                                    </div>
                                                                   
                                    <!-- title -->
                                    <h3 class="card-title blog-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3> 

                                    <!-- excerpt  -->
                                    <p class="blog-excerpt">
                                        <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                                    </p>

                                    <!-- button -->
                                    <a href="<?php the_permalink(); ?>" class="btn">Read More >> </a> 

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
                <aside class="col-lg-3 sidebar archive-blog-sidebar">
                    <h3 class="sidebar-heading">Explore Topics</h3>
                    <ul class="sidebar-categories">
                        <?php 
                        wp_list_categories(array(
                            'title_li' => '',
                        )); 
                        ?>
                    </ul>
                </aside>


            </div>
        </div>
    </section>

       
    
</main>


<?php get_footer(); ?>
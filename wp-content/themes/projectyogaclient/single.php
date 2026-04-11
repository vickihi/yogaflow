<!-- ============================= -->
<!--      Blog Single Template     -->
<!-- ============================= -->


<?php get_header(); ?>

<?php
if ( have_posts() ) {
   while ( have_posts() ) {
        the_post();
?>

<main>
    <!-- ====================== Banner Section ====================== -->
    <?php $banner_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
    
    <section class="banner single-blog-banner" style="background-image: url('<?php echo esc_url( $banner_url ); ?>');"> <!-- Each single blog page use a different thumbnail image banner -->
        <div class="container">
            <h1>Single Blog</h1>
            <div class="banner-text">
                <?php //echo $banner_text; ?>
            </div> 
        </div>
    </section>


    <!-- ====================== Main Content (Left + Right) ======================= -->
    <section class="single-blog">
        <div class="container">
            <div class="row g-5">

                <!-- ====== Post Content (Left) ====== -->
                <article class="col-lg-8">
                    <div class="single-blog-header">                       
                            <!-- Meta -->
                            <div class="single-blog-meta d-flex flex-wrap gap-3 mb-3">
                                <!-- Date -->
                                <div class="meta-item d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-clock"></i>
                                    <span><?php the_time('F j, Y'); ?></span>
                                </div>
                                <!-- Category -->
                                <div class="meta-item d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-tags"></i>
                                    <span><?php the_category(', '); ?></span>
                                </div>
                            </div>

                            <!-- Title -->
                            <h1 class="title single-blog-title "><?php the_title(); ?></h1>             
                    </div>
                    
                    <!-- Text -->
                    <div class="single-blog-body">
                        <?php the_content(); ?>
                    </div>

                </article>

                <!-- ====== Sidebar (Right) ====== -->
                <aside class="col-lg-4 sidebar single-blog-sidebar">

                    <!-- Related Posts -->
                    <div class="sidebar-group related-posts mb-5">
                        <h2 class="sidebar-heading">Related Posts</h2>

                        <?php
                        $cats = wp_get_post_categories( get_the_ID() );
                        $related_q = new WP_Query( array(
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post__not_in'   => array( get_the_ID() ),
                            'category__in'   => $cats,
                        ) );

                        if ( $related_q->have_posts() ) :
                            while ( $related_q->have_posts() ) :
                                $related_q->the_post();
                        ?>

                            <article class="sidebar-item d-flex">
                                <a href="<?php the_permalink(); ?>" class="sidebar-thumb">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </a>

                                <div class="sidebar-info">
                                    <h3 class="sidebar-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="sidebar-date"><?php the_time('F j, Y'); ?></p>
                                </div>
                            </article>

                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>

                    </div>

                    <!-- Recent Posts -->
                    <div class="sidebar-group recent-posts mb-5">
                        <h2 class="sidebar-heading">Recent Posts</h2>

                        <?php
                        $recent_q = new WP_Query( array(
                            'post_type'      => 'post',
                            'posts_per_page' => 4,
                            'post__not_in'   => array( get_the_ID() ),
                        ) );

                        if ( $recent_q->have_posts() ) :
                            while ( $recent_q->have_posts() ) : 
                                $recent_q->the_post();
                        ?>

                            <article class="sidebar-item d-flex">
                                <a href="<?php the_permalink(); ?>" class="sidebar-thumb">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </a>

                                <div class="sidebar-info">
                                    <h3 class="sidebar-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="sidebar-date">
                                        <?php the_time('F j, Y'); ?>
                                    </p>
                                </div>
                            </article>

                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>

                    </div>

                </aside>

            </div>
        </div>
    </section>


    <!-- ============================ Navigation Section =============================== -->
    <section class="nav-articles">
        <div class="container">
            <div class="nav-parent">

                <div class="prev">
                    <?php previous_post_link('%link', '← Previous Post'); ?>
                </div>

                <div class="next">
                    <?php next_post_link('%link', 'Next Post →'); ?>
                </div>

            </div>     
        </div>
    </section>

</main>

<?php
    };
};
?>

<?php get_footer(); ?>

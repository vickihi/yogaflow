<!-- ============================= -->
<!--     Class Single Template     -->
<!-- ============================= -->


<?php get_header(); ?>

<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
?>

<main class="single-class">

    <!-- =============================== Banner Section =============================== --> 
    <?php 
    $banner = get_theme_mod('class_banner_image');
    $subtitle = get_theme_mod('class_banner_subtitle');
    ?>

    <section class="banner single-class-banner" style="background-image:url('<?php echo esc_url($banner); ?>')"> <!-- All single class pages use the same banner -->
        <div class="container">
            <h1>Single Class</h1>
            <div class="banner-text">
                <?php echo nl2br(esc_html($subtitle)); ?>
            </div> 
        </div>
    </section>


    <!-- ====================== Content Section (Image + Text ) ======================== -->
    <section class="single-class">
        <div class="container">
            <div class="row g-5 align-items-center">

            <!-- Image -->
            <div class="col-lg-6 thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>

            <!-- Content -->
            <div class="col-lg-6">

                <!-- Title -->
                <h2 class="title"><?php the_title(); ?></h2>

                <!-- Instructor -->
                <div class="d-flex align-items-center gap-2 mb-3">  <!-- User BS because this block is used only once and simple layout -->
                    <i class="fa-solid fa-user"></i>
                    <span><?php the_field('class_instructor'); ?></span>
                </div>

                <!-- Meta info -->
                <div class="class-meta">                            <!-- Use CSS because 'class-meta' is a reusable component -->
                    
                    <div class="meta-item">                        <!-- User CSS because 'class-item' a repeated UI pattern (icon + label)
                                                                         Avoid repeating BS utilities everywhere -->
                        <?php 
                            $levels = get_the_terms(get_the_ID(), 'class_level'); 
                        ?>
                        <i class="fa-solid fa-signal"></i>                                        
                        <span>
                            <?php echo esc_html($levels[0]->name) ?>
                        </span>
                    </div>

                    <div class="meta-item">
                        <?php 
                            $types = get_the_terms(get_the_ID(), 'class_type'); 
                        ?>
                        <i class="fa-solid fa-spa"></i>                                        
                        <span>
                            <?php echo esc_html($types[0]->name) ?>
                        </span>
                    </div>

                    <div class="meta-item">
                        <i class="fa-regular fa-hourglass-half"></i>
                        <span><?php the_field('class_duration'); ?></span>
                    </div>

                </div>

                <!-- Long description -->
                <div class="single-class-description mb-4">
                    <?php the_content(); ?>
                </div>

                <!-- Booking button -->          
                <button type="submit" class="btn booking-btn">
                    Book a Class
                </button>
                

            </div>

        </div>
    </section>


    <!-- ============================ Navigation Section =============================== -->
    <section class="nav-articles">
        <div class="container">
            <div class="nav-parent">

                <div class="prev">
                    <?php previous_post_link('%link', '← Previous Class'); ?>
                </div>

                <div class="next">
                    <?php next_post_link('%link', 'Next Class →'); ?>
                </div>

            </div>     
        </div>
    </section>
  

</main>
<?php
    }
}
?>

<?php get_footer(); ?>

<!-- ====================================================== --> 
<!--                 General Page Template                  --> 
<!-- ====================================================== --> 

<?php get_header(); ?>

<?php 
// begin loop
if ( have_posts() ) {
    while ( have_posts()) {
        the_post();

$banner_img = get_field('page_banner_image'); 
?>

<main>
    <!-- this is general template: about page, contact page, job page in wp Pages will all use this template if no other specific page -->
    
    <!-- ====================================================== --> 
    <!--                    Banner Section                      -->  
    <!-- ====================================================== -->  
    <?php $banner_img = get_field('page_banner_image'); ?>   <!-- ACF field - banner image set in general page -->
    <section class="banner page_banner_image" style="background-image: url(<?php echo esc_url($banner_img); ?>);">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- ====================================================== --> 
    <!--                   Content Section                      -->  
    <!-- ====================================================== -->  
    <section class="page-content">
        <div class="container">
            <div class="page-content-card">
                <?php the_content(); ?>
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
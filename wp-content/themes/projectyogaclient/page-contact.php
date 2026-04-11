<!-- ====================================================== --> 
<!--                 Contact Page Template                  --> 
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
    <!--                   Content Section                      -->  
    <!-- ====================================================== -->  
    <section class="contact-content">
        <div class="container">

            <div class="row g-5">

                <!-- Appointment Form (Left) -->
                <div class="col-md-6">
                    <div class="message-form">
                        <h3>Leave us a message</h3>
                        <form id="messageForm">
                            <div class="form-group">
                                <label for="firstName">First Name *</label>
                                <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name *</label>
                                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone </label>
                                <input type="tel" id="phone" name="phone" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" placeholder="Message" rows="4"></textarea>
                            </div>
                            <div class="checkbox-wrapper">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="agree" required>
                                    I agree to terms & conditions and privacy policy.
                                </label>
                            </div>
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info (Right) -->
                <div class="col-md-6">  
                    <div class="row">

                        <!-- Google Maps -->
                        <div class="col-md-12 map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2797.456183341757!2d-73.57915779999999!3d45.4807577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a7782f3a04d%3A0x282f908b991f5f64!2sAkasha%20Yoga%20Montreal!5e0!3m2!1sen!2sca!4v1765825193212!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-md-12 contact-info">
                            <h3>Contact Information</h3>
                            <div class="info-item">
                                <i class="fa-solid fa-location-dot"></i>
                                <span><?php the_field('contact_address') ?></span>
                            </div>

                            <div class="info-item">
                                <i class="fa-solid fa-envelope"></i>
                                <span><?php the_field('contact_email') ?></span>
                            </div>

                            <div class="info-item">
                                <i class="fa-solid fa-phone"></i>
                                <span><?php the_field('contact_phone') ?></span>
                            </div>
                        </div> 

                    </div>             

                </div>

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
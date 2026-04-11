<!-- ============================= -->
<!--             Footer            -->
<!-- ============================= -->
 
<footer>
        <div class="container py-5">

            <div class="row g-4">

                <!-- Left: Logo -->
                <div class="col-12 col-lg-4 logo-holder">
                    <?php 
                        if( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            echo '<a href=" ' . home_url() . ' ">My site</a>';
                        }              
                    ?>
                </div>
    

                <!-- Right -->
                <div class="col-12 col-lg-8">
                    <div class="row g-4">

                        <!-- Navigation -->
                        <div class="col-4 col-lg-3">
                            <h3>Navigation</h3>
                            <?php
                                wp_nav_menu([
                                    'theme_location'    => 'footer-menu',
                                    'menu_class'        => 'footer-menu',
                                ]);
                            ?>
                        </div>

                        <!-- Useful Links -->
                        <div class="col-4 col-lg-3">
                            <h3>Useful Links</h3>
                            <?php
                                wp_nav_menu([
                                    'theme_location'   => 'footer-link',
                                    'menu_class'       => 'footer-menu',
                                ]);
                            ?>
                        </div>

                        <!-- Instagram -->
                        <?php 
                            $homepage_id = get_option('page_on_front');
                            $insta = get_field('section_footer_instagram_feed', $homepage_id);
                        ?>
                        <div class="col-4 col-lg-6">
                            <h3>Instagram Feed</h3>
                            <div class="row g-2">
                                <?php for ($i = 1; $i <= 6; $i++): 
                                    $img = $insta["instagram_image_$i"];
                                ?>
                                    <div class="col-4 instagram_img">
                                        <img src="<?php echo esc_url($img['url']); ?>" alt="Instagram photo" class="img-fluid rounded">
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <h6>
                Copyright 2025, All rights reserved | This template is made by Weiwei
            </h6>

        </div>
    </footer>

    <?php wp_footer(); ?>




</body>
</html>
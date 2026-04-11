<!-- ============================= -->
<!--              Header           -->
<!-- ============================= -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Yoga Flow</title>

    <?php wp_head(); ?>
</head>

<body>
    <header class="site-header py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                <!-- Logo -->
                <div class="logo-holder">
                    <?php
                        if( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            echo '<a href=" ' . esc_url(home_url()) . ' ">My site</a>';
                        }
                    ?>
                </div>
                

                <div class="right-group d-flex align-items-center">       
                    <!-- Mobile Icons -->
                    <button class="mobile-menu-icon">  
                        <i class="fa-solid fa-bars"></i>  <!-- Hamburger icon -->
                        <i class="fa-solid fa-xmark"></i> <!-- X Close icon -->
                    </button>

                    <!-- Desktop Navigation Menu -->
                    <nav class="menu-holder">   
                        <?php 
                            wp_nav_menu([
                                'theme_location'    => 'header-menu',   // menu location registered in functions.php
                                'container'         => false,           // no adding nav container automatically
                                'menu_class'        => 'menu-list'      // ul class
                            ]) 
                        ?>
                    </nav>
                </div>


            </div>
        </div>   
    </header>
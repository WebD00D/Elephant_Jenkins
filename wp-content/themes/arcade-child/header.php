<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html lang="en-US">
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><html class="no-js" <?php language_attributes(); ?>><![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css"/>
<?php

if(is_page(13168)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-auto-insurance/">
<?php } 

if(is_page(9242)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-auto-insurance-2/">
<?php } 

if(is_page(13184)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-auto-insurance-for-experienced-drivers/">
<?php } 

if(is_page(13247)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-auto-insurance-for-new-cars/">
<?php } 

if(is_page(13261)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-auto-insurance-tn/">
<?php }

if(is_page(13258)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-insurance-for-safer-cars/">
<?php }

if(is_page(13271)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-teen-auto-insurance-quotes/">
<?php }

if(is_page(13270)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-tennessee-auto-insurance-quotes/">
<?php }

if(is_page(10481)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-tennessee-tn-auto-insurance-quotes/">
<?php }

if(is_page(13268)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/elephant-tn-autoinsurance/">
<?php }

if(is_page(9288)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/il-brand/">
<?php }

if(is_page(9288)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/il-product/">
<?php }

if(is_page(10518)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/in-product/">
<?php }

if(is_page(10518)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/in-brand/">
<?php }

if(is_page(9284)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/md-brand/">
<?php }

if(is_page(9284)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/md-product">
<?php }

if(is_page(13257)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/tn-product/">
<?php }

if(is_page(9244)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/tx-brand/">
<?php }

if(is_page(9280)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/va-brand/">
<?php }

if(is_page(10031)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/va-product/">
<?php }

if(is_page(9244)) { ?>
<link rel="amphtml" href="https://www.elephant.com/amp/texas-tx-auto-insurance-quotes/" />
<?php } ?>
    <script src="https://use.fontawesome.com/e205f28467.js"></script>

</head>
<?php
$bavotasan_theme_options = bavotasan_theme_options();
$space_class = '';

?>
<body <?php body_class(); ?>>

<div id="page">

    <?php

        if ( is_page_template('page-templates/template-safecar.php') || is_page_template('page-templates/template-multicar.php') || is_page_template('page-templates/template-multicarHome.php') ) { ?>

            <div class="elephant-navigation <?php if (is_admin_bar_showing()) { echo "admin-bar-margin"; } ?> ">

                <a href="/<?php echo state_geo_url(); ?>"><img alt="elephant insurance" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/logo.svg" /></a>

                <div class="fx fc-a-center">
                  <div class="floating-quote floating-quote--mobile floating-quote--hidden">
                      <button class="floating-quote__btn floating-quote__btn--mobile">Quote</button>
                  </div>
                  <i class="fa fa-bars mobile-menu-icon nav-toggle" ></i>
                </div>
                <div class="elephant-navigation__links">
                    <a href="/car-insurance/insurance">Insurance</a>
                    <a href="/car-insurance/claims" class="ml-92">Claims</a>
                    <a href="/about" class="ml-92">About Us</a>
                </div>
                <div class="elephant-navigation__links">

                    <div class="floating-quote floating-quote--hidden">
                        <button class="floating-quote__btn">Get started</button>
                    </div>

                    <a href="https://mypolicy.elephant.com/#/login" class="js_login_icon tr-smooth fx fc-a-center">
                    <svg  height="12px" style="width: 12px" class="mr-4" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="safe-car" class="icon-svg" transform="translate(-1342.000000, -29.000000)" >
                            <g id="Group-10">
                                <g id="Group-28" transform="translate(1283.000000, 26.000000)">

                                    <g id="Page-1" transform="translate(59.000000, 3.000000)">
                                        <g id="Group-3" transform="translate(0.000000, 5.000000)">
                                            <path d="M8.41992188,6.57303675 L7.33695652e-05,6.57303675 L7.33695652e-05,4.82544135 C7.33695652e-05,2.53667269 1.88486893,0.681169637 4.20999762,0.681169637 L4.20999762,0.681169637 C6.53512631,0.681169637 8.41992188,2.53667269 8.41992188,4.82544135 L8.41992188,6.57303675 Z" id="Fill-1"></path>
                                        </g>
                                        <path d="M4.00009367,5 L4.00009367,5 C2.34998595,5 1,3.85600889 1,2.45785045 L1,2.5423083 C1,1.14399111 2.34998595,0 4.00009367,0 L4.00009367,0 C5.65001405,0 7,1.14399111 7,2.5423083 L7,2.45785045 C7,3.85600889 5.65001405,5 4.00009367,5" id="Fill-4"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                    Login</a>
                </div>

            </div>

            <div class="elephant-mobile-menu d-none">
                <img class="elephant-mobile-menu__close nav-toggle" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/close_icon.png" />
                <div class="elephant-mobile-menu__content">
                    <a href="/car-insurance/claims" class="elephant-mobile-menu__link">Claims</a>
                    <a href="/car-insurance/claims/roadside-assistance" class="elephant-mobile-menu__link">Roadside</a>
                    <a href="/car-insurance/faqs" class="elephant-mobile-menu__link">FAQs</a>
                    <a href="https://mypolicy.elephant.com/#/login" class="elephant-mobile-menu__link">Login</a>
                </div>
            </div>

            <script>

                $(document).ready(function(){

                    $(".nav-toggle").click(function(){
                        $(".elephant-mobile-menu").toggleClass("d-none");
                    })

                    $(window).on("scroll", function() {
                        var currentScroll = $(window).scrollTop();

                        if ( currentScroll >= 400 ) {
                            // show the quote nav button
                            $(".floating-quote").removeClass("floating-quote--hidden");

                        } else {
                            // hide the quote nav button
                            $(".floating-quote").addClass("floating-quote--hidden");
                        }

                    })

                    $(".floating-quote__btn").click(function(){
                        window.location.href = "https://quotes.elephant.com/#/postal-code";
                    })

                })

            </script>

            <!-- Banner -->
            <!-- <div class="alert-message-wp">
                <div>We're upgrading our systems to better serve our customers.  From 8:00pm EST 6/15/2018 until the morning of 6/18/2018 some features will not be available.<br> 
                    We apologize for any inconvenience. Email <a class="hyperlink-text" href="mailto:help@elephant.com">help@elephant.com</a> if you need any assistance during that time.</div>
            </div>    -->

       <?php }

    ?>
 
    <?php

    if ( !is_page_template('page-templates/template-safecar.php') && !is_page_template('page-templates/template-multicar.php') && !is_page_template('page-templates/template-multicarHome.php') ) { ?>

        <div class="extraHeader">
      <div class="extraHeaderWrapper">
        <div class="headerLogo"><a href="/"> <img alt="elephant insurance" src="https://d5prcm06amy2t.cloudfront.net/cms/home+page+images/elephant-160.svg"></a></div>

      </div>
    </div>
    <header id="header">
        <nav id="site-navigation" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <h3 class="sr-only"><?php _e( 'Main menu', 'arcade' ); ?></h3>
            <a class="sr-only" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'arcade' ); ?>"><?php _e( 'Skip to content', 'arcade' ); ?></a>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse">
                <?php
                $menu_class = ( is_rtl() ) ? ' navbar-right' : '';
                $social_class = ( is_rtl() ) ? '' : ' navbar-right';
                wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'nav navbar-nav' . $menu_class, 'fallback_cb' => 'bavotasan_default_menu' ) );

                if ( has_nav_menu( 'social' ) )
                    wp_nav_menu( array( 'theme_location' => 'social', 'container' => 'div', 'container_id' => 'menu-social', 'container_class' => 'menu' . $social_class, 'menu_id' => 'menu-social-items', 'menu_class' => 'menu-items', 'depth' => 1, 'link_before' => '<span class="sr-only">', 'link_after' => '</span>', 'fallback_cb' => '' ) );
                ?>
            </div>
        </nav><!-- #site-navigation -->

        <!-- Banner -->
            <!-- <div class="alert-message-wp">
                <div>We're upgrading our systems to better serve our customers.  From 8:00pm EST 6/15/2018 until the morning of 6/18/2018 some features will not be available.<br> 
                    We apologize for any inconvenience. Email <a class="hyperlink-text" href="mailto:help@elephant.com">help@elephant.com</a> if you need any assistance during that time.</div>
            </div>     -->
    </header>

   <?php } ?>




    <main>



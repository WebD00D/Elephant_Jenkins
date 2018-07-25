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
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
	<?php wp_head(); ?>
</head>
<?php
$bavotasan_theme_options = bavotasan_theme_options();
$space_class = '';
?>
<body <?php body_class(); ?>>

	<div id="page">

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

			 <div class="title-card-wrapper">
                <div class="title-card">
    				<div id="site-meta">
    					<?php if ( $logo = $bavotasan_theme_options['logo'] ) { ?>
    						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" id="site-logo" rel="home"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
    					<?php } else { ?>

						<?php $tag = ( is_front_page() && is_home() ) ? 'h1' : 'div'; ?>
						<<?php echo $tag; ?> id="site-title">
    						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    					</<?php echo $tag; ?>>

                        <?php } ?>

    					<?php if ( $bavotasan_theme_options['header_icon'] ) { ?>
    					<i class="fa <?php echo $bavotasan_theme_options['header_icon']; ?>"></i>
    					<?php } else {
    						$space_class = ' class="margin-top"';
    					} ?>

    					<div id="site-description"<?php echo $space_class; ?>>
    						<?php bloginfo( 'description' ); ?>
    					</div>
						<?php
						/**
						 * You can overwrite the defeault 'See More' text by defining the 'BAVOTASAN_SEE_MORE'
						 * constant in your child theme's function.php file.
						 */
						if ( ! defined( 'BAVOTASAN_SEE_MORE' ) )
							define( 'BAVOTASAN_SEE_MORE', __( 'See More', 'arcade' ) );
						?>
    					<a href="#" id="more-site" class="btn btn-default btn-lg"><?php echo BAVOTASAN_SEE_MORE; ?></a>
    				</div>

    				<?php
    				// Header image section
    				bavotasan_header_images();
    				?>
				</div>
			</div>

		</header>

		<main>
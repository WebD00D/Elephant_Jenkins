<?php
define('CHILD_THEME_URL', '/wp-content/themes/'.get_stylesheet());


add_action( 'wp_enqueue_styles', 'parent_style', 'wp_enqueue_scripts', 'bavotasan_add_js','child_theme_setup');

// add_action('init', 'myoverride', 100);
// function myoverride() { remove_action('wp_head', array(visual_composer(), 'addMetaData'));
// }

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent_style', get_template_directory_uri() . '/style.css' );
}
function bavotasan_add_js() {
    $bavotasan_theme_options = bavotasan_theme_options();
    $slider_options = get_option( 'arcade_slider_settings' );

    $fittext = ( empty( $bavotasan_theme_options['fittext'] ) ) ? '' : $bavotasan_theme_options['fittext'];
    $arc_text = ( is_front_page() ) ? $bavotasan_theme_options['arc'] : $bavotasan_theme_options['arc_inner'];

    $var = array(
        'carousel' => false,
        'autoplay' => false,
        'tooltip' => false,
        'tabs' => false,
        'arc' => absint( $arc_text ),
        'fittext' => esc_attr( $fittext ),
        'maxfont' => $bavotasan_theme_options['site_title_font_size'],
    );

    if ( is_singular() ) {
        if ( get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );

        global $post;
        $content = $post->post_content;
        if ( false !== strpos( $content, '[carousel' ) )
            $var['carousel'] = true;

        if ( false !== strpos( $content, '[tooltip' ) )
            $var['tooltip'] = true;

        if ( false !== strpos( $content, '[tabs' ) )
            $var['tabs'] = true;
    }

    if ( is_front_page() && $slider_options['display'] ) {
        $var['carousel'] = true;
        $var['autoplay'] = $slider_options['autoplay'];
    }

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/library/js/bootstrap.min.js', array( 'jquery' ), '3.0.3', true );
    wp_enqueue_script( 'fillsize', get_template_directory_uri() .'/library/js/fillsize.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'arctext', get_template_directory_uri() .'/library/js/jquery.arctext.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'them_js', CHILD_THEME_URL . '/library/js/theme.js', array( 'bootstrap', 'fillsize', 'arctext' ), '', true );
    wp_enqueue_script( 'yotpo_list', CHILD_THEME_URL . '/library/js/yotpo-reviews-list.js', array( 'them_js' ), '', true );
    wp_enqueue_script( 'yotpo_carousel', CHILD_THEME_URL . '/library/js/yotpo-reviews-carousel.js', array( 'them_js' ), '', true );

    wp_localize_script( 'arctext', 'theme_js_vars', $var );

    wp_enqueue_style( 'theme_stylesheet', get_stylesheet_uri() );

    if ( $google_fonts = bavotasan_font_url() )
        wp_enqueue_style( 'google_fonts', esc_url( $google_fonts ) );

    wp_enqueue_style( 'font_awesome', get_template_directory_uri() .'/library/css/font-awesome.css', false, '4.3.0', 'all' );

}
function child_theme_setup(){
    add_theme_support( 'featured-content', array(
        'filter'     => 'mytheme_get_featured_posts',
        'max_posts'  => 20,
        'post_types' => array( 'post', 'page' ),
    ) );
}

function menu_search($items, $args){
    $search = null;
    if ( $args->theme_location == 'primary' ){
        $search = '<li class="search">';
        $search .= '<form method="get" id="searchform" action="/">';
        $search .= '<span class="fa fa-search"></span>';
        $search .= '<input type="text" class="field" name="s" id="s" placeholder="" />';
        $search .= '</form>';
        $search .= '</li>';
    }
    return $items . $search;
}

if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.11.3');
        wp_enqueue_script('jquery');
}


function state_geo_redirect() {
    if (isset($_GET['noredirect']) || $_SERVER['REQUEST_URI'] !== '/') {
        return;
    }

    $url = state_geo_url();
    if ($url) {
        wp_redirect("/$url");
        exit;
    }

}

function state_geo_url() {
    switch(getenv('HTTP_GEOIP_REGION')) {
        case 'TN':
        case 'IL':
            return 'safe-car';
            break;
        case 'IN':
            return 'multi-car';
            break;
    }

}

/* CUSTOM SIDEBARS */

/* HOMEOWNERS */
function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Homeowners Sidebar', 'your-theme-domain' ),
            'id' => 'homeowners-side-bar',
            'description' => __( 'Homeowners Page Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

/* Safe Car */
    register_sidebar(
        array (
            'name' => __( 'Safe Car Sidebar', 'your-theme-domain' ),
            'id' => 'safecar-side-bar',
            'description' => __( 'Safe Car Page Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

/* Multi Car */
    register_sidebar(
        array (
            'name' => __( 'Multi Car Sidebar', 'your-theme-domain' ),
            'id' => 'multicar-side-bar',
            'description' => __( 'Multi Car Page Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

/* Legacy */
    register_sidebar(
        array (
            'name' => __( 'Legacy Sidebar', 'your-theme-domain' ),
            'id' => 'legacy-side-bar',
            'description' => __( 'Legacy Page Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

/* Moms */
    register_sidebar(
        array (
            'name' => __( 'Moms Sidebar', 'your-theme-domain' ),
            'id' => 'moms-side-bar',
            'description' => __( 'Moms Page Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

add_action('init', 'state_geo_redirect');

add_filter('wp_nav_menu_items','menu_search', 10, 2);

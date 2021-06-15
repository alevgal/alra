<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

add_filter( 'nav_menu_css_class', function ( $classes, $item, $args ){

    if( 'footer_navigation' === $args->theme_location ) {
        $classes[] = 'mb-20';
    } elseif ( in_array($args->theme_location, ['top_banner_navigation', 'bottom_banner_navigation']) ) {
        $classes[] = 'home-banner__list-item';
    }

    return $classes;
}, 10, 3 );

//Remove job manager style

add_filter('job_manager_enqueue_frontend_style', '__return_false');

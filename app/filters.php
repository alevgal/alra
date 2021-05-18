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

add_filter( 'nav_menu_css_class', function ( $classes, $item, $args ){

    if( 'footer_navigation' === $args->theme_location ) {
        $classes[] = 'mb-20';
    }

    return $classes;
}, 10, 3 );

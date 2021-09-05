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

    if( is_page_template('template-sectors.blade.php') || is_tax('sector') ) {
        $classes[] = 'with-sector-select';
    }

    if( is_page_template('template-recruiters.blade.php') ) {
        $classes[] = 'with-calculator';
    }

    if( is_page_template('template-jobs.blade.php') ) {
        $classes[] = 'job-list';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    if( bodyPadding() ) {
        $classes[] = 'body-padding';
    }

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

add_filter('soil/relative-url-filters', function( $filters ) {
    $term_filter_idx = array_search('term_link', $filters);

    if( $term_filter_idx ) {
        unset( $filters[$term_filter_idx] );
    }

    return $filters;
});


add_filter('job_manager_enhanced_select_enabled', function( $page ) {
    if (is_page_template('template-sectors.blade.php') || is_tax('sector') ) {
        $page = true;
    }
    return $page;
});


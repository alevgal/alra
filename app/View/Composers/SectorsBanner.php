<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SectorsBanner extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        "partials.sectors-banner"
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'categories'    => $this->getCategories(),
            'term_id'   => is_tax('sector') ? get_queried_object_id() : 0,
        ];
    }

    public function getCategories() {
        $categories = get_terms( [
            'taxonomy' => 'sector',
            'hide_empty' => false,
            'orderby'   => 'name',
        ] );

        return is_array( $categories ) ? $categories : null;
    }
}

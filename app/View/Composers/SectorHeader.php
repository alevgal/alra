<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SectorHeader extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        "partials.sector-header"
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return $this->getData();
    }

    public function getData()
    {
        $data = [
            'title' => '',
            'description'   => '',
            'titleRight'    => ''
        ];

        if( is_tax('sector')) {
            $term = get_queried_object();
            $data = [
                'title' => get_field('title', $term) ?? $term->name,
                'description'   => get_term_field('description', $term->term_id),
                'titleRight'    => get_field('title_right', $term)
            ];


        }

        return $data;
    }
}

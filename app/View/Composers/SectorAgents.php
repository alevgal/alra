<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SectorAgents extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.sector-agents'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'agents'    => $this->getSectorAgents()
        ];
    }

    public function getSectorAgents()
    {
        $queried_object = get_queried_object();
        $taxonomy = $queried_object->taxonomy;
        $term_id = $queried_object->term_id;

        return get_field('people', $taxonomy . '_' . $term_id);
    }
}

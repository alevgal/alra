<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ArchiveBottom extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        "partials.archive-bottom"
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $fieldOpt = $this->getKey();
        return [
            'fields'    => get_field( $fieldOpt['key'], $fieldOpt['id'])
        ];
    }

    public function getKey()
    {

        if( is_post_type_archive('people') || is_singular('people') || is_tax('sector') ) {
            return [
                'key' => 'agents_bottom_section',
                'id'  => 'option'
            ];
        } elseif( is_page_template('template-jobs.blade.php') ) {
            return [
                'key' => 'jobs_bottom_section',
                'id'  => 'option'
            ];
        } else {
            return [
                'key' => 'bottom_section',
                'id'  => get_the_ID()
            ];
        }
    }
}

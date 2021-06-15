<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ContentJobListing extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        "job_manager.content-job_listing",
        "job_manager.content-single-job_listing"
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'categories'    => $this->getJobCategories([
                'fields'    => 'names'
            ]),
            'salary'    => $this->getJobSalary(),
            'excerpt'   => get_field('short_description'),
            'agent' => get_field('agent'),
            'specialOffer'  => $this->getSpecialOffer(),

        ];
    }

    public function getJobCategories( $args = [] )
    {
        $terms = wp_get_post_terms( get_the_ID(), 'job_listing_category', $args );

        return ! empty( $terms ) && ! is_wp_error( $terms ) ? $terms : false;
    }

    public function getJobSalary()
    {
        $salary = get_field('salary');

        if( ! is_array( $salary ) ) {
            return false;
        }

        return array_map( function( $number ) {
            return number_format( (float) $number, 0, ',', ' ' );
        }, $salary );
    }

    public function getSpecialOffer()
    {
        return get_field('special_offer') ?? get_field('special_offer', 'option');
    }
}

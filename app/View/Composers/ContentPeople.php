<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use function App\formatPhone;

class ContentPeople extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        "partials.content-people",
        "partials.content-single-people"
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'contacts'  => $this->getContacts()
        ];
    }

    public function getContacts()
    {
        $contacts = [];

        if( get_field('mobile') ) {
            $contacts['mobile'] = [
                'value' => get_field('mobile'),
                'formatted' => 'tel:' . formatPhone(get_field('mobile')),
                'icon'  => 'smartphone'
            ];
        }

        if( get_field('phone') ) {
            $contacts['phone'] = [
                'value' => get_field('phone'),
                'formatted' => 'tel:' . formatPhone(get_field('phone')),
                'icon'  => 'phone'
            ];
        }

        if( get_field('email') ) {
            $contacts['email'] = [
                'value' => get_field('email'),
                'formatted' => 'mailto:' . get_field('email'),
                'icon'  => 'envelope'
            ];
        }

        return $contacts;
    }
}

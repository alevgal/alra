<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
    ];

    private $classes = [
      'banner',
      'position-relative',
      'text-white',
      'align-items-center',
      'px-16',
      'py-48',
      'pt-menu-switch-28',
      'pb-menu-switch-64',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'class' => implode( ' ', $this->classes())
        ];
    }

    public function classes()
    {
      $classes = [];

      if( ! in_array(true, [
          is_front_page(),
          is_page_template('template-jobs.blade.php')
      ]) ) {
          $classes[] ='banner-img';
          $classes[] ='beveled-bottom';
      }

      return array_merge( $this->classes, $classes);
    }
}

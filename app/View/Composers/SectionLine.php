<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SectionLine extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.section-line'
    ];

    private $classes = [
        'section-line',
        'text-gun-metal',
        'px-16',
        'pt-64',
        'pb-64',
        'pt-lg-180',
        'pb-lg-170'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'classes'   => implode(' ', $this->classes())
        ];
    }

    public function override() {

        return [
          'content' => $this->content()
        ];
    }

    public function classes()
    {
        $classes = [];

        if( $this->data['withMap'] ) {
            $classes[] = 'with-map';
        }

        if( 'slider' === $this->data['contentType'] ) {
            $classes[] = 'with-slider';
        } elseif( 'list-reverse' === $this->data['contentType'] ) {
            $classes[] = 'list-reverse';
        }



        return array_merge($this->classes, $classes);
    }

    public function content() {
        $return = '';

        if( is_array( $this->data['content'] ) ) {

            switch ($this->data['contentType']) {
                case 'slider':
                    $return .= '<div class="section-line__slider swiper-container mb-32 mb-lg-0"><div class="swiper-wrapper">';
                    break;
                case 'list':
                case 'list-reverse':
                default:
                    $return .= '<ul class="section-line__list list-unstyled text-center mb-10 fw-medium">';
            }

            foreach ( $this->data['content'] as $item ) {
                switch ($this->data['contentType']) {
                    case 'slider':
                        $return .= '<div class="swiper-slide"><p>' . esc_html( $item ) . '</p></div>';
                        break;
                    case 'list-reverse':
                        $return .= '<li class="section-line__item-big">' . $item . '</li>';
                        break;
                    case 'list':
                    default:
                        $return .= '<li>' . $item . '</li>';
                }
            }

            switch ($this->data['contentType']) {
                case 'slider':
                    $return .= '</div>
                                    <div class="swiper-button-prev">
                                        <i class="icon-arrow-left" aria-hidden="true"></i>
                                        <span class="sr-only">Prev</span>
                                    </div>
                                    <div class="swiper-button-next">
                                        <i class="icon-arrow-right" aria-hidden="true"></i>
                                        <span class="sr-only">Next</span>
                                    </div>  
                                </div>';
                    break;
                case 'list':
                default:
                    $return .= '</ul>';
            }

        } else {
            $return = $this->data['content'];
        }

        return $return;
    }
}

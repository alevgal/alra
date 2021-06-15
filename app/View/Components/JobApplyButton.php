<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class JobApplyButton extends Component
{

    public $base_classes = [
        'btn',
        'btn-dark',
        'fw-medium'
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(  )
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return candidates_can_apply() ? $this->view('components.job-apply-button') : '';
    }
}

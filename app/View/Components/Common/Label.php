<?php

namespace App\View\Components\Common;

use Illuminate\View\Component;

class Label extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $label,
        public $attribute,
        public $class = '',
        public $model = '',
        public $required = false,
        public $showAsterisk = false,
        public $tooltip = ''
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.label');
    }
}

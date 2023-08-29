<?php

namespace App\View\Components\Common;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $type,
        public $attribute,
        public $placeholder = '',
        public $value = '',
        public $min = '',
        public $required = false,
        public $readonly = false,
        public $disabled = false,
        public $tooltip = '',
        public $maxlength = ''
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.common.input');
    }
}

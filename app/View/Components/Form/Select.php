<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $attribute,
        public $label = '',
        public $required = false,
        public $readonly = false,
        public $disabled = false,
        public $multiselect = false,
        public $show_label = true,
        public $class = '',
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
        return view('components.form.select');
    }
}

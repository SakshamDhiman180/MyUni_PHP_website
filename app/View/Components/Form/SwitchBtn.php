<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SwitchBtn extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $attribute,
        public $value,
        public $label,
        public $checked = false
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.switch-btn');
    }
}

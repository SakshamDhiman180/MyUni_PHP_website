<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class ContactNumber extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $attribute,
        public $placeholder = '',
        public $required = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.contact-number');
    }
}

<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioUserType extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $class = '',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.radio-user-type');
    }
}

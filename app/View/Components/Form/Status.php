<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Status extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $attribute = 'status',
        public $value = '',
        public $label = 'Status',
        public $checked = ''
    ) {
        $this->checked = config('constants.status.active') == $checked ? 1 : 0;
        $this->value = config('constants.status.active');
        $this->label = __('Status');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.status');
    }
}

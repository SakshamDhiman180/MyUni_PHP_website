<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class FileUpload extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $name,
        public $labelText = null,
        public $required = false,
        public $disabled = false,
        public $accept = '*',
        public $fileUrl = null,
        public $value = '',
        public $multiple = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.file-upload');
    }
}

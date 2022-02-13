<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name,$class,$type,$value,$label,$placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name=null,$class=null,$type='text',$value=null,$label='Input Label',$placeholder=null)
    {
        $this->name = $name;
        $this->class = $class;
        $this->type = $type;
        $this->value = $value;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}

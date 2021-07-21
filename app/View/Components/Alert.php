<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $title;
    public string $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type, string $title, string $message)
    {
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    public string $route;

    public function __construct(string $route)
    {
        $this->route = $route;
    }

    public function render()
    {
        return view('components.delete-modal');
    }
}
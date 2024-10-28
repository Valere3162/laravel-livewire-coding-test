<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Layout extends Component
{
    public function render(): View
    {
        return view('components.layouts.app');
    }
}


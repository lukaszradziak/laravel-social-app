<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class Premium extends Component
{
    public function render()
    {
        return view('livewire.premium', [
            'items' => Item::where('active', 1)->get()
        ]);
    }
}

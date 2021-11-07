<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $query;
    public $users = [];

    protected $rules = [
        'query' => 'required|min:3',
    ];

    public function updatedQuery($value)
    {
        $this->users = [];
        $this->validate();

        $this->users = User::where('name', 'like', '%'.$value.'%')
            ->limit(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.search');
    }
}

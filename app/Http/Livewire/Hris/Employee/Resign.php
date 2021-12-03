<?php

namespace App\Http\Livewire\Hris\Employee;

use App\Models\User;
use Livewire\Component;

class Resign extends Component
{
    public function render()
    {
        $users = User::onlyTrashed()->get();
        return view('livewire.hris.employee.resign', compact('users'));
    }
}

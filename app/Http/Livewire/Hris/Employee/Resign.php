<?php

namespace App\Http\Livewire\Hris\Employee;

use App\Models\employeeResign;
use App\Models\User;
use Livewire\Component;

class Resign extends Component
{
    public function restoreEmployee($user)
    {
        $softdelete = employeeResign::where('user_id', $user['id']);
        $softdelete->delete();
        $restore = User::onlyTrashed()->where('id', $user['id']);
        $restore->restore();

        session()->flash('success', 'restore successfully!');
    }
    public function render()
    {
        $users = User::onlyTrashed()->get();
        return view('livewire.hris.employee.resign', compact('users'));
    }
}

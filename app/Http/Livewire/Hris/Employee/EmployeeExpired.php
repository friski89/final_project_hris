<?php

namespace App\Http\Livewire\Hris\Employee;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class EmployeeExpired extends Component
{
    public $searchTerm = null;
    protected $queryString = ['searchTerm' => ['except' => '']];

    public function render()
    {
        $user = User::find(1);
        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now()->startOfMonth()->subMonth(-2);

        $employees = User::search($this->searchTerm)
            ->whereNotNull('end_date')
            ->whereNotIn('end_date', ['1970-01-01'])
            ->whereBetween('end_date', [$dateS, $dateE])
            ->latest()
            ->paginate(10);



        return view('livewire.hris.employee.employee-expired', compact('employees'));
    }
}

<?php

namespace App\View\Components;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now()->startOfMonth()->subMonth(-2);

        $employees = User::whereNotNull('end_date')
            ->whereNotIn('end_date', ['1970-01-01'])
            ->whereBetween('end_date', [$dateS, $dateE])
            ->latest();

        return view('components.header', compact('employees'));
    }
}

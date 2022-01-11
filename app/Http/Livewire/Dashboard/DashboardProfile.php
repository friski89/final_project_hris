<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class DashboardProfile extends Component
{
    public $linkID = "my profile";

    public function profileLink($linkID)
    {
        $this->linkID = $linkID;
    }
    protected $listeners = ['profileLink' => '$refresh'];
    public function render()
    {
        $linkID = $this->linkID;
        return view('livewire.dashboard.dashboard-profile', compact('linkID'));
    }
}

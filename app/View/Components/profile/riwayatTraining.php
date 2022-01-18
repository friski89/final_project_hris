<?php

namespace App\View\Components\profile;

use Illuminate\View\Component;

class riwayatTraining extends Component
{
    public $user;


    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $user = $this->user;
        return view('components.profile.riwayat-training', compact('user'));
    }
}

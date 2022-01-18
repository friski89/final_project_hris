<?php

namespace App\View\Components\profile;

use Illuminate\View\Component;

class penilaianKinerja extends Component
{
    public $user;


    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $user = $this->user;
        return view('components.profile.penilaian-kinerja', compact('user'));
    }
}

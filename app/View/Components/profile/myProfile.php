<?php

namespace App\View\Components\profile;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class myProfile extends Component
{

    public $user;


    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $user = $this->user;
        return view('components.profile.my-profile', compact('user'));
    }
}

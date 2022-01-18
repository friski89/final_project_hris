<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignedUserController extends Controller
{
    public function list()
    {
        return view('assign.list');
    }

    public function sync($id)
    {
        dd($id);
    }
}

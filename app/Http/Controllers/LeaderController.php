<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\LeaderImport;

class LeaderController extends Controller
{
    public function index()
    {
        return view('leader.index');
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $import = new LeaderImport();
        $import->import($file);

        return redirect()->route('leader.index')->withSuccess('Import Data Has Been Successfully');
    }

    // public function view($nik)
    // {
    //     $user = User::where('nik_company', $nik)->first();
    //     $linkID = 'my profile';
    //     return view('profile.leader_view', compact('user', 'linkID'));
    // }
}

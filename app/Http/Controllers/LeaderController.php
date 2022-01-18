<?php

namespace App\Http\Controllers;

use App\Imports\LeaderImport;
use Illuminate\Http\Request;

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
}

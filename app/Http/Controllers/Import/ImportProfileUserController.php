<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\ImportProfileUser;
use Illuminate\Http\Request;

class ImportProfileUserController extends Controller
{
    public function store(Request $request)
    {

        $file = $request->file('file');
        $import = new ImportProfileUser();
        $import->import($file);

        return redirect()->route('users.index')->withSuccess('Import Data Has Been Successfully');
    }
}

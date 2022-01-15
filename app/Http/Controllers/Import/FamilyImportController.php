<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\FamilyImport;
use Illuminate\Http\Request;

class FamilyImportController extends Controller
{
    public function store(Request $request)
    {

        $file = $request->file('file');
        $import = new FamilyImport();
        $import->import($file);

        return redirect()->route('users.index')->withSuccess('Import Data Has Been Successfully');
    }
}

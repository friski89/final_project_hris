<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\EmployeeImport;
use Illuminate\Http\Request;

class EmployeeImportController extends Controller
{
    public function store(Request $request)
    {

        $file = $request->file('file');
        $import = new EmployeeImport();
        $import->import($file);

        return redirect()->route('users.index')->withSuccess('Import Data Has Been Successfully');
    }
}

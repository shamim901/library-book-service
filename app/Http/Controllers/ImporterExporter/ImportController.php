<?php

namespace App\Http\Controllers\ImporterExporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importView(Request $request){
        
        return view('importFile');
    }

    public function import(Request $request){
        
        Excel::import(new ImportUsers, $request->file('file')->store('files'));
        
        return redirect()->back();
    }
}

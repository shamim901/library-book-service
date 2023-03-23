<?php

namespace App\Http\Controllers\ImporterExporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Exports\ExportUserView;

class ExportController extends Controller
{
    public function exportUsers(Request $request) {

        return Excel::download(new ExportUser, 'users.xlsx');
    }

    public function exportUsersView(Request $request) {

        $data = User::select('name','email')->get();

        return Excel::download(new ExportUserView('excel.user-excel', $data), 'user-excel.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\InformationsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export() 
    {
        return Excel::download(new InformationsExport, 'kpi_informations.xlsx');
    }
}

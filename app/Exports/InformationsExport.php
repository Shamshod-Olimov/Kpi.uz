<?php

namespace App\Exports;

use App\Models\Kpi;
use Maatwebsite\Excel\Concerns\FromCollection;

class InformationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kpi::all();
    }
}

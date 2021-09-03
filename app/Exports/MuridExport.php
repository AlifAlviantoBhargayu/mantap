<?php

namespace App\Exports;

use App\Muridreport;
use Maatwebsite\Excel\Concerns\FromCollection;

class MuridExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return muridreport::all();
    }
}

<?php

namespace App\Http\Controllers;
use App\murid;
use Illuminate\Http\Request;

class IjasahController extends Controller
{
    public function cetak($id)
    {
        $murid = Murid::find($id);
        return view ('ijasah.cetak',['murid' => $murid]);
    }
}

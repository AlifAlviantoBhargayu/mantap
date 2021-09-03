<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiPendaftaranController extends Controller
{
    public function index()
    {
    	return view('informasipendaftaran.index');
    }
}

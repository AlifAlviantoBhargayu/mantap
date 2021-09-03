<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalSiswaController extends Controller
{
	 public function index()
    {
    	return view('JadwalSiswa.index');
    }
}

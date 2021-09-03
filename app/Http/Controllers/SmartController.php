<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;

class SmartController extends Controller
{
   public function index()
   {
       $kriteria = \App\Kriteria::all();
       return view('smart.index',['kriteria' => $kriteria]);
   }
    public function create(Request $request)
    {
        \App\Kriteria::create($request->all());
        return redirect('/smart')->with('sukses', 'Data Berhasil Diinput');
    }
}

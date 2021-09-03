<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $jadwal_murid = \App\Jadwal::where('nama_murid','LIKE','%'.$request->cari. '%')->get();
        }else{
            $jadwal_murid = \App\Jadwal::all();
        }

        return view('jadwal.index', ['jadwal_murid' => $jadwal_murid]);
    }



    public function create(Request $request)
{
    \App\Jadwal::create($request->all());
    return redirect('/jadwal')->with('sukses', 'Data Berhasil Diinput');
}

    public function edit($id)
    {
        $jadwal = \App\Jadwal::find($id);
        return view('jadwal/editjadwal',['jadwal' =>$jadwal]);
    }
    public function update(Request $request,$id)
    {
        $jadwal = \App\Jadwal::find($id);
        $jadwal->update($request->all());
        return redirect('/jadwal')->with('sukses','Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $jadwal = \App\Jadwal::find($id);
        $jadwal ->delete($jadwal);
        return redirect('/jadwal')->with('sukses','Data Berhasil Di Hapus');
    }


}

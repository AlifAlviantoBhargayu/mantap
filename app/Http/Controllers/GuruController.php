<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_guru = \App\Guru::where('nama_lengkap','LIKE','%'.$request->cari. '%')->get();
        }else{
            $data_guru = \App\Guru::all();
        }

        return view('Guru.index', ['data_guru' => $data_guru]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_lengkap'=>'required|min:15',
            'email' => 'required|email|unique:users',
            'tempat_tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'latar_belakang_pendidikan' => 'required',
        ]);

        // insert ke tabel users
        $user = new \App\User;
        $user -> role = 'Guru';
        $user ->    name = $request->nama_lengkap;
        $user -> email = $request->email;
        $user -> password = bcrypt('guru');
        $user -> remember_token=str_random(60);
        $user ->save();

        // insert ke table guru
        $request->request->add(['user_id' => $user->id]);
        $guru =\App\Guru::create($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();

        }

        return redirect('/guru')->with('sukses', 'Data Berhasil Diinput');
    }

    public function edit($id)
    {
        $guru = \App\Guru::find($id);
        return view('guru/edit',['guru' =>$guru]);
    }
    public function update(Request $request,$id)
    {


        $guru = \App\Guru::find($id);
        $guru->update($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();

        }
        return redirect('/guru')->with('sukses','Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $guru = \App\Guru::find($id);
        $guru ->delete($guru);
        return redirect('/guru')->with('sukses','Data Berhasil Di Hapus');
    }
}

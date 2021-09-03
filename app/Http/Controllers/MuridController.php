<?php

namespace App\Http\Controllers;

use App\Murid;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class MuridController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_murid = \App\Murid::where('nama_lengkap','LIKE','%'.$request->cari. '%')->get();
        }else{
            $data_murid = \App\Murid::all();
        }

        return view('murid.index', ['data_murid' => $data_murid]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_lengkap'=>'required|min:5',
            'email' => 'required|email|unique:users',
            'nama_orangtua' => 'required',
            'kelas' => 'required',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'bunda_id' => 'required',
        ]);

        // insert ke tabel users
        $user = new \App\User;
        $user -> role = 'murid';
        $user ->    name = $request->nama_lengkap;
        $user -> email = $request->email;
        $user -> password = bcrypt('anakhebat');
        $user -> remember_token=str_random(60);
        $user ->save();

        // insert ke table murid
        $request->request->add(['user_id' => $user->id]);
        $murid =\App\Murid::create($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $murid->avatar = $request->file('avatar')->getClientOriginalName();
            $murid->save();

        }

        return redirect('/murid')->with('sukses', 'Data Berhasil Diinput');
    }

    public function edit($id)
    {
        $murid = \App\Murid::find($id);
        return view('murid/edit',['murid' =>$murid]);
    }
    public function update(Request $request,$id)
    {


        $murid = \App\Murid::find($id);
        $murid->update($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $murid->avatar = $request->file('avatar')->getClientOriginalName();
            $murid->save();

        }
        return redirect('/murid')->with('sukses','Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $murid = \App\Murid::find($id);
        $murid ->delete($murid);
        return redirect('/murid')->with('sukses','Data Berhasil Di Hapus');
    }
    public function profile($id)
    {
        $murid = \App\Murid::find($id);
        $reportmurid = \App\Report::all();
        $reportmurid2 = \App\Report2::all();
        $reportmurid3 = \App\Report3::all();
        $reportmurid4 = \App\Report4::all();
        $reportmurid5 = \App\Report5::all();
        $reportmurid6 = \App\Report6::all();
        $reportmurid7 = \App\Report7::all();


        // data untuk chart

        $categories = [];
        $data = [];

foreach ($reportmurid as $rm){
   if($murid->report()->wherePivot('report_id',$rm->id)->first()){
       $categories[] = $rm->kriteria;
       $data[] = $murid->report()->wherePivot('report_id' ,$rm->id)->first()->pivot->hasil;
         }

}

//dd($categories2);
        return view('murid.profile',['murid' => $murid, 'reportmurid' => $reportmurid, 'reportmurid2' => $reportmurid2, 'reportmurid3' => $reportmurid3 , 'reportmurid4' => $reportmurid4 , 'reportmurid5' => $reportmurid5, 'reportmurid6' => $reportmurid6 , 'reportmurid7' => $reportmurid7, 'categories' => $categories, 'data' => $data]);
}


    public function addnilai(Request $request,$idmurid)
    {
        $murid = \App\Murid::find($idmurid);
        if($murid->report()->where('report_id',$request->report)->exists()){
            return redirect('murid/'.$idmurid. '/profile')->with('Gagal','Data Sudah Ada');
        }

        $murid->report()->attach($request->report,['hasil' => $request->hasil]);

        if($murid->report2()->where('report2_id',$request->report2)->exists()){
            return redirect('murid/'.$idmurid. '/profile')->with('Gagal','Data Sudah Ada');
        }

        $murid->report2()->attach($request->report2,['hasil2' => $request->hasil2]);

        if($murid->report3()->where('report3_id',$request->report3)->exists()){
            return redirect('murid/'.$idmurid. '/profile')->with('Gagal','Data Sudah Ada');
        }

        $murid->report3()->attach($request->report3,['hasil3' => $request->hasil3]);

        if($murid->report4()->where('report4_id',$request->report4)->exists()){
            return redirect('murid/'.$idmurid. '/profile')->with('Gagal','Data Sudah Ada');
        }

        $murid->report4()->attach($request->report4,['hasil4' => $request->hasil4]);

        if($murid->report5()->where('report5_id',$request->report5)->exists()){
            return redirect('murid/'.$idmurid. '/profile')->with('Gagal','Data Sudah Ada');
        }

        $murid->report5()->attach($request->report5,['hasil5' => $request->hasil5]);

        if($murid->report6()->where('report6_id',$request->report6)->exists()){
            return redirect('murid/'.$idmurid. '/profile')->with('Gagal','Data Sudah Ada');
        }

        $murid->report6()->attach($request->report6,['hasil6' => $request->hasil6]);

        if($murid->report7()->where('report7_id',$request->report7)->exists()){
            return redirect('murid/'.$idmurid. '/profile')->with('Gagal','Data Sudah Ada');
        }

        $murid->report7()->attach($request->report7,['hasil7' => $request->hasil7]);

        return redirect('murid/'.$idmurid. '/profile')->with('sukses','Data Berhasil Di Masukan');
    }

    public function deletehasil($idmurid,$idreport)

    {

    $murid = \App\Murid::find($idmurid);
    $murid->report()->detach($idreport);
    return redirect()->back()->with('sukses','Data nilai berhasil dihapus');

}
    public function deletehasil2($idmurid,$idreport2)

    {

        $murid = \App\Murid::find($idmurid);
        $murid->report2()->detach($idreport2);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');

    }
    public function deletehasil3($idmurid,$idreport3)

    {

        $murid = \App\Murid::find($idmurid);
        $murid->report3()->detach($idreport3);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');

    }
    public function deletehasil4($idmurid,$idreport4)

    {

        $murid = \App\Murid::find($idmurid);
        $murid->report4()->detach($idreport4);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');

    }
    public function deletehasil5($idmurid,$idreport5)

    {

        $murid = \App\Murid::find($idmurid);
        $murid->report5()->detach($idreport5);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');

    }
    public function deletehasil6($idmurid,$idreport6)

    {

        $murid = \App\Murid::find($idmurid);
        $murid->report6()->detach($idreport6);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');

    }
    public function deletehasil7($idmurid,$idreport7)

    {

        $murid = \App\Murid::find($idmurid);
        $murid->report7()->detach($idreport7);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');

    }
public function export() 
    {
        return Excel::download(new muridReportExport, 'muridReport.xlsx');
    }
}

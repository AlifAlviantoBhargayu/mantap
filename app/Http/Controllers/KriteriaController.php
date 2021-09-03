<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class KriteriaController extends Controller

{
    public function index(){
        $items = Kriteria::all();


        return view('penilaian.index', [
            'items' => $items
        ]);
    }


    public function store(Request $request){

        $data = $request->all();

        Kriteria::create($data);

        $items = Kriteria::all();

        foreach($items as $item);
        $bobot = $item->bobot;
        $bobot_relatif = $item->bobot_relatif;

     $br = $bobot / $item->sum('bobot');

while($bobot_relatif){

        $item['bobot_relatif'] = $br;

        $item->save();

        return redirect()->route('kriteria.index')->with('status', 'Data berhasil ditambah');
    }}


    public function edit($id){

        $item = Kriteria::find($id);

        return view('penilaian.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id){
        $kriteria = Kriteria::find($id);

        $data = $request->all();

        $kriteria->update($data);

        $all = Kriteria::all();

        foreach($all as $l);

        $total_bobot = $l->sum('bobot');

        // dd($total_bobot);

        $perid = Kriteria::where('id', $kriteria->id)->get();

        // dd($perid);
        foreach($perid as $pid);
        $bobot = $pid->bobot;

        $hitung = $bobot/$total_bobot;

        $bobot_relatif_per_id = Kriteria::where('id', $kriteria->id)->update([
            'bobot_relatif' => $hitung

        ]);


        return redirect()->route('kriteria.index');
    }

    public function destroy($id){
        $item = Kriteria::find($id);

        $item->delete();

        return redirect()->route('kriteria.index')->with('status', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bunda;
class BundaController extends Controller
{
    protected function profile($id)

    {
        $bunda = Bunda::find($id);
        return view ('bunda.profile',['bunda' => $bunda]);
    }

    public function edit($id)
    {
        $bunda = \App\Bunda::find($id);
        return view('bunda/edit',['bunda' =>$bunda]);
    }

    public function update(Request $request,$id)
    {


        $bunda = \App\Bunda::find($id);
        $bunda->update($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $bunda->avatar = $request->file('avatar')->getClientOriginalName();
            $bunda->save();

        }
        return redirect('/murid')->with('sukses','Data Berhasil Di Update');
    }
}

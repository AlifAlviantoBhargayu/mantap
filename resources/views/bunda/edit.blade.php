@extends('layouts.master')
@section('isi')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">


                        <form action="/bunda/{{$bunda->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{$bunda->nama}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">TTL</label>
                                <input name="TTL" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Tanggal Lahir" value="{{$bunda->TTL}}">
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                    <option value="L" @if($bunda->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                    <option value="P" @if($bunda->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Agama</label>
                                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$bunda->agama}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat" value="{{$bunda->alamat}}" >

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Pendidkan Terakhir</label>
                                <input name="pendidikan_terakhir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pendidikan Terakhir" value="{{$bunda->pendidikan_terakhir}}">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Whatsapp</label>
                                <textarea name="whatsapp" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$bunda->whatsapp}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>


    @stop
@section('isi1')
<h1>Edit Data Guru</h1>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">



    </div>
</div>
@endsection

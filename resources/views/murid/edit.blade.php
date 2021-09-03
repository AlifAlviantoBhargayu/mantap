@extends('layouts.master')
@section('isi')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">


                        <form action="/murid/{{$murid->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{$murid->nama_lengkap}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Orangtua</label>
                                <input name="nama_orangtua" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Orangtua" value="{{$murid->nama_orangtua}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="{{$murid->kelas}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Asal Sekolah</label>
                                <input name="asal_sekolah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Asal Sekolah" value="{{$murid->asal_sekolah}}" >

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                    <option value="L" @if($murid->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                    <option value="P" @if($murid->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Agama</label>
                                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$murid->agama}}">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$murid->alamat}}</textarea>
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
<h1>Edit Data Murid</h1>
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

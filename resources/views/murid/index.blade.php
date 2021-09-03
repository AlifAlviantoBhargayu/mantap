@extends('layouts.master')
@section('isi')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Murid</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>
                                    </button>


                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>NAMA LENGKAP</th>
                                        <th>NAMA ORANGTUA</th>
                                        <th>KELAS</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>GURU</th>
                                        <th>AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_murid as $murid)
                                        <tr>
                                            <td><a href="/murid/{{$murid->id}}/profile"> {{$murid ->nama_lengkap}}</a></td>
                                            <td>{{$murid ->nama_orangtua}}</td>
                                            <td>{{$murid ->kelas}}</td>
                                            <td>{{$murid ->asal_sekolah}}</td>
                                            <td>{{$murid ->jenis_kelamin}}</td>
                                            <td>{{$murid ->agama}}</td>
                                            <td>{{$murid ->alamat}}</td>
                                            <td><a href="/bunda/{{$murid->bunda_id}}/profile">{{$murid->bunda->nama}}</a> </td>
                                            <td><a href="/murid/{{$murid->id}}/edit" class="btn btn-warning btn-sm">Edit</a> </td>
                                            <td><a href="/murid/{{$murid->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a> </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Diri Murid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/kriteria/create" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group{{$errors->has('nama_lengkap')? ' has-error ' : ''}}">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{old('nama_lengkap')}}">

                            @if($errors->has('nama_lengkap'))
                                <span class="help-block">{{$errors->first('nama_lengkap')}}</span>
                            @endif
                        </div>
                        <div class="form-group{{$errors->has('email')? ' has-error ' : ''}}">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">

                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('nama_orangtua')? ' has-error ' : ''}}">
                            <label for="exampleInputEmail1">Nama Orangtua</label>
                            <input name="nama_orangtua" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Orangtua" value="{{old('nama_orangtua')}}">

                            @if($errors->has('nama_orangtua'))
                                <span class="help-block">{{$errors->first('nama_orangtua')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('kelas')? ' has-error ' : ''}}">
                            <label for="exampleInputEmail1">Kelas</label>
                            <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="{{old('kelas')}}">

                            @if($errors->has('kelas'))
                                <span class="help-block">{{$errors->first('kelas')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('asal_sekolah')? ' has-error ' : ''}}">
                            <label for="exampleInputEmail1">Asal Sekolah</label>
                            <input name="asal_sekolah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Asal Sekolah" value="{{old('asal_sekolah')}}">

                            @if($errors->has('asal_sekolah'))
                                <span class="help-block">{{$errors->first('asal_sekolah')}}</span>
                            @endif

                        </div>

                        <div class="form-group{{$errors->has('jenis_kelamin')? ' has-error ' : ''}}">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option value="L"{{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-Laki</option>
                                <option value="P"{{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
                            </select>
                            @if($errors->has('jenis_kelamin'))
                                <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('agama')? ' has-error ' : ''}}">
                            <label for="exampleInputEmail1">Agama</label>
                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
                            @if($errors->has('agama'))
                                <span class="help-block">{{$errors->first('agama')}}</span>
                            @endif

                        </div>
                        <div class="form-group{{$errors->has('alamat')? ' has-error ' : ''}}">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>

                            @if($errors->has('alamat'))
                                <span class="help-block">{{$errors->first('alamat')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('bunda_id')? ' has-error ' : ''}}">
                            <label for="exampleFormControlSelect1">Guru</label>
                            <select name="bunda_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="1"{{(old('bunda_id') == '1') ? 'selected' : ''}}>YONI</option>
                                <option value="2"{{(old('bunda_id') == '2') ? 'selected' : ''}}>YOGI</option>
                                <option value="3"{{(old('bunda_id') == '3') ? 'selected' : ''}}>YUNI</option>
                            </select>

                            @if($errors->has('bunda_id'))
                                <span class="help-block">{{$errors->first('bunda_id')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop




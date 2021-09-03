@extends('layouts.master')
@section('isi')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Jadwal</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>
                                    </button>


                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>NAMA MURID</th>
                                        <th>HARI</th>
                                        <th>TANGGAL</th>
                                        <th>JAM</th>
                                        <th>AKSI</th>
                                        <th>HAPUS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jadwal_murid as $jadwal)
                                        <tr>
                                            <td>{{$jadwal ->nama_murid}}</td>
                                            <td>{{$jadwal ->hari}}</td>
                                            <td>{{$jadwal ->tanggal}}</td>
                                            <td>{{$jadwal ->jam}}</td>
                                            <td><a href="/jadwal/{{$jadwal->id}}/edit" class="btn btn-warning btn-sm">Edit</a> </td>
                                            <td><a href="/jadwal/{{$jadwal->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a> </td>
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
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Belajar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/jadwal/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Murid</label>
                            <input name="nama_murid" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Murid">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hari</label>
                            <input name="hari" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hari">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal</label>
                            <input name="tanggal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jam</label>
                            <select name="jam" class="form-control" id="exampleFormControlSelect1">
                                <option>10.00</option>
                                <option>11.30</option>
                                <option>13.00</option>
                                <option>15.00</option>
                            </select>
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
    </div>
@stop




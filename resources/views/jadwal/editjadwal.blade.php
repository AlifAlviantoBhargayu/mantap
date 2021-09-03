@extends('layouts.master')
@section('isi')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">


                        <form action="/jadwal/{{$jadwal->id}}/update" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jadwal</label>
                                <input name="nama_murid" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Murid" value="{{$jadwal->nama_murid}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hari</label>
                                <input name="hari" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hari" value="{{$jadwal->hari}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal</label>
                                <input name="tanggal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tanggal" value="{{$jadwal->tanggal}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jam</label>
                                <select name="jam" class="form-control" id="exampleFormControlSelect1">
                                    <option value="Pagi" @if($jadwal->jam == 'Pagi') selected @endif>10.00</option>
                                    <option value="Siang" @if($jadwal->jam == 'Siang') selected @endif>11.30</option>
                                    <option value="Siang" @if($jadwal->jam == 'Siang') selected @endif>13.00</option>
                                    <option value="Sore" @if($jadwal->jam == 'Sore') selected @endif>15.00</option>
                                </select>
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
    </div>
    </div>


@stop
@section('isi1')
    <h1>Edit Jadwal Sukses</h1>
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

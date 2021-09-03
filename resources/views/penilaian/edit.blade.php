@extends('layouts.master')
@section('isi')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">


                        <form action="{{ route('kriteria.update', $item->id) }}" method="POST">
                          @csrf
                          @method('put')


                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kriteria</label>
                                <input name="nama_kriteria" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{$item->nama_kriteria}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Bobot</label>
                                <input name="bobot" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Orangtua" value="{{$item->bobot}}">
                            </div>


                                <button class="btn btn-sm btn-warning" type="submit">
                                    Update
                                </button>
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

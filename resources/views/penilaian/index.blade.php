@extends('layouts.master')
@section('isi')
    <div class="main">

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Smart</h3>
                <div class="row">
                    <div class="col-md-8">
                        <!-- PANEL HEADLINE -->
                        <div class="panel panel-headline">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Kriteria</h1>
                                </div>
                <div class="col-lg-8">
                    <form action="{{ route('kriteria.store') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <form role="form" action="" method="POST">
                        <div class="form-group">
                            <input type="text"  name="nama_kriteria" class="form-control" placeholder="NAMA KRITERIA">
                        </div>
                        <div class="form-group">
                            <input type="text"  name="bobot" class="form-control" placeholder="BOBOT">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="form-control btn btn-success form-control" value="submit" placeholder="submit">
                        </div>

                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>



                            <div class="col-lg-12" style="margin-top: 50px;">
                                <div class="panel panel-default">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
              @endif
                                    <div class="panel-heading">
                                        Data Kriteria
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Nama Kriteria</th>
                                                    <th>Bobot Kriteria</th>
                                                    <th>Bobot Relatif</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- mengeluarkan data siswa dari database -->
                                                @foreach($items as $kriteria)
                                                <tr>
                                                    <td>{{$kriteria->nama_kriteria}}</td>
                                                    <td>{{$kriteria->bobot}}</td>
                                                    <td>{{$kriteria->bobot_relatif}}</td>
                                                    <td>
                                                        <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                                        <a href="{{ route('kriteria.destroy', $kriteria->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin menghapus data?');">Hapus</a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                <tr class="inverse">
                                                    <td colspan="1">Total</td>
                                                    <td class="text-center" colspan="2">{{ $items->sum('bobot')}}</td>
                                                </tr>

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
        </div>
    </div>






@endsection

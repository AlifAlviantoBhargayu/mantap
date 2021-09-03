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
                    <form action="/kriteria/create" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <form role="form" action="" method="POST">
                        <div class="form-group">
                            <input type="text" required name="nama_kriteria" class="form-control" placeholder="NAMA KRITERIA">
                        </div>
                        <div class="form-group">
                            <input type="text" required name="bobot" class="form-control" placeholder="BOBOT">
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

                            <div class="col-lg-12">
                                <div class="panel panel-default">
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
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- mengeluarkan data siswa dari database -->
                                                @foreach($kriteria as $kriteria)
                                                <tr>
                                                    <td>{{$kriteria->nama_kriteria}}</td>
                                                    <td>{{$kriteria->bobot}}</td>
                                                    <td class="text-right"></td>
                                                </tr>
                                                @endforeach

                                                <tr class="inverse">
                                                    <td colspan="2">Total</td>
                                                    <td class="text-right">100</td>
                                                    <td></td>
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

@extends('layouts.master')
@section('isi')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">

                @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{session('sukses')}}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif

                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img width="100" height="100" src="{{$murid->getAvatar()}}" class="img-circle" alt="Avatar" >
                                    <h3 class="name">{{$murid->nama_lengkap}}</h3>
                                    <span class="online-status status-available">Available</span>

                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-4 stat-item">
                                             <span>...........</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                      {{$murid->rataRataHasil()}}<span>RataRataNilai</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                             <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Biodata</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>Nama Lengkap <span>{{$murid->nama_lengkap}}</span></li>
                                        <li>Kelas <span>{{$murid->kelas}}</span></li>
                                        <li>Asal Sekolah <span> {{$murid->asal_sekolah}}</span></li>
                                        <li>Agama <span>{{$murid->agama}}</span></li>
                                        <li>Jenis Kelamin <span>{{$murid->jenis_kelamin}}</span></li>
                                        <li>Alamat <span>{{$murid->alamat}}</span></li>
                                        <li>Nama Orang Tua <span>{{$murid->nama_orangtua}}</span></li>
                                        <div class="text-center"><a href="/murid/{{$murid->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                                        <br>
                                        <div class="text-center"><a href="/whatsapp" class="btn btn-danger">Kirim Pesan</a></div>
                                        <br>
                                        <div class="text-center"><a href="/muridreport/export" class="btn btn-primary">Export</a></div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->

                        <div class="profile-right">

                            @if(auth()->user()->role == 'admin')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#1" id="level1">1</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#2" id="level2">2</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#3" id="level3">3</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#4" id="level4">4</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#5" id="level5">5</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#6" id="level6">6</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#7" id="level7">7</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#8" id="level8">8</button>
                            <button class="text-center"><a href="/ijasah/{{$murid->id}}/cetak" class="btn btn-link">Cetak Ijasah</a></button>
@endif
                            <!-- AWARDS -->
                            <!-- END AWARDS -->
                            <!-- TABBED CONTENT -->

                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Level 1</a></li>
                                    <li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Level 2</a></li>
                                    <li class=""><a href="#tab-bottom-left3" role="tab" data-toggle="tab">Level 3</a></li>
                                    <li class=""><a href="#tab-bottom-left4" role="tab" data-toggle="tab">Level 4</a></li>
                                    <li class=""><a href="#tab-bottom-left5" role="tab" data-toggle="tab">Level 5</a></li>
                                    <li class=""><a href="#tab-bottom-left6" role="tab" data-toggle="tab">Level 6</a></li>
                                    <li class=""><a href="#tab-bottom-left7" role="tab" data-toggle="tab">Level 7</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <ul class="list-unstyled activity-timeline">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Hasil</th>
                                                <th>Guru</th>
                                                @if(auth()->user()->role == 'admin')
                                                <th>Aksi</th>
@endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($murid->report as $report)
                                                <tr>
                                                    <td>{{$report->no}}</td>
                                                    <td>{{$report->kriteria}}</td>
                                                    <td>{{$report->pivot->hasil}}</td>
                                                     <td>{{$murid->bunda->nama}}</td>
                                                
                                                    @if(auth()->user()->role == 'admin')
                                                    <td><a href="/murid/{{$murid->id}}/{{$report->id}}/deletehasil" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a></td>
                                               @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </ul>

                                </div>
                                <div class="tab-pane fade in " id="tab-bottom-left2">
                                    <ul class="list-unstyled activity-timeline">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Hasil</th>
                                                <th>Guru</th>
                                                @if(auth()->user()->role == 'admin')
                                                <th>Aksi</th>
 @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($murid->report2 as $report2)
                                                <tr>
                                                    <td>{{$report2->no}}</td>
                                                    <td>{{$report2->kriteria}}</td>
                                                    <td>{{$report2->pivot->hasil2}}</td>
                                                    <td><a href="/bunda/{{$murid->bunda_id}}/profile">{{$murid->bunda->nama}}</a> </td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td><a href="/murid/{{$murid->id}}/{{$report2->id}}/deletehasil2" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a></td>
  @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </ul>
                                    <div class="panel">
                                        <div id="Hasil2">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in " id="tab-bottom-left3">
                                    <ul class="list-unstyled activity-timeline">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Hasil</th>
                                                <th>Guru</th>
                                                @if(auth()->user()->role == 'admin')
                                                <th>Aksi</th>
   @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($murid->report3 as $report3)
                                                <tr>
                                                    <td>{{$report3->no}}</td>
                                                    <td>{{$report3->kriteria}}</td>
                                                    <td>{{$report3->pivot->hasil3}}</td>
                                                    <td><a href="/bunda/{{$murid->bunda_id}}/profile">{{$murid->bunda->nama}}</a> </td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td><a href="/murid/{{$murid->id}}/{{$report3->id}}/deletehasil3" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a></td>
    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </ul>
                                </div>
                                <div class="tab-pane fade in " id="tab-bottom-left4">
                                    <ul class="list-unstyled activity-timeline">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Hasil</th>
                                                <th>Guru</th>
                                                @if(auth()->user()->role == 'admin')
                                                <th>Aksi</th>
    @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($murid->report4 as $report4)
                                                <tr>
                                                    <td>{{$report4->no}}</td>
                                                    <td>{{$report4->kriteria}}</td>
                                                    <td>{{$report4->pivot->hasil4}}</td>
                                                    <td><a href="/bunda/{{$murid->bunda_id}}/profile">{{$murid->bunda->nama}}</a> </td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td><a href="/murid/{{$murid->id}}/{{$report4->id}}/deletehasil4" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a></td>
    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </ul>
                                </div>
                                <div class="tab-pane fade in " id="tab-bottom-left5">
                                    <ul class="list-unstyled activity-timeline">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Hasil</th>
                                                <th>Guru</th>
                                                @if(auth()->user()->role == 'admin')
                                                <th>Aksi</th>
    @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($murid->report5 as $report5)
                                                <tr>
                                                    <td>{{$report5->no}}</td>
                                                    <td>{{$report5->kriteria}}</td>
                                                    <td>{{$report5->pivot->hasil5}}</td>
                                                    <td><a href="/bunda/{{$murid->bunda_id}}/profile">{{$murid->bunda->nama}}</a> </td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td><a href="/murid/{{$murid->id}}/{{$report5->id}}/deletehasil5" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a></td>
    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </ul>
                                </div>
                                <div class="tab-pane fade in " id="tab-bottom-left6">
                                    <ul class="list-unstyled activity-timeline">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Hasil</th>
                                                <th>Guru</th>
                                                @if(auth()->user()->role == 'admin')
                                                <th>Aksi</th>
    @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($murid->report6 as $report6)
                                                <tr>
                                                    <td>{{$report6->no}}</td>
                                                    <td>{{$report6->kriteria}}</td>
                                                    <td>{{$report6->pivot->hasil6}}</td>
                                                    <td><a href="/bunda/{{$murid->bunda_id}}/profile">{{$murid->bunda->nama}}</a> </td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td><a href="/murid/{{$murid->id}}/{{$report6->id}}/deletehasil6" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a></td>
    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </ul>
                                </div>
                                <div class="tab-pane fade in " id="tab-bottom-left7">
                                    <ul class="list-unstyled activity-timeline">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Hasil</th>
                                                <th>Guru</th>
                                                @if(auth()->user()->role == 'admin')
                                                <th>Aksi</th>
    @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($murid->report7 as $report7)
                                                <tr>
                                                    <td>{{$report7->no}}</td>
                                                    <td>{{$report7->kriteria}}</td>
                                                    <td>{{$report7->pivot->hasil7}}</td>
                                                    <td><a href="/bunda/{{$murid->bunda_id}}/profile">{{$murid->bunda->nama}}</a> </td>
                                                    @if(auth()->user()->role == 'admin')
                                                    <td><a href="/murid/{{$murid->id}}/{{$report7->id}}/deletehasil7" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya..?')">Delete</a></td>
    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </ul>
                                </div>

                            </div>
                                <div class="panel">
                                    <div id="chartHasil">
                                    </div>
                                </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

<!--- isi dari input button nilai-->

    <div class="modal fade" id="1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"             >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                    <b>  <p style="color:black"> Level 1 </p></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/murid/{{$murid->id}}/addnilai" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="report">Kriteria</label>
                            <select class="form-control" id="report" name="report">
                                @foreach( $reportmurid as $rp)
                                    <option value="{{$rp->id}}">{{$rp->kriteria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{$errors->has('hasil')? ' has-error ' : ''}}">
                            <select name="hasil" class="form-control" id="exampleFormControlSelect1">
                                <option value="10"{{(old('hasil') == '10') ? 'selected' : ''}}>10</option>
                                <option value="20"{{(old('hasil') == '20') ? 'selected' : ''}}>20</option>
                                <option value="30"{{(old('hasil') == '30') ? 'selected' : ''}}>30</option>
                                <option value="40"{{(old('hasil') == '40') ? 'selected' : ''}}>40</option>
                                <option value="50"{{(old('hasil') == '50') ? 'selected' : ''}}>50</option>
                                <option value="60"{{(old('hasil') == '60') ? 'selected' : ''}}>60</option>
                                <option value="70"{{(old('hasil') == '70') ? 'selected' : ''}}>70</option>
                                <option value="80"{{(old('hasil') == '80') ? 'selected' : ''}}>80</option>
                                <option value="90"{{(old('hasil') == '90') ? 'selected' : ''}}>90</option>
                            </select>
                            @if($errors->has('hasil'))
                                <span class="help-block">{{$errors->first('hasil')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"             >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                    <b>  <p style="color:black"> Level 2 </p></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/murid/{{$murid->id}}/addnilai2" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="report">Kriteria</label>
                            <select class="form-control" id="report2" name="report2">
                                @foreach( $reportmurid as $rp2)
                                    <option value="{{$rp2->id}}">{{$rp2->kriteria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{$errors->has('hasil2')? ' has-error ' : ''}}">
                            <select name="hasil2" class="form-control" id="exampleFormControlSelect1">
                                <option value="10"{{(old('hasil2') == '10') ? 'selected' : ''}}>10</option>
                                <option value="20"{{(old('hasil2') == '20') ? 'selected' : ''}}>20</option>
                                <option value="30"{{(old('hasil2') == '30') ? 'selected' : ''}}>30</option>
                                <option value="40"{{(old('hasil2') == '40') ? 'selected' : ''}}>40</option>
                                <option value="50"{{(old('hasil2') == '50') ? 'selected' : ''}}>50</option>
                                <option value="60"{{(old('hasil2') == '60') ? 'selected' : ''}}>60</option>
                                <option value="70"{{(old('hasil2') == '70') ? 'selected' : ''}}>70</option>
                                <option value="80"{{(old('hasil2') == '80') ? 'selected' : ''}}>80</option>
                                <option value="90"{{(old('hasil2') == '90') ? 'selected' : ''}}>90</option>
                            </select>
                            @if($errors->has('hasil2'))
                                <span class="help-block">{{$errors->first('hasil2')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"             >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                    <b>  <p style="color:black"> Level 3 </p></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/murid/{{$murid->id}}/addnilai3" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="report">Kriteria</label>
                            <select class="form-control" id="report3" name="report3">
                                @foreach( $reportmurid as $rp3)
                                    <option value="{{$rp3->id}}">{{$rp3->kriteria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{$errors->has('hasil3')? ' has-error ' : ''}}">
                            <select name="hasil3" class="form-control" id="exampleFormControlSelect1">
                                <option value="10"{{(old('hasil3') == '10') ? 'selected' : ''}}>10</option>
                                <option value="20"{{(old('hasil3') == '20') ? 'selected' : ''}}>20</option>
                                <option value="30"{{(old('hasil3') == '30') ? 'selected' : ''}}>30</option>
                                <option value="40"{{(old('hasil3') == '40') ? 'selected' : ''}}>40</option>
                                <option value="50"{{(old('hasil3') == '50') ? 'selected' : ''}}>50</option>
                                <option value="60"{{(old('hasil3') == '60') ? 'selected' : ''}}>60</option>
                                <option value="70"{{(old('hasil3') == '70') ? 'selected' : ''}}>70</option>
                                <option value="80"{{(old('hasil3') == '80') ? 'selected' : ''}}>80</option>
                                <option value="90"{{(old('hasil3') == '90') ? 'selected' : ''}}>90</option>
                            </select>
                            @if($errors->has('hasil3'))
                                <span class="help-block">{{$errors->first('hasil3')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"             >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                    <b>  <p style="color:black"> Level 4 </p></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/murid/{{$murid->id}}/addnilai4" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="report">Kriteria</label>
                            <select class="form-control" id="report4" name="report4">
                                @foreach( $reportmurid as $rp4)
                                    <option value="{{$rp4->id}}">{{$rp4->kriteria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{$errors->has('hasil4')? ' has-error ' : ''}}">
                            <select name="hasil4" class="form-control" id="exampleFormControlSelect1">
                                <option value="10"{{(old('hasil4') == '10') ? 'selected' : ''}}>10</option>
                                <option value="20"{{(old('hasil4') == '20') ? 'selected' : ''}}>20</option>
                                <option value="30"{{(old('hasil4') == '30') ? 'selected' : ''}}>30</option>
                                <option value="40"{{(old('hasil4') == '40') ? 'selected' : ''}}>40</option>
                                <option value="50"{{(old('hasil4') == '50') ? 'selected' : ''}}>50</option>
                                <option value="60"{{(old('hasil4') == '60') ? 'selected' : ''}}>60</option>
                                <option value="70"{{(old('hasil4') == '70') ? 'selected' : ''}}>70</option>
                                <option value="80"{{(old('hasil4') == '80') ? 'selected' : ''}}>80</option>
                                <option value="90"{{(old('hasil4') == '90') ? 'selected' : ''}}>90</option>
                            </select>
                            @if($errors->has('hasil4'))
                                <span class="help-block">{{$errors->first('hasil4')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"             >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                    <b>  <p style="color:black"> Level 5 </p></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/murid/{{$murid->id}}/addnilai5" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="report">Kriteria</label>
                            <select class="form-control" id="report5" name="report5">
                                @foreach( $reportmurid as $rp5)
                                    <option value="{{$rp5->id}}">{{$rp5->kriteria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{$errors->has('hasil5')? ' has-error ' : ''}}">
                            <select name="hasil5" class="form-control" id="exampleFormControlSelect1">
                                <option value="10"{{(old('hasil5') == '10') ? 'selected' : ''}}>10</option>
                                <option value="20"{{(old('hasil5') == '20') ? 'selected' : ''}}>20</option>
                                <option value="30"{{(old('hasil5') == '30') ? 'selected' : ''}}>30</option>
                                <option value="40"{{(old('hasil5') == '40') ? 'selected' : ''}}>40</option>
                                <option value="50"{{(old('hasil5') == '50') ? 'selected' : ''}}>50</option>
                                <option value="60"{{(old('hasil5') == '60') ? 'selected' : ''}}>60</option>
                                <option value="70"{{(old('hasil5') == '70') ? 'selected' : ''}}>70</option>
                                <option value="80"{{(old('hasil5') == '80') ? 'selected' : ''}}>80</option>
                                <option value="90"{{(old('hasil5') == '90') ? 'selected' : ''}}>90</option>
                            </select>
                            @if($errors->has('hasil5'))
                                <span class="help-block">{{$errors->first('hasil5')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"             >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                    <b>  <p style="color:black"> Level 6 </p></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/murid/{{$murid->id}}/addnilai6" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="report">Kriteria</label>
                            <select class="form-control" id="report6" name="report6">
                                @foreach( $reportmurid as $rp6)
                                    <option value="{{$rp6->id}}">{{$rp6->kriteria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{$errors->has('hasil6')? ' has-error ' : ''}}">
                            <select name="hasil6" class="form-control" id="exampleFormControlSelect1">
                                <option value="10"{{(old('hasil6') == '10') ? 'selected' : ''}}>10</option>
                                <option value="20"{{(old('hasil6') == '20') ? 'selected' : ''}}>20</option>
                                <option value="30"{{(old('hasil6') == '30') ? 'selected' : ''}}>30</option>
                                <option value="40"{{(old('hasil6') == '40') ? 'selected' : ''}}>40</option>
                                <option value="50"{{(old('hasil6') == '50') ? 'selected' : ''}}>50</option>
                                <option value="60"{{(old('hasil6') == '60') ? 'selected' : ''}}>60</option>
                                <option value="70"{{(old('hasil6') == '70') ? 'selected' : ''}}>70</option>
                                <option value="80"{{(old('hasil6') == '80') ? 'selected' : ''}}>80</option>
                                <option value="90"{{(old('hasil6') == '90') ? 'selected' : ''}}>90</option>
                            </select>
                            @if($errors->has('hasil6'))
                                <span class="help-block">{{$errors->first('hasil6')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"             >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                    <b>  <p style="color:black"> Level 7 </p></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/murid/{{$murid->id}}/addnilai7" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="report">Kriteria</label>
                            <select class="form-control" id="report7" name="report7">
                                @foreach( $reportmurid as $rp7)
                                    <option value="{{$rp7->id}}">{{$rp7->kriteria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{$errors->has('hasil7')? ' has-error ' : ''}}">
                            <select name="hasil7" class="form-control" id="exampleFormControlSelect1">
                                <option value="10"{{(old('hasil7') == '10') ? 'selected' : ''}}>10</option>
                                <option value="20"{{(old('hasil7') == '20') ? 'selected' : ''}}>20</option>
                                <option value="30"{{(old('hasil7') == '30') ? 'selected' : ''}}>30</option>
                                <option value="40"{{(old('hasil7') == '40') ? 'selected' : ''}}>40</option>
                                <option value="50"{{(old('hasil7') == '50') ? 'selected' : ''}}>50</option>
                                <option value="60"{{(old('hasil7') == '60') ? 'selected' : ''}}>60</option>
                                <option value="70"{{(old('hasil7') == '70') ? 'selected' : ''}}>70</option>
                                <option value="80"{{(old('hasil7') == '80') ? 'selected' : ''}}>80</option>
                                <option value="90"{{(old('hasil7') == '90') ? 'selected' : ''}}>90</option>
                            </select>
                            @if($errors->has('hasil7'))
                                <span class="help-block">{{$errors->first('hasil7')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@stop
@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
   <script>
       Highcharts.chart('chartHasil', {
           chart: {
               type: 'column'
           },
           title: {
               text: 'Laporan Hasil Murid'
           },
           xAxis: {
               categories: <?php echo json_encode($categories) ?>,
               crosshair: true
           },
           yAxis: {
               min: 0,
               title: {
                   text: 'Hasil'
               }
           },
           tooltip: {
               headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
               pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                   '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
               footerFormat: '</table>',
               shared: true,
               useHTML: true
           },
           plotOptions: {
               column: {
                   pointPadding: 0.2,
                   borderWidth: 0
               }
           },
           series: [{
               name: 'Hasil',
               data: <?php echo json_encode($data) ?>
           }]
       });
   </script>
@stop

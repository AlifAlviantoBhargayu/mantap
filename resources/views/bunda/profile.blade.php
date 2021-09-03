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
                                    <img width="100" height="100" src="{{$bunda->getAvatar()}}" class="img-circle" alt="Avatar">
                                    <h3 class="name">{{$bunda->nama}}</h3>
                                    <span class="online-status status-available">Available</span>

                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                    </div>
                                </div>
                            </div>

                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Biodata Guru</h4>
                                    <ul class="list-unstyled list-justify">
                                        <br>
                                        <li>Nama Lengkap <span>{{$bunda->nama}}</span></li>
                                        <li>TTL <span>{{$bunda->TTL}}</span></li>
                                        <li>Jenis Kelamin <span>{{$bunda->jenis_kelamin}}</span></li>
                                        <li>Agama <span>{{$bunda->agama}}</span></li>
                                        <li>Alamat <span>{{$bunda->alamat}}</span></li>
                                        <li>Pendidikan Terakhir <span>{{$bunda->pendidikan_terakhir}}</span></li>
                                        <li>Whatsapp <span>{{$bunda->whatsapp}}</span></li>
                                        <br>
                                        <div class="text-center"><a href="/bunda/{{$bunda->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->

                        <div class="profile-right">
                            <h3 class="panel-title">Murid Yang Diajar Bunda {{$bunda->nama}}</h3>
                            <!-- TABBED CONTENT -->
                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <!--  <li><a href="#tab-bottom-left3" role="tab" data-toggle="tab">Projects </a></li>-->
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="panel-heading">
                                </div>
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <ul class="list-unstyled activity-timeline">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Jenis Kelamin</th>
                                            </tr>
                                            </thead>
                                            <tbody>
@foreach($bunda->murid as $murid)
                                                <tr>
                                                    <td>{{$murid->nama_lengkap}}</td>
                                                    <td>{{$murid->kelas}}</td>
                                                    <td>{{$murid->jenis_kelamin}}</td>
                                                </tr>
    @endforeach
                                            </tbody>
                                        </table>
                                    </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>

@stop


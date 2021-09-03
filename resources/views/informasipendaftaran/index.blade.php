@extends('layouts.master')
@section('isi')

    <div class="main">

        <!-- MAIN CONTENT -->
        <div class="main-content">

            <div class="container-fluid">

                <h3 class="page-title">Home</h3>

                <div class="row">

                    <div class="col-md-8">
                        <!-- PANEL HEADLINE -->
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h2 class="panel-title">AHE UNIT 1133</h2>
                                <p class="panel-subtitle">Information Baru</p>
                            </div>
                            <div class="panel-body">
                                <h3>Pendaftaran Siswa Baru</h3>
                                <p>Pendaftaran Siswa Baru Belajar Baca Ahe Dan Hitung Ase Unit 1133 Jagabaya 3 Wayhalim Masih Dibuka Ya. Mulai Belajar Senin, 6 juli 2020. Yuk Daftarkan Putra/Putrinya Yang Belum Bisa Membaca Atau Belum Lancar Membaca Ke Ahe.</p>
                            </div>
                        </div>
                        <!-- END PANEL HEADLINE -->
                    </div>
                    <div class="col-md-4">

                        <!-- PANEL NO PADDING -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">LOGO AHE</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                </div>
                            </div>
                            <div class="">
                                <div class="padding-top-29 padding-bottom-29">
                                    <img src="{{asset('admin/assets/img/ahee.png')}}" style="display: block;margin: auto;">
                                </div>

                            </div>
                        </div>
                        <!-- END PANEL NO PADDING -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- PANEL DEFAULT -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Manfaat Anak Yang Sudah Bisa Baca</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <p>- Nyaman Saat Kelas 1 SD/MI -</p>
                                <p>- Bisa Mengikuti Pelajaran Di Kelasnya -</p>
                                <p>- TIDAK MINDER -</p>
                                <p>- Expresinya Tampak Ceria -</p>
                            </div>
                        </div>
                        <!-- END PANEL DEFAULT -->
                    </div>

                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-user"></i></span>
                            <p>
                                <span class="number">{{totalBunda()}}</span>
                                <span class="title">GURU</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-user-circle"></i></span>
                            <p>
                                <span class="number">{{totalMurid()}}</span>
                                <span class="title">TOTAL MURID</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

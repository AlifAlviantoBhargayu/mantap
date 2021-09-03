@extends('layouts.master')
@section('isi')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="container">



                            <form action="kirim" method="post" target="_blank">
                                @csrf

                                <form>
                                    <legend>Kirim Pesan Whatsapp</legend>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" id="disabledTextInput" class="form-control"  placeholder="nama" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nowa" class="form-label">Nomer Whatsapp</label>
                                        <input type="text" id="disabledTextInput" class="form-control"   placeholder="nowa" name="nowa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pesan" class="form-label">Pesan Tambahan</label>
                                        <input type="text" id="disabledTextInput" class="form-control"  placeholder="Pesan Tambahan" name="pesan">
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary">Kirim</button>

                                </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

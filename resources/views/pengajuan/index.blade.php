@extends('layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            {{-- <div class="block-header">
                <h2>FORMULIR PENGAJUAN RUMAH</h2>
            </div> --}}
            {{-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FOTO RUMAH YANG DIAJUKAN
                                <small>Pure css animations - <a href="https://daneden.github.io/animate.css/"
                                        target="_blank">daneden.github.io/animate.css</a></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <img src="{{ asset('template') }}/images/t120-bg.jpg"
                              width="150" height="200"  class="js-animating-object img-responsive">
                            <div class="demo-image-copyright">
                                This image taken from <a href="{{ asset('template') }}/images/t120.jpg" target="_blank">Unsplash</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Masked Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA RUMAH YANG DIAJUKAN
                                <small>Taken from <a href="https://github.com/RobinHerbots/jquery.inputmask"
                                        target="_blank">Mohon diisi data berikut</a></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <b>Kode Rumah</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            @foreach ($data_pengajuan as $pengajuan)
                                                <div>
                                                    <input type="text" disabled
                                                        value="{{ $pengajuan->rumah->kode_rumah }}"
                                                        class="form-control date" placeholder="Ex: 30/07/2016">
                                                </div>
                                            @endforeach 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Type Rumah</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control" value="11223344111">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>ID PLN</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">electric_bolt</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control time12"
                                                    value="11223344111">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>ID PDAM</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">water_drop</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control datetime"
                                                    value="11223344111">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Alamat</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">add_location
                                                </i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control mobile-phone-number"
                                                    value="11223344111">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Latitude</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">gps_fixed</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control mobile-phone-number"
                                                    value="11223344111">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Longtitude</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">gps_fixed</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control money-dollar"
                                                    value="11223344111">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>NIK Calon Penghuni</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control money-euro"
                                                    value="11223344111">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Nama Calon Penghuni</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control ip" value="FAJRIANSYAH">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Email Calon Penghuni</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control ip" value="FAJRIANSYAH">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Perusahaan Calon Penghuni</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">business</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control ip"
                                                    value="FAJRIANSYAH">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Kontak</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">contacts</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control ip"
                                                    value="FAJRIANSYAH">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Jumlah Penghuni</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">groups</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="number" min="1" class="form-control number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <b>Foto Kartu Pegawai</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">image</i>
                                            </span>
                                            <input type="file" class="form-control" name="foto" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button"
                                            class="btn btn-primary btn-lg m-l-15 waves-effect">AJUKAN</button>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <b>Serial Key</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">vpn_key</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control key"
                                                    placeholder="Ex: XXX0-XXXX-XX00-0XXX">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Masked Input -->
        </div>
    </section>
@endsection

@push('javascript')
    <!-- Jquery Core Js -->
    <script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('template') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('template') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('template') }}/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('template') }}/js/admin.js"></script>
    <script src="{{ asset('template') }}/js/pages/ui/animations.js"></script>

    <!-- Demo Js -->
    <script src="{{ asset('template') }}/js/demo.js"></script>
@endpush

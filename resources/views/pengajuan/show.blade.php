@extends('layout.layout')
@section('content')
    @if (auth()->user()->role == 'Admin')
        <section class="content">
            <div class="container-fluid">
                <!-- Masked Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    <strong>Error:</strong>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="header">
                                <h2>
                                    DATA RUMAH YANG DIAJUKAN
                                    {{-- <small>Taken from <a href="https://github.com/RobinHerbots/jquery.inputmask"
                                            target="_blank">Mohon diisi data berikut</a></small> --}}
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
                                <form id="form_advanced_validation"
                                    action="{{ route('pengajuan.update', $data_pengajuan->id) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="demo-masked-input">
                                        <div class="row clearfix">
                                            <div class="col-md-3">
                                                <b>Kode Rumah </b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">home</i>
                                                    </span>
                                                    <div>
                                                        <input type="text" name="kode_rumah" disabled
                                                            value="{{ $data_pengajuan->id }} " class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Type Rumah</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">home</i>
                                                    </span>
                                                    <div>
                                                        <input type="text" name="type" disabled class="form-control"
                                                            value="{{ $data_pengajuan->rumah->type->nama_type }}">
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
                                                        <input type="text" name="pln" disabled class="form-control "
                                                            value="{{ $data_pengajuan->rumah->pln }}">
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
                                                        <input type="text" name="pdam" disabled class="form-control "
                                                            value="{{ $data_pengajuan->rumah->pdam }}">
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
                                                        <input type="text" name="alamat" disabled class="form-control "
                                                            value="{{ $data_pengajuan->rumah->alamat }}">
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
                                                        <input type="text" disabled
                                                            class="form-control mobile-phone-number"
                                                            value="{{ $data_pengajuan->rumah->latitude }}">
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
                                                            value="{{ $data_pengajuan->rumah->longtitude }}">
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
                                                            value="{{ $data_pengajuan->user->nik }}">
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
                                                        <input type="text" disabled class="form-control ip"
                                                            value="{{ $data_pengajuan->user->name }}">
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
                                                        <input type="text" disabled class="form-control ip"
                                                            value="{{ $data_pengajuan->user->email }}">
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
                                                            value="{{ $data_pengajuan->user->perusahaan }}">
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
                                                            value="{{ $data_pengajuan->user->kontak }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Harga per Tahun</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">money</i>
                                                    </span>
                                                    <div>
                                                        <input type="number" name="price" readonly
                                                            class="form-control ip"
                                                            value="{{ $data_pengajuan->rumah->type->harga }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Jumlah Penghuni</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">groups</i>
                                                    </span>
                                                    <div>
                                                        <input type="number" min="1" class="form-control number"
                                                            value="{{ $data_pengajuan->jumlah_penghuni }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <b>Foto Kartu Pegawai</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">image</i>
                                                    </span>
                                                    <a href="{{ asset('template') }}/images/image-gallery/1.jpg"
                                                        target="_blank" data-sub-html="Demo Description">
                                                        Foto Kartu Pegawai
                                                    </a>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <b>Kode Pengajuan</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">confirmation_number</i>
                                                    </span>
                                                    <div>
                                                        <input type="text" class="form-control text"
                                                            value="{{ $data_pengajuan->kode_pengajuan }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <b>Status Pengajuan</b>
                                                <select class="form-control show-tick" name="status_pengajuan">
                                                    <option value="SETUJU">Setuju</option>
                                                    <option value="TOLAK">Tolak</option>
                                                </select>
                                            </div>


                                            <div class="col-sm-3">
                                                <b>Catatan</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">note</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="catatan"
                                                            value="{{ $data_pengajuan->catatan }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <button class="btn btn-primary waves-effect"
                                                        data-type="showConfirmtolakMessage" type="submit">SUBMIT</button>
                                                </div>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- #END# Masked Input -->
            </div>
        </section>
    @elseif (auth()->user()->role == 'Guest')
        <section class="content">
            <div class="container-fluid">
                <!-- Masked Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    <strong>Error:</strong>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif
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
                                <form id="form_advanced_validation" action="{{ route('pengajuan.store') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="demo-masked-input">
                                        <div class="row clearfix">
                                            <div class="col-md-3">
                                                <b>Kode Rumah</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">home</i>
                                                    </span>
                                                    <div>
                                                        <input type="text" name="kode_rumah" disabled
                                                            value="{{ $data_rumah->kode_rumah }}"
                                                            class="form-control date">
                                                        <input type="hidden" name="rumah_id"
                                                            value="{{ $data_rumah->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Type Rumah</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">home</i>
                                                    </span>
                                                    <div>
                                                        <input type="text" name="type" disabled
                                                            class="form-control"
                                                            value="{{ $data_rumah->type->nama_type }}">
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
                                                        <input type="text" name="pln" disabled
                                                            class="form-control time12" value="{{ $data_rumah->pln }}">
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
                                                        <input type="text" name="pdam" disabled
                                                            class="form-control datetime"
                                                            value="{{ $data_rumah->pdam }}">
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
                                                        <input type="text" name="alamat" disabled
                                                            class="form-control mobile-phone-number"
                                                            value="{{ $data_rumah->alamat }}">
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
                                                        <input type="text" disabled
                                                            class="form-control mobile-phone-number"
                                                            value="{{ $data_rumah->latitude }}">
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
                                                            value="{{ $data_rumah->longtitude }}">
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
                                                            value="{{ $data_user->nik }}">
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
                                                        <input type="text" disabled class="form-control ip"
                                                            value="{{ $data_user->name }}">
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
                                                        <input type="text" disabled class="form-control ip"
                                                            value="{{ $data_user->email }}">
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
                                                            value="{{ $data_user->perusahaan }}">
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
                                                            value="{{ $data_user->kontak }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Harga per Tahun</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">money</i>
                                                    </span>
                                                    <div>
                                                        <input type="number" name="price" readonly
                                                            class="form-control ip"
                                                            value="{{ $data_rumah->type->harga }}">
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
                                                            name="jumlah_penghuni" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <b>Foto Kartu Pegawai</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">image</i>
                                                    </span>
                                                    <input type="file" class="form-control" name="foto_kartu_penghuni"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit"
                                                    class="btn btn-primary btn-lg m-l-15 waves-effect">AJUKAN</button>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- #END# Masked Input -->
            </div>
        </section>
    @endif
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
    <script src="{{ asset('template') }}/js/pages/ui/dialogs.js"></script>
@endpush

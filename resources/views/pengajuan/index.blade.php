@extends('layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (auth()->user()->role == 'Admin')
                <div class="block-header">
                    <h2> DATA RUMAH YANG DIAJUKAN OLEH PENGHUNI</h2>
                </div>
            @elseif (auth()->user()->role == 'Guest')
                <div class="block-header">
                    <h2>STATUS PENGAJUAN RUMAH</h2>
                </div>
            @endif
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

            @if (auth()->user()->role == 'Admin')
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        @if ($data_pengajuan_admin->isEmpty())
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        PENGAJUAN HUNI OLEH
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
                                    <div class="alert alert-info">
                                        <strong>Belum Ada Yang Mengajukan!</strong>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($data_pengajuan_admin as $item)
                                <div class="card">

                                    <div class="header">
                                        <h2>
                                            DATA RUMAH YANG DIAJUKAN OLEH PENGHUNI
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
                                    <form id="form_advanced_validation" action="{{ route('pengajuan.update', $item->id) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="body">
                                            <div class="demo-masked-input">
                                                <div class="row clearfix">
                                                    <div class="col-md-3">
                                                        <b>Kode Rumah</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">home</i>
                                                            </span>
                                                            <div>
                                                                <input type="text" name="kode_rumah" readonly
                                                                    value="{{ $item->rumah->kode_rumah }}"
                                                                    class="form-control date"
                                                                    placeholder="Contoh: 30/07/2016">
                                                                <input name="pengajuan_id" value="{{ $item->id }}"
                                                                    hidden>

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
                                                                <input type="text" readonly class="form-control"
                                                                    value="{{ $item->rumah->type->nama_type }}">
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
                                                                <input type="text" readonly class="form-control time12"
                                                                    value="{{ $item->rumah->pln }}">
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
                                                                <input type="text" readonly class="form-control datetime"
                                                                    value="{{ $item->rumah->pdam }}">
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
                                                                <input type="text"readonly
                                                                    class="form-control mobile-phone-number"
                                                                    value="{{ $item->rumah->alamat }}">
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
                                                                <input type="text" readonly
                                                                    class="form-control mobile-phone-number"
                                                                    value="{{ $item->rumah->latitude }}">
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
                                                                <input type="text" readonly
                                                                    class="form-control money-dollar"
                                                                    value="{{ $item->rumah->longtitude }}">
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
                                                                <input type="text" readonly
                                                                    class="form-control money-euro"
                                                                    value="{{ $item->user->nik }}">
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
                                                                <input type="text" readonly class="form-control ip"
                                                                    value="{{ $item->user->name }}">
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
                                                                <input type="text" readonly class="form-control ip"
                                                                    value="{{ $item->user->email }}">
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
                                                                <input type="text" readonly class="form-control ip"
                                                                    value="{{ $item->user->perusahaan }}">
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
                                                                <input type="text" readonly class="form-control ip"
                                                                    value="{{ $item->user->kontak }}">
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
                                                                <input type="number" min="1"
                                                                    class="form-control number"
                                                                    value="{{ $item->jumlah_penghuni }}" readonly>
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
                                                        <b>Bukti Pembayaran</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">image</i>
                                                            </span>
                                                            <a href="{{ asset('template') }}/images/image-gallery/1.jpg"
                                                                target="_blank" data-sub-html="Demo Description">
                                                                Bukti Pembayaran
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <b>Status Pengajuan</b>
                                                        <div class="input-group">
                                                            <select name="status_pengajuan"
                                                                class="form-control show-tick">
                                                                <option value="DITOLAK" selected>DITOLAK</option>
                                                                <option value="DITERIMA">DITERIMA
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <b>Catatan</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">message</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="catatan" required
                                                                    class="form-control ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-group">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-lg m-l-15 waves-effect">SUBMIT</button>
                                                        </div>
                                                    </div>
                                    </form>
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
        @endforeach
        @endif
        </div>
    @elseif (auth()->user()->role == 'Guest')
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @if ($data_pengajuan_penghuni->isEmpty())
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA RUMAH YANG DIAJUKAN OLEH PENGHUNI
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
                            <div class="alert alert-info">
                                <strong>Anda Belum Mengajukan Rumah</strong>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($data_pengajuan_penghuni as $item)
                        <div class="card">
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
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <b>Kode Rumah</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">home</i>
                                                </span>
                                                <div>
                                                    <input type="text" disabled value="{{ $item->rumah->kode_rumah }}"
                                                        class="form-control date" placeholder="Contoh: 30/07/2016">

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
                                                    <input type="text" disabled class="form-control"
                                                        value="{{ $item->rumah->type->nama_type }}">
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
                                                        value="{{ $item->rumah->pln }}">
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
                                                        value="{{ $item->rumah->pdam }}">
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
                                                    <input type="text" disabled
                                                        class="form-control mobile-phone-number"
                                                        value="{{ $item->rumah->alamat }}">
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
                                                        value="{{ $item->rumah->latitude }}">
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
                                                        value="{{ $item->rumah->longtitude }}">
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
                                                        value="{{ $item->user->nik }}">
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
                                                        value="{{ $item->user->name }}">
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
                                                        value="{{ $item->user->email }}">
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
                                                        value="{{ $item->user->perusahaan }}">
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
                                                        value="{{ $item->user->kontak }}">
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
                                                        value="{{ $item->jumlah_penghuni }}" disabled>
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
                                                    <input type="number" min="1" class="form-control number"
                                                        value="{{ $item->id }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <b>Catatan</b>
                                            <div class="input-group">
                                                {{-- <span class="input-group-addon">
                                                    <i class="material-icons">note</i>
                                                </span> --}}
                                                <div>
                                                    <textarea class="form-control" readonly>{{ $item->catatan }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <b>Status Pengajuan</b>
                                            <button type="button"
                                                class="btn btn-primary btn-lg m-l-15 waves-effect">{{ $item->status_pengajuan }}</button>
                                        </div>

                                        {{-- <div class="col-sm-4">
                                            <b>Status Pembayaran</b>
                                            <button type="button" class="btn btn-danger btn-lg m-l-15 waves-effect">BELUM
                                                LUNAS Silahkan melakukan <br> pembayaran ke norek 11181027 BNI an
                                                reg6</button>
                                        </div> --}}

                                        {{-- <div class="col-md-3">
                                            <b>Catatan</b>
                                            <button type="button"
                                                class="btn btn-primary btn-lg m-l-15 waves-effect">{{ $item->catatan }}</button>
                                        </div> --}}
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

        </div>
        @endforeach
        @endif
        </div>
        </div>
        @endif
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

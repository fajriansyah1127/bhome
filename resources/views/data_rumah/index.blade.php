@extends('layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid js-sweetalert">
            {{-- <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div> --}}
            <!-- Basic Examples -->

            <!-- #END# Basic Examples -->
            @if (auth()->user()->role == 'Admin')
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    DATA RUMAH BERPENGHUNI
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
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Kode Rumah</th>
                                                <th>Penghuni</th>
                                                <th>Alamat</th>
                                                <th>Type</th>
                                                <th>Jatuh Tempo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Fax01</td>
                                                <td>AMIRUDIN AHMAD</td>
                                                <td>Jl. Faximile No. 01</td>
                                                <td>t90</td>
                                                <td>2024/10/18</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            ACTION <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li> <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    onclick="window.open('{{ route('data_rumah.show', 1) }}', '_blank')">Detail</button>
                                                            </li>
                                                            <li> <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    onclick="window.open('{{ route('type_rumah.edit', 1) }}', '_blank')">Edit</button>
                                                            </li>
                                                            <li>
                                                                <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    data-toggle="modal"
                                                                    data-target="#destroytyperumah">Delete</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mor08</td>
                                                <td>SITI MAISARAH RIANA PUTRI</td>
                                                <td>Jl. Morse No. 08</td>
                                                <td>t90</td>
                                                <td>2024/07/18</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            ACTION <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li> <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    onclick="window.open('{{ route('data_rumah.show', 1) }}', '_blank')">Detail</button>
                                                            </li>
                                                            <li> <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    onclick="window.open('{{ route('type_rumah.edit', 1) }}', '_blank')">Edit</button>
                                                            </li>
                                                            <li>
                                                                <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    data-toggle="modal"
                                                                    data-target="#destroytyperumah">Delete</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Slj04</td>
                                                <td>PRIYO WIDODO</td>
                                                <td>Jl. SLJJ No. 04</td>
                                                <td>t120</td>
                                                <td>2024/12/18</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            ACTION <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li> <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    onclick="window.open('{{ route('data_rumah.show', 1) }}', '_blank')">Detail</button>
                                                            </li>
                                                            <li> <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    onclick="window.open('{{ route('type_rumah.edit', 1) }}', '_blank')">Edit</button>
                                                            </li>
                                                            <li>
                                                                <button type="button"
                                                                    class="btn btn-default waves-effect m-r-20"
                                                                    data-toggle="modal"
                                                                    data-target="#destroytyperumah">Delete</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Exportable Table -->

                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    DATA RUMAH BELUM DIHUNI
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
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Kode Rumah</th>
                                                <th>Type</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($data_rumah as $data)
                                                    <td>{{ $data->kode_rumah }}</td>
                                                    <td>
                                                        @if ($data->type)
                                                            <!-- Pastikan type_id tidak null -->
                                                            {{ $data->type->nama_type }}
                                                        @else
                                                            <!-- Tindakan jika type_id null, misalnya menampilkan pesan -->
                                                            Type not available
                                                        @endif
                                                    </td>
                                                    <td>{{ $data->alamat }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                ACTION <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li> <button type="button"
                                                                        class="btn btn-default waves-effect m-r-20"
                                                                        onclick="window.open('{{ route('data_rumah.show',$data->id) }}', '_blank')">Detail</button>
                                                                </li>
                                                                <li> <button type="button"
                                                                        class="btn btn-default waves-effect m-r-20"
                                                                        onclick="window.open('{{ route('data_rumah.edit',$data->id) }}', '_blank')">Edit</button>
                                                                </li>
                                                                <li>
                                                                    <button type="button"
                                                                        class="btn btn-default waves-effect m-r-20"
                                                                        data-toggle="modal"
                                                                        data-target="#destroytyperumah">Delete</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                            </tr>
            @endforeach
            {{-- <tr>
                <td>Dgt01</td>
                <td>t120</td>
                <td>Jl. Digital No. 01</td>
            </tr>
            <tr>
                <td>Pal15</td>
                <td>t200</td>
                <td>Jl. Palapa No. 01</td>
            </tr>
            <tr>
                <td>Mor04</td>
                <td>t90</td>
                <td>Jl. Morse No. 04</td>
            </tr> --}}
            </tbody>
            </table>
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- #END# Exportable Table -->

        <!-- Masked Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TAMBAH DATA RUMAH
                            {{-- <small>Taken from <a href="https://github.com/RobinHerbots/jquery.inputmask"
                                        target="_blank">github.com/RobinHerbots/jquery.inputmask</a></small> --}}
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
                        <form id="form_advanced_validation" action="{{ route('data_rumah.store') }}"
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
                                            <div class="form-line">
                                                <input value="Kdrmh123" type="text" name="kode_rumah"
                                                    class="form-control date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Basic</b>
                                        <select class="form-control show-tick" name="type">
                                            @foreach ($type_rumah as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_type }}
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <b>ID PLN</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">electric_bolt</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" value="123123" name="pln"
                                                    class="form-control time12" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>ID PDAM</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">water_drop</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="pdam" class="form-control datetime"
                                                    value="321321" required>
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
                                            <div class="form-line">
                                                <input type="text" name="alamat"
                                                    class="form-control mobile-phone-number" value="Jlnsss" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Latitude</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">gps_fixed</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="latitude"
                                                    class="form-control mobile-phone-number" value="-1.251590837"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Longtitude</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">gps_fixed</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="longtitude" class="form-control money-dollar"
                                                    value="116.8633961" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Foto Rumah</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">image</i>
                                            </span>
                                            <input type="file" class="form-control" name="foto" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg m-l-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        <!-- #END# Masked Input -->

        <!-- For Material Design Colors -->
        <!-- Default Size -->
        <div class="modal fade" id="destroytyperumah" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">KONFIRMASI HAPUS TYPE RUMAH</h4>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link bg-red waves-effect">Delete</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    @elseif (auth()->user()->role == 'Guest')
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA RUMAH BELUM BERPENGHUNI
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover  js-basic-example">
                                <thead>
                                    <tr>
                                        <th>Alamat</th>
                                        <th>Kode/Type</th>
                                        <th>Spesifikasi</th>
                                        <th>Harga</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jl. Digital No. 01</td>
                                        <td>Dgt01/t120</td>
                                        <td>3 Kamar Tidur, 3 Kamar Mandi, Ruang Tamu, Ruang Keluarga, Dapur, Gudang
                                            & Garasi</td>
                                        <td>13575000</td>
                                        <td> <a href="{{ asset('template') }}/images/image-gallery/1.jpg"
                                                data-sub-html="Demo Description">
                                                <img class="img-responsive thumbnail"
                                                    src="{{ asset('template') }}/images/t120-bg.jpg"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary waves-effect m-r-20"
                                                onclick="window.open('{{ route('type_rumah.edit', 1) }}', '_blank')">AJUKAN</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jl. Morse No. 04</td>
                                        <td>Mor04/t90</td>
                                        <td>3 Kamar Tidur, 2 Kamar Mandi, 1 Dapur & Garasi </td>
                                        <td>7387500</td>
                                        <td> <a href="{{ asset('template') }}/images/image-gallery/1.jpg"
                                                data-sub-html="Demo Description">
                                                <img class="img-responsive thumbnail"
                                                    src="{{ asset('template') }}/images/t90-bg.jpg"></td>
                                        <td>

                                            <button type="button" class="btn btn-primary waves-effect m-r-20"
                                                onclick="window.open('{{ route('type_rumah.edit', 1) }}', '_blank')">AJUKAN</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jl. Palapa No. 01</td>
                                        <td>Pal15/t200</td>
                                        <td>4 Kamar Tidur, 3 Kamar Mandi, Ruang Tamu, Ruang Keluarga, Dapur, Gudang
                                            & Garasi</td>
                                        <td>19762500</td>
                                        <td> <a href="{{ asset('template') }}/images/image-gallery/1.jpg"
                                                data-sub-html="Demo Description">
                                                <img class="img-responsive thumbnail"
                                                    src="{{ asset('template') }}/images/t200-bg.jpg"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary waves-effect m-r-20"
                                                onclick="window.open('{{ route('type_rumah.edit', 1) }}', '_blank')">AJUKAN</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
        @endif
        </div>
    </section>
@endsection

@push('javascript')
    <!-- Jquery Core Js -->
    <script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('template') }}/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('template') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('template') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('template') }}/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('template') }}/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('template') }}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ asset('template') }}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('template') }}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ asset('template') }}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ asset('template') }}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ asset('template') }}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ asset('template') }}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ asset('template') }}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ asset('template') }}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('template') }}/js/admin.js"></script>
    <script src="{{ asset('template') }}/js/pages/tables/jquery-datatable.js"></script>
    <script src="{{ asset('template') }}/js/pages/ui/dialogs.js"></script>
    <script src="{{ asset('template') }}/js/pages/ui/modals.js"></script>

    <!-- Demo Js -->
    <script src="{{ asset('template') }}/js/demo.js"></script>
@endpush

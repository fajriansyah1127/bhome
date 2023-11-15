@extends('layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            {{-- <div class="block-header">
            <h2>DETAIL RUMAH</h2>
        </div> --}}
            <!-- Masked Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DETAIL PROFILE
                            </h2>
                            <ul class="header-dropdown m-r-0">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </li>
                                {{-- <li>
                                <a href="javascript:void(0);">
                                    <i class="material-icons">help_outline</i>
                                </a>
                            </li> --}}
                            </ul>
                        </div>
                        <div class="body">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <b>Nama</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled value="{{ $data_user->name }}"
                                                    class="form-control date" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Email</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div>
                                                <input type="text" value="{{ $data_user->email }}" disabled
                                                    class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Perusahaan</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">business</i>
                                            </span>
                                            <div>
                                                <input type="text" value="{{ $data_user->perusahaan }}" disabled
                                                    class="form-control time12" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>NIK</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div>
                                                <input type="text" value="{{ $data_user->nik }}" disabled
                                                    class="form-control datetime" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Alamat</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_on</i>
                                            </span>
                                            <div>
                                                <input type="text" value="{{ $data_user->alamat }}" disabled class="form-control mobile-phone-number"
                                                    value="">
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
                                                <input type="text" value="{{ $data_user->kontak }}"  disabled class="form-control mobile-phone-number"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <b>Kartu Pegawai</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">credit_card</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control money-dollar"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <b>Jatuh Tempo</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">calendar_month</i>
                                            </span>
                                            <div>
                                                <input type="text" disabled class="form-control credit-card"
                                                    value="30/07/2016">
                                            </div>
                                        </div>
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
            <!-- #END# Masked Input -->
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

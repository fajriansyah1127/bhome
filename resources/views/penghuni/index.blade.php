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
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              DATA PERMOHONAN PENGAJUAN HUNI RUMAH
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Penghuni</th>
                                            <th>Jumlah Penghuni</th>
                                            <th>NO HP</th>
                                            <th>Type Rumah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>61</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
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
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>61</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
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
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>61</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
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
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>61</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
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
                                PENGHUNI RUMAH
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama Penghuni</th>
                                            <th>Perusahaan</th>
                                            <th>NO HP</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
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
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
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
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
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
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
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
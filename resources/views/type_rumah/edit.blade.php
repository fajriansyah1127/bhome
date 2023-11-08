@extends('layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid js-sweetalert">
            <div class="block-header">
                
            </div>
            <!-- Basic Examples -->

            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Update {{ $type_rumah->nama_type }}</h2>
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
                            <form id="form_advanced_validation" action="{{ route('type_rumah.update', $type_rumah->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="{{ $type_rumah->nama_type }}" name="nama_type"required>
                                        <label class="form-label">Nama Type</label>
                                    </div>
                                    <div class="help-info">Contoh : Type 11181027</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="{{ $type_rumah->ukuran }}" name="ukuran" required>
                                        <label class="form-label">Ukuran</label>
                                    </div>
                                    <div class="help-info">Contoh : 10 x 10</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="{{ $type_rumah->spesifikasi }}" name="spesifikasi" required>
                                        <label class="form-label">Spesifikasi</label>
                                    </div>
                                    <div class="help-info">Contoh : 3 Kamar Tidur, 2 Kamar Mandi dst</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" value="{{ $type_rumah->harga }}" min="100000" name="harga"
                                            required>
                                        <label class="form-label">Harga</label>
                                    </div>
                                    <div class="help-info">Contoh : 1000000</div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->

            <!-- For Material Design Colors -->
            <!-- Default Size -->
          
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

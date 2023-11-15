@extends('layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DETAIL RUMAH</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FOTO RUMAH
                                {{-- <small>Pure css animations - <a href="https://daneden.github.io/animate.css/"
                                        target="_blank">daneden.github.io/animate.css</a></small> --}}
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
                            <img src="{{ asset('foto') . '/' . $data_rumah->foto }}"
                                class="js-animating-object img-responsive">
                            <div class="demo-image-copyright">
                                This image taken from <a href="https://unsplash.com" target="_blank">Unsplash</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Masked Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA RUMAH
                                <small>Taken from <a href="https://github.com/RobinHerbots/jquery.inputmask"
                                        target="_blank">github.com/RobinHerbots/jquery.inputmask</a></small>
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
                            <form id="form_advanced_validation" action="{{ route('data_rumah.update', $data_rumah->id) }}"
                                enctype="multipart/form-data" method="POST">
                                @method('PUT')
                                {{ csrf_field() }}
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <b>Kode Rumah</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">home</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" value="{{ $data_rumah->kode_rumah }}" name="kode_rumah"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <b>Basic</b>
                                            <select class="form-control show-tick" name="type_id">
                                                @foreach ($type_rumah as $data_type)
                                                    <option value="{{ $data_type->id }}" {{ $data_type->id == $data_rumah->type_id ? 'selected' : '' }}>
                                                        {{ $data_type->nama_type }}
                                                    </option>
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
                                                    <input type="text" class="form-control time12" name="pln"
                                                        value="{{ $data_rumah->pln }}">
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
                                                    <input type="text" class="form-control datetime" name="pdam"
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
                                                <div class="form-line">
                                                    <input type="text" class="form-control mobile-phone-number" name="alamat"
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
                                                <div class="form-line">
                                                    <input type="text" class="form-control mobile-phone-number" name="latitude"
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
                                                <div class="form-line">
                                                    <input type="text" class="form-control money-dollar" name="longtitude"
                                                        value="{{ $data_rumah->longtitude }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <b>NIK Penghuni</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">people</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control money-euro" disabled
                                                        value="{{ $data_rumah->user->nik ?? 'nihil' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <b>Nama Penghuni</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">people</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control ip" disabled
                                                        value="{{ $data_rumah->user->name ?? 'nihil' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <b>Foto Rumah</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">image</i>
                                                </span>
                                                <input type="file" class="form-control" name="foto">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-lg m-l-15 waves-effect">SUBMIT</button>
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
                            </form>
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

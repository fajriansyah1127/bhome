@extends('layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
         
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
                        <div class="card">
                            <div class="header">
                                <h2>
                                    STATUS PEMBAYARAN RUMAH
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
                            <div class="body table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Pengajuan</th>
                                            <th>Nama</th>
                                            <th>Status Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="active">
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr class="success">
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr class="info">
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr class="warning">
                                            <th scope="row">4</th>
                                            <td>Larry</td>
                                            <td>Jellybean</td>
                                            <td>@lajelly</td>
                                        </tr>
                                        <tr class="danger">
                                            <th scope="row">5</th>
                                            <td>Larry</td>
                                            <td>Kikat</td>
                                            <td>@lakitkat</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Contextual Classes -->
        </div>


        </div>
    @elseif (auth()->user()->role == 'Guest')
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            STATUS PEMBAYARAN RUMAH
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
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
                    <div class="body table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pengajuan</th>
                                    <th>Nama</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="active">
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr class="success">
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr class="info">
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr class="warning">
                                    <th scope="row">4</th>
                                    <td>Larry</td>
                                    <td>Jellybean</td>
                                    <td>@lajelly</td>
                                </tr>
                                <tr class="danger">
                                    <th scope="row">5</th>
                                    <td>Larry</td>
                                    <td>Kikat</td>
                                    <td>@lakitkat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Contextual Classes -->
        @endif
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

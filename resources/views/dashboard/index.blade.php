@extends('layout.layout')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin="" />

    {{-- <style>
        #map {
            height: 100px;
        }
    </style> --}}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            @if (auth()->user()->role == 'Admin')
                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="info-box bg-yellow hover-expand-effect hover-zoom-effect">
                            <div class="icon">
                                <a href="{{ route('data_rumah.index') }}">
                                    <i class="material-icons">home</i>
                            </div>
                            <div class="content">
                                <div class="text">JUMLAH RUMAH</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                                    data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="info-box bg-green hover-expand-effect hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">paid</i>
                            </div>
                            <div class="content">
                                <div class="text">JUMLAH TERBAYAR</div>
                                <div class="number count-to" data-from="0" data-to="1128637500" data-speed="1000"
                                    data-fresh-interval="20">Rp.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="info-box bg-red hover-expand-effect hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">groups</i>
                            </div>
                            <div class="content">
                                <div class="text">JUMLAH PENGHUNI</div>
                                <div class="number count-to" data-from="0" data-to="243" data-speed="1000"
                                    data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Widgets -->
            @elseif (auth()->user()->role == 'Guest')
                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="info-box bg-yellow hover-expand-effect hover-zoom-effect">
                            <div class="icon">
                                <a href="{{ route('data_rumah.index') }}">
                                    <i class="material-icons">home</i>
                            </div>
                            <div class="content">
                                <div class="text">JUMLAH RUMAH</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                                    data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Widgets -->
            @endif




            <!-- Basic Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PETA PERUMAHAN
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
                            <div id="map" class="gmap"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Example -->
        </div>
    </section>
@endsection

@push('javascript')
    <!-- Jquery Core Js -->
    <script src="{{ asset('template/') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('template') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('template') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('template') }}/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('template') }}/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('template') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('template') }}/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="{{ asset('template') }}/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('template') }}/plugins/flot-charts/jquery.flot.js"></script>
    <script src="{{ asset('template') }}/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="{{ asset('template') }}/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="{{ asset('template') }}/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="{{ asset('template') }}/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('template') }}/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('template') }}/js/admin.js"></script>
    <script src="{{ asset('template') }}/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="{{ asset('template') }}/js/demo.js"></script>

    <!-- Google Maps API Js -->
    {{-- <script src="https://maps.google.com/maps/api/js?v=3&sensor=false"></script> --}}

    <!-- GMaps PLugin Js -->
    {{-- <script src="{{ asset('template/') }}/plugins/gmaps/gmaps.js"></script>
    <script src=".{{ asset('template/') }}/js/pages/maps/google.js"></script> --}}

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    {{-- <script>
        const map = L.map('map').setView([-1.2505993484222855, 116.86403959602268], 19);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var greenIcon = L.icon({
            iconUrl: '{{ asset('admin/img/icon_hijau.png') }}',
            iconSize: [44, 44],
            iconAnchor: [33, 66],
            tooltipAnchor: [33, -30],
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        // Marker pertama
        var marker1 = L.marker([-1.251590837460213, 116.86339606535283], {
                icon: greenIcon
            })
            .bindPopup('Marker Pertama')
            .addTo(map);
        marker1.url = '/data_rumah'; // Sesuaikan dengan URL yang benar
        marker1.on('click', function() {
            window.location = this.url;
        });

        // Marker kedua
        var marker2 = L.marker([-1.2517088264977783, 116.86359996882781], {
                icon: greenIcon,
            })
            .bindTooltip(`Marker Kedua`)
            .addTo(map);
    </script> --}}

    <script>
        const map = L.map('map').setView([-1.2505993484222855, 116.86403959602268], 19);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var greenIcon = L.icon({
            iconUrl: '{{ asset('admin/img/icon_hijau.png') }}',
            iconSize: [44, 44],
            iconAnchor: [33, 66],
            tooltipAnchor: [33, -30],
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var redIcon = L.icon({
            iconUrl: '{{ asset('admin/img/icon_merah.png') }}',
            iconSize: [44, 44],
            iconAnchor: [33, 66],
            tooltipAnchor: [33, -30],
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        @foreach ($lokasiData as $lokasi)
            var marker = L.marker([{{ $lokasi->latitude }}, {{ $lokasi->longtitude }}], {
                    icon: greenIcon
                })
                .bindPopup('{{ $lokasi->alamat }}') // Gantilah dengan atribut yang sesuai
                .addTo(map);
        @endforeach

   

        // Daftar koordinat
        // var coordinates = [
        //     @foreach ($lokasiData as $lokasi)
        //     [{{ $lokasi->latitude }}, {{ $lokasi->longtitude }}],
        //     @endforeach

        //     // ... tambahkan koordinat lainnya sesuai kebutuhan
        // ];

        // // Membuat marker untuk setiap koordinat
        // coordinates.forEach(coordinate => {
        //     var marker = L.marker(coordinate, {
        //             icon: redIcon
        //         })
        //         .addTo(map)
        //         .bindPopup('{{ $lokasi->alamat }}') // Gantilah dengan atribut yang sesuai
        //         .addTo(map);
        // });
    </script>
@endpush

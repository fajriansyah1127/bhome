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

            @if (auth()->user()->role == 'Admin')
                <div class="row clearfix js-sweetalert">
                    <!-- Task Info -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>INFO PENGAJUAN</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Pengajuan</th>
                                                <th>Nama Pengajuan</th>
                                                <th>Harga Sewa</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_pengajuan_admin as $data)
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{ $data->kode_pengajuan }}</td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td>{{ $data->rumah->type->harga }}</td>
                                                    <td>
                                                        <span
                                                            class="label {{ $data->status_pengajuan === 'Belum Dikonfirmasi' ? 'bg-red' : 'bg-green' }}">
                                                            {{ $data->status_pengajuan }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="button-demo">
                                                            <button type="button" class="btn btn-primary waves-effect"
                                                                onclick="redirectToDetail('{{ route('pengajuan.show', ['pengajuan' => $data->user]) }}')">Detail</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Task Info -->

                </div>
        </div>

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
                        @if ($item->status_pengajuan == 'SETUJU')
                            @if ($item->status_pembayaran == 'Menunggu Konfirmasi')
                                <div class="alert alert-success">
                                    Selamat Pengajuan Anda <b>Diterima</b> silahkan melakukan pembayaran ke rekening BNI
                                    Bhome
                                    097201122 dengan nominal Rp.{{ $item->rumah->type->harga }} dan lakukan konfirmasi
                                    pembayaran dengan mengirim bukti pembayaran melalui <a
                                        href="https://wa.me/6282350476227?text=Halo,%20saya%20mau%20mengkonfirmasi%20pembayaran%20sewa%20rumah%20atas%20nama%20{{ $item->user->name }}."
                                        class="alert-link" target="_blank">link Ini</a>
                                </div>
                            @elseif ($item->status_pembayaran == 'Dikonfirmasi')
                                <div class="alert alert-success">
                                    Selamat Pembayaran Anda telah dikonfirmasi, silahkan datang ke kantor Telkom Property untuk pengambilan kunci rumah.
                                </div>
                            @endif
                        @elseif ($item->status_pengajuan == 'TOLAK')
                            <div class="alert alert-danger">
                                Pengajuan Anda <b>Ditolak</b>. Anda perlu mendapatkan <b>Google Map API Key</b> untuk
                                menampilkan peta dengan <a
                                    href="https://developers.google.com/maps/documentation/javascript/get-api-key"
                                    class="alert-link" target="_blank">link ini</a> (Anda juga dapat menemukan dokumentasi
                                pada halaman yang sama).
                            </div>
                        @else
                            <div class="alert alert-warning">
                                Pengajuan Anda sedang diperiksa, mohon ditunggu sebentar. Apabila tidak ada respon hingga
                                1x24 jam, silahkan <a
                                    href="https://wa.me/6282350476227?text=Halo,%20saya%20mau%20mengkonfirmasi%20pengajuan%20sewa%20rumah%20atas%20nama%20{{ $item->user->name }}."
                                    class="alert-link" target="_blank">klik link ini</a>.
                            </div>
                        @endif
                        <div class="card">
                            <div class="header">
                                <h2>
                                    DATA RUMAH YANG DIAJUKAN
                                </h2>

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
                                                    <input type="text" disabled class="form-control mobile-phone-number"
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
                                                    <input type="text" disabled class="form-control mobile-phone-number"
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
                                                <a href="{{ asset('foto_penghuni/' . $item->foto) }}" target="_blank"
                                                    data-sub-html="Demo Description">
                                                    <img src="{{ asset('foto_penghuni/' . $item->foto) }}"
                                                        alt="Foto Kartu Pegawai" style="width: 100px;">
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
                                                        value="{{ $item->kode_pengajuan }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <b>Catatan</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">note</i>
                                                </span>
                                                <div>
                                                    <input type="text" disabled class="form-control ip"
                                                        value="{{ $item->catatan }}">
                                                </div>
                                            </div>
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

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('template') }}/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('template') }}/plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('template') }}/plugins/sweetalert/sweetalert.min.js"></script>
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
    <script src="{{ asset('template') }}/js/pages/ui/animations.js"></script>
    <script src="{{ asset('template') }}/js/pages/ui/dialogs.js"></script>

    <!-- Demo Js -->
    <script src="{{ asset('template') }}/js/demo.js"></script>

    <script>
        function redirectToDetail(url) {
            window.location.href = url;
        }
    </script>
@endpush

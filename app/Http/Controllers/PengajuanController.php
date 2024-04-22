<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Datarumah;
use Illuminate\Support\Str;
use App\Models\Pembayaran;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_rumah = Datarumah::with('type')->get();
        $data_user = User::get();
        $authenticatedUserId = Auth::id();
        $data_pengajuan_penghuni = Pengajuan::with('rumah', 'user')
            ->where('user_id', $authenticatedUserId)
            ->get();
        $data_pengajuan_admin = Pengajuan::with('rumah', 'user',)
            ->get();
        return view('pengajuan.index', compact('data_user', 'data_rumah', 'data_pengajuan_penghuni', 'data_pengajuan_admin'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     */

    // ...

    public function store(Request $request)
    {
        // Generate a random alphanumeric code
        $randomCode = Str::random(6); // Adjust the length as needed

        // Combine the random code with your numeric code
        $kode_pengajuan = $randomCode;

        $this->validate($request, [
            'rumah_id' => 'required',
            'price' => 'required',
            'jumlah_penghuni' => 'required|integer',
            'foto_kartu_penghuni' => 'required|file|image|mimes:jpg,jpeg,bmp,png',
        ]);

        // Mendapatkan ID pengguna yang sedang diotentikasi
        $authenticatedUserId = Auth::id();

        // Periksa apakah pengguna sudah memiliki pengajuan
        $existingPengajuan = Pengajuan::where('user_id', $authenticatedUserId)->first();

        if ($existingPengajuan) {
            // Pengguna sudah memiliki pengajuan, kirim pesan error
            return redirect()->back()->withErrors(['error' => 'Anda sudah memiliki pengajuan sebelumnya.']);
        }

        // Lanjutkan dengan mengunggah foto dan membuat pengajuan baru
        if ($file = $request->file('foto_kartu_penghuni')) {
            $filename = 'foto_' . $authenticatedUserId . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_penghuni'), $filename);
        } else {
            $filename = 'default_foto_penghuni.jpg';
        }

        $notif = Pengajuan::create([
            'foto' => $filename,
            'user_id' => $authenticatedUserId,
            'rumah_id' => $request->rumah_id,
            'jumlah_penghuni' => $request->jumlah_penghuni,
            'kode_pengajuan' => $kode_pengajuan,
            'status_pengajuan' => 'Menunggu Konfirmasi',
            'status_pembayaran' => 'Menunggu Konfirmasi',
            'catatan' => 'Menunggu Konfirmasi',
        ]);

        if ($notif) {
            return redirect('/pengajuan');
        } else {
            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menggunakan Eloquent untuk mendapatkan data rumah dengan relasi user dan type
        $data_rumah = Datarumah::with('type')->find($id);

        // Mendapatkan ID pengguna yang sedang diotentikasi
        $authenticatedUserId = Auth::id();

        // Mendapatkan data pengguna berdasarkan ID pengguna yang sedang diotentikasi
        $data_user = User::find($authenticatedUserId);

        // Atau Anda bisa menggunakan metode where
        // $data_user = User::where('id', $authenticatedUserId)->first();

        $data_pengajuan = Pengajuan::with('rumah', 'user')
            ->where('user_id', $id)
            ->first();

        return view('pengajuan.show', compact('data_user', 'data_rumah', 'data_pengajuan'));
    }

    public function detail($id)
    {
        $data_rumah = Datarumah::with('type')->get();
        $data_user = User::get();
        $authenticatedUserId = Auth::id();
        $data_pengajuan_penghuni = Pengajuan::with('rumah', 'user')
            ->where('user_id', $authenticatedUserId)
            ->get();
        $data_pengajuan_admin = Pengajuan::with('rumah', 'user',)
            ->get();
        return view('pengajuan.index', compact('data_user', 'data_rumah', 'data_pengajuan_penghuni', 'data_pengajuan_admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        // Temukan data pengajuan dengan id yang sesuai
        $data_pengajuan = Pengajuan::find($id);

        // Pastikan data pengajuan ada sebelum melanjutkan
        if ($data_pengajuan) {
            // Update data pengajuan
            $data_pengajuan->update([
                'catatan' => $request->input('catatan'),
                'status_pengajuan' => $request->input('status_pengajuan'),
            ]);

            // Temukan data rumah berdasarkan kode_rumah
            $data_rumah = Datarumah::where('kode_rumah', $request->input('kode_rumah'))->first();

            // Pastikan data rumah ada sebelum melanjutkan
            if ($data_rumah) {
                // Jika catatan menunjukkan diterima, ubah pengajuan_id di tabel datarumah
                if ($request->input('status_pengajuan') == 'DITERIMA') {
                    $data_rumah->update([
                        'pengajuan_id' => $data_pengajuan->id,
                    ]);

                    // Buat pembayaran jika status_pengajuan adalah 'DITERIMA'
                    // $authenticatedUserId = auth()->user()->id; // Gantilah ini sesuai dengan cara Anda mendapatkan user ID yang terautentikasi
                    // $kode_pengajuan = // Generate kode pengajuan sesuai kebutuhan Anda
                    Pembayaran::create([
                        'user_id' => $authenticatedUserId,
                        'rumah_id' => $request->rumah_id,
                        'pengajuan_id' => $data_pengajuan->id,
                        'kode_pengajuan' => $kode_pengajuan,
                        'status_pembayaran' => 'Menunggu Konfirmasi',
                        'catatan' => 'Menunggu Konfirmasi',
                    ]);
                }
                // Redirect dengan pesan sukses
                return redirect()->route('data_rumah.index')->with(['success' => 'Data Berhasil Diupdate!']);
            } else {
                // Redirect dengan pesan error jika data rumah tidak ditemukan
                return redirect()->route('pengajuan.index')->with(['error' => 'Data Rumah Tidak Ditemukan!']);
            }
        } else {
            // Redirect dengan pesan error jika data pengajuan tidak ditemukan
            return redirect()->route('data_rumah.index')->with(['error' => 'Data Pengajuan Tidak Ditemukan!']);
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}

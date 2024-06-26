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
            ->where('status_pengajuan', 'menunggu konfirmasi')
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
        // Validasi permintaan jika diperlukan
        $validatedData = $request->validate([
            'status_pengajuan' => 'required|in:SETUJU,TOLAK', // pastikan hanya disetujui atau ditolak
            'catatan' => 'required|string|max:255', // validasi catatan
        ]);

        // Perbarui data pengajuan berdasarkan ID yang diberikan
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status_pengajuan = $validatedData['status_pengajuan'];
        $pengajuan->catatan = $validatedData['catatan'];

        // Jika status pengajuan ditolak
        if ($validatedData['status_pengajuan'] === 'TOLAK') {
            // Set status pembayaran menjadi "tidak perlu"
            $pengajuan->status_pembayaran = 'tidak perlu';
        }

        $pengajuan->save();

        // Kirim respons untuk menunjukkan kesuksesan
        $data_pengajuan_admin = Pengajuan::with('rumah', 'user',)
            ->where('status_pengajuan', 'menunggu konfirmasi')
            ->get();
        return view('pengajuan.index', compact('data_pengajuan_admin'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi permintaan jika diperlukan
        $validatedData = $request->validate([
            'status_pembayaran' => 'required|in:Dikonfirmasi',
        ]);

        // Perbarui data pengajuan berdasarkan ID yang diberikan
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status_pembayaran = $validatedData['status_pembayaran'];

        $pengajuan->save();

        // Redirect atau kirim respons untuk menunjukkan kesuksesan
        return redirect()->route('pengajuan.index')->with('success', 'Status pembayaran berhasil diperbarui.');
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}

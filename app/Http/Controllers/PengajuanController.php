<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Datarumah;
use App\Models\User;
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
    $data_pengajuan = Pengajuan::with('rumah', 'user')
        ->where('user_id', $authenticatedUserId)
        ->get();
    return view('pengajuan.index', compact('data_user', 'data_rumah', 'data_pengajuan'));
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
        $this->validate($request, [
            'rumah_id' => 'required', // Tambahkan validasi untuk rumah_id
            'jumlah_penghuni' => 'required|integer', // Tambahkan validasi untuk jumlah_penghuni
            'foto_penghuni' => 'required|file|image|mimes:jpg,jpeg,bmp,png|max:2048', // Tambahkan validasi untuk foto_kartu_pegawai
        ]);
        // return $request->all();
        // Mendapatkan ID pengguna yang sedang diotentikasi
        $authenticatedUserId = Auth::id();
    
        if ($file = $request->file('foto_kartu_pegawai')) {
            $filename = 'foto_' . $authenticatedUserId . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_penghuni'), $filename);
        } else {
            $filename = 'default_foto_penghuni.jpg'; // Ganti dengan nilai default jika foto tidak diunggah
        }
    
        $notif = Pengajuan::create([
            'foto' => $filename,
            'user_id' => $authenticatedUserId, // Menggunakan ID pengguna yang sedang diotentikasi
            'rumah_id' => $request->rumah_id,
            'jumlah_penghuni' => $request->jumlah_penghuni,
            'status_pengajuan' => 'Belum Dikonfirmasi', // Menambahkan status pengajuan
            'catatan' => 'Menunggu Konfirmasi',
        ]);
    
        if ($notif) {
        //redirect dengan pesan sukses
        alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
        return redirect('/pengajuan');
         } else {
        //redirect dengan pesan error
        alert()->error('Gagal', 'GAGAL BRO NDA BISA MASUK Di ulangi lagi');
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
      
        return view('pengajuan.show', compact('data_user','data_rumah'));
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
    public function update(Request $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}

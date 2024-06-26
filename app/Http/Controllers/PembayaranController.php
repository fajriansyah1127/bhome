<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengajuan;
use App\Models\Datarumah;
use App\Models\User;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_rumah = Datarumah::with('type')->get();
        $data_user = User::get();
        $authenticatedUserId = Auth::id();
        $data_pembayaran_penghuni = Pengajuan::with('rumah', 'user')
            ->where('user_id', $authenticatedUserId)
            ->get();
        $data_pembayaran_admin = Pengajuan::with('rumah', 'user',)
            ->where('status_pengajuan', 'SETUJU')
            ->get();
        return view('pembayaran.index', compact('data_user', 'data_rumah', 'data_pembayaran_penghuni', 'data_pembayaran_admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
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
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}

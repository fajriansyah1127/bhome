<?php

namespace App\Http\Controllers;

use App\Models\Datarumah;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class DataRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_rumah = Type::get();
        $data_rumah = Datarumah::with('type')->get();
        $data_rumah_penghuni = Datarumah::with('type')
        ->where('pengajuan_id', null)
        ->get();
        return view('data_rumah.index', compact('type_rumah','data_rumah','data_rumah_penghuni'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_rumah' => 'required',
            'type' => 'required',
            'pln' => 'required',
            'pdam' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required',
            'foto' => 'required|file|image|mimes:jpg,jpeg,bmp,png|max:2048',
        ]);
        // return $request->all();
         
        if ($file = Request()->file('foto')) {
            $filename = Request()->kode_rumah . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto'), $filename);
        } else {
            $filename = 'foto' . Request()->kode_rumah . '.' . $file->getClientOriginalExtension();
        } 
    
        // Tambahkan ini untuk memeriksa nilai $filename
        // dd($filename);
        

        $notif = Pengajuan::create([
            'type_id' => $request->type,
            'kode_rumah' => $request->kode_rumah,
            'alamat' => $request->alamat,
            'pdam' => $request->pdam,
            'pln' => $request->pln,
            'latitude' => $request->latitude,
            'longtitude' => $request->longtitude,
            'alamat' => $request->alamat,
            'foto' => $filename,
            'pln' => $request->pln,
        ]);
       

          // Mengatur jatuh tempo 1 tahun setelah pembuatan data
        //   $notif->jatuh_tempo = Carbon::now()->addYear();
        //   $notif->save();

          
// Tambahkan ini untuk melihat nilai $notif
// dd($notif);

        if ($notif) {
        //redirect dengan pesan sukses
        alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
        return redirect('/data_rumah');
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
        // Ganti 'Datarumah' dengan model yang sesuai
        $data_rumah = Datarumah::with('user', 'type')
            ->find($id);
    
        // Pastikan data rumah ditemukan sebelum melanjutkan
        if ($data_rumah) {
            return view('data_rumah.show', compact('data_rumah'));
        } else {
            // Tindakan jika data rumah tidak ditemukan, misalnya redirect atau tampilkan pesan
            return redirect()->route('home')->with('error', 'Data rumah tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ganti 'Datarumah' dengan model yang sesuai
        $data_rumah = Datarumah::with('user', 'type')->findOrFail($id);
        $type_rumah = Type::get();
    
        // Pastikan data rumah ditemukan sebelum melanjutkan
        if ($data_rumah) {
            return view('data_rumah.edit', compact('data_rumah','type_rumah'));
        } else {
            // Tindakan jika data rumah tidak ditemukan, misalnya redirect atau tampilkan pesan
            return redirect()->route('home')->with('error', 'Data rumah tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi foto - uncomment jika diperlukan
        // $this->validate($request, [
        //     'foto' => 'required|file|image|mimes:jpg,jpeg,bmp,png|max:2048',
        // ]);
    
        // Temukan data rumah dengan id yang sesuai
        $data_rumah = Datarumah::find($id);
    
        // Pastikan data rumah ada sebelum melanjutkan
        if ($data_rumah) {
            $inter = $request->all();
    
            // Cek apakah ada file foto yang diupload
            if ($file = $request->file('foto')) {
                // Hapus foto lama jika ada
                if ($data_rumah->foto) {
                    File::delete('foto/' . $data_rumah->foto);
                }
    
                // Pindahkan file foto baru dan atur nama file
                $destinationPath = 'foto/';
                $filename = $request->kode_rumah . '.' . $file->extension();
                $file->move($destinationPath, $filename);
                $inter['foto'] = $filename;
            }
    
            // Update data rumah
            $data_rumah->update($inter);
    
            // Redirect dengan pesan sukses
            return redirect()->route('data_rumah.index');
        } else {
            // Redirect dengan pesan error
            return redirect()->route('data_rumah.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datarumah $datarumah)
    {
        //
    }
}

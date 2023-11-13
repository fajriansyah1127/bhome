<?php

namespace App\Http\Controllers;

use App\Models\Datarumah;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_rumah = Type::get();
        $data_rumah = Datarumah::with('type')->get();;
        return view('data_rumah.index', compact('type_rumah','data_rumah'));
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
        

        $notif = Datarumah::create([
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
    public function show(Datarumah $datarumah)
    {
        return view('data_rumah.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datarumah $datarumah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Datarumah $datarumah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datarumah $datarumah)
    {
        //
    }
}

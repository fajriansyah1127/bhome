<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('type_rumah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_type' => 'required',
            'ukuran' => 'required',
            'spesifikasi' => 'required',
            'harga' => 'required',
        ]);

        $notif = Type::create([
            'nama_type' => $request->nama_type,
            'ukuran' => $request->ukuran,
            'spesifikasi' => $request->spesifikasi,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
        ]);
       

        
        if($notif){
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/type_rumah');
        }else{
            //redirect dengan pesan error
            return redirect()->route('type_rumah.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
       
        // return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show($type)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('type_rumah.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}

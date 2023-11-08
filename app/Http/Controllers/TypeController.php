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
        $type_rumah = Type::get();
        return view('type_rumah.index', compact('type_rumah'));
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
       

        
        // if ($notif) {
        //     // Redirect dengan pesan sukses menggunakan SweetAlert 2
        //     return redirect('/type_rumah')->with('success', 'JOSSS DATANYA SUDAH MASUK');
        // } else {
        //     // Redirect dengan pesan error
        //     return redirect()->route('type_rumah.index')->with('error', 'Data Gagal Disimpan!');
        // }

        if ($notif) {
            //redirect dengan pesan sukses
            alert()->success('Success', 'JOSSS DATANYA SUDAH MASUK');
            return redirect('/type_rumah');
        } else {
            //redirect dengan pesan error
            alert()->error('Gagal', 'GAGAL BRO NDA BISA MASUK Di ulangi lagi');
            return redirect()->back();
        }
       
        //  return $request->all();
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
    public function edit($type)
    {
        $type_rumah = Type::find($type);
        return view('type_rumah.edit', compact('type_rumah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nama_type' => 'required',
            'ukuran' => 'required',
            'spesifikasi' => 'required',
            'harga' => 'required',
        ]);

        // return $request->all();

        $type = Type::find($id);
        $inter = $request->all();  
        $type->update($inter);

        if($type){
            //redirect dengan pesan sukses
            Alert::alert('DATA BERHASIL DIUBAH');
            return redirect('/type_rumah');
        }else{
            //redirect dengan pesan error
            return redirect()->route('asuransi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
          // $asuransi->delete();
        // Alert::alert('Data Berhasil DiHAPUS', 'success');
        // return redirect()->back();
        $type = Type::find($id);
        try {
            $type->delete();
        } catch (Exception $e){
            alert()->error('ERROR', 'Type Rumah Terdapat Pada Data Rumah Atau Dokumen');
            return redirect()->back();
        }

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
}

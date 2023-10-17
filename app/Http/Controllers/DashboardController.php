<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Datarumah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasiData = Datarumah::get();
        // $lokasi = Datarumah::get('pdam');
        // dd($lokasiData); // Ini akan mencetak data ke konsol
        return view('dashboard.index',compact('lokasiData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}

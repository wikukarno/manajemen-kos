<?php

namespace App\Http\Controllers;

use App\Models\Galleries;
use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\TipeKamar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::where('id')->get();
        $galleries = Galleries::with('kamar')
            ->where('id_kamar')
            ->get();
            
       
         return view('IsiData', [
            'galleries' => $galleries,
         
         ] ,compact('galleries'));
        
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Galleries $galleries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galleries $galleries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galleries $galleries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galleries $galleries)
    {
        //
    }
}
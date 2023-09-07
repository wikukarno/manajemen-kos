<?php

namespace App\Http\Controllers;

use App\Models\kosHome;
use App\Http\Requests\StorekosHomeRequest;
use App\Http\Requests\UpdatekosHomeRequest;
use App\Models\kamar;

class KosHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kos', [
            "active"=>'home'
        ]);
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
    public function store(StorekosHomeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kamar $kamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekosHomeRequest $request, kamar $kamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kamar $kamar)
    {
        //
    }
}
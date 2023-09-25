<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataPenghuni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataPenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item=User::find(auth()->user()->id);
        return view('pages.admin.datapenghuni.index', compact('item'));
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
    public function show(DataPenghuni $dataPenghuni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPenghuni $dataPenghuni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPenghuni $dataPenghuni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPenghuni $dataPenghuni)
    {
        //
    }
}

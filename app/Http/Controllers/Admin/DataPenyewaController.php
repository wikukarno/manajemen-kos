<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataPenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $item=User::find(auth()->user()->id);
        // return view('pages.admin.datapenghuni.index', compact('item'));
        // untuk menampilkan semua data nya
        $item=User::all();
        // untuk menampilkan ke halaman roometype nya
        return view('datapenghuni.index', ['item'=>$item]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

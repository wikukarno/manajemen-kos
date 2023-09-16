<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataUserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item=User::find(auth()->user()->id);
        return view('pages.admin.datauser.index', compact('item'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item=User::find(auth()->user()->id);
        // untuk mengubah bagian create nya
        return view('pages.admin.datauser.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // untuk mengengisi data nya
        $item=new User();
        $item->name=$request->name;
        $item->email=$request->email;
        $item->role=$request->role;
        $item->status_akun=$request->status_akun;
        $item->hp=$request->hp;
        $item->password=$request->password;
        $item->alasan_penolakan=$request->alasan_penolakan;
        $item->save();

        return redirect('pemilik/data-user')->with('success', 'Data Hass Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=User::find(auth()->user()->id);
        return view('pages.admin.datauser.show', compact('item'));
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

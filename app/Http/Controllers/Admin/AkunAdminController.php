<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AkunAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item=User::find(auth()->user()->id);

        return view('pages.admin.akunAdmin', compact('item'));
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
        $item = User::findOrFail($id);
        if($request->hasFile('profil')){
            $profil =  $request->file('profil')->store('assets/profile/admin', 'public');
        }
        else {
            $profil = $item->profil;
        }
        $item->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'hp'=>$request->hp,
            'profil'=>$profil
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

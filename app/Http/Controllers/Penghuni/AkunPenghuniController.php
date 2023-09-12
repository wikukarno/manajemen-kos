<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AkunPenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item=User::find(auth()->user()->id);

        return view('pages.penghuni.akunPenghuni', compact('item'));
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
        // $data = User::findOrFail($id);
        // return view('pages.penghuni.akunPenghuni', compact());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = User::findOrFail($id);

        if ($request->hasFile('profil')) {
            if (Auth::user()->profil != null) {
                Storage::disk('public')->delete(Auth::user()->profil);
                $profil = $request->file('profil')->store('assets/profile/penghuni', 'public');
            } else {
                $profil = $request->file('profil')->store('assets/profile/penghuni', 'public');
            }
        } else {
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
        $item = User::findOrFail($id);
        
        if($item->profil) {
            Storage::delete($item->profil);
        }
    }
}

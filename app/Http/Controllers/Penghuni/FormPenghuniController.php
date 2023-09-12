<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormPenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item=User::find(auth()->user()->id);

        return view('pages.penghuni.formPenghuni', compact('item'));
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
        $item=User::find(auth()->user()->id);
        return view('pages.penghuni.formEditPenghuni', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->all();
        $item = User::findOrFail($id);

        if ($request->hasFile('dokumen')) {
            if (Auth::user()->dokumen != null) {
                Storage::disk('public')->delete(Auth::user()->dokumen);
                $data['dokumen'] = $request->file('dokumen')->store('assets/penghuni/ktp', 'public');
            } else {
                $data['dokumen'] = $request->file('dokumen')->store('assets/penghuni/ktp', 'public');
            }
        }

        $item->update($data);
        return redirect()->route('form-penghuni.index')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

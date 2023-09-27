<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SewaKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $item=User::find(auth()->user()->id);
            return view('pages.penghuni.formSewaKamar', compact('item'));
            
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
        $memberString = implode(",", $request->get('fasilitas'));

        $item->update([
                'fasilitas'=>$memberString
                // 'fasilitas' => $request->fasilitas,
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

<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Kamar;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('availability', [
            "availabilitys" => kamar::all()
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Availability $availability)
    {
        return view('availability', [
            "availabilitys"=> Kamar::all()

        ]);
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Availability $availability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Availability $availability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Availability $availability)
    {
        //
    }
}
<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AkunPenghuniController extends Controller
{
    public function index()
    {
        $item=User::find(auth()->user()->id);

        return view('pages.penghuni.akunPenghuni', compact('item'));
    }
}

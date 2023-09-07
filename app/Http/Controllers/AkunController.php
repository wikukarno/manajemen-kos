<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $item=User::find(auth()->user()->id);

        return view('pages.akun', compact('item'));
    }
}

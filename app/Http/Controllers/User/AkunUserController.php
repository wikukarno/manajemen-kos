<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AkunUserController extends Controller
{
    public function index()
    {
        $item=User::find(auth()->user()->id);

        return view('pages.user.akunUser', compact('item'));
    }
}

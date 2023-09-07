<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AkunAdminController extends Controller
{
    public function index()
    {
        $item=User::find(auth()->user()->id);

        return view('pages.admin.akunAdmin', compact('item'));
    }
}

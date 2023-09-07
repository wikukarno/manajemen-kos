<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardUserController extends Controller
{
    public function index()
    {
        $item=User::find(auth()->user()->id);
        return view('pages.user.dashboard', compact('item'));
    }


}

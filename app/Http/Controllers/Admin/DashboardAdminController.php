<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $item=User::find(auth()->user()->id);
        return view('pages.admin.dashboard', compact('item'));
    }
}

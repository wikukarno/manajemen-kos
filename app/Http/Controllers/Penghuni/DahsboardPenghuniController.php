<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DahsboardPenghuniController extends Controller
{
    public function index()
    {
        return view('pages.penghuni.dashboard');
    }
}

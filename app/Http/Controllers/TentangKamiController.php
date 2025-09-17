<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.tentang-kami.index');
    }
}

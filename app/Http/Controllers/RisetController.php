<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riset;
use Illuminate\View\View;

class RisetController extends Controller
{
    public function index() : View
    {
        $modRiset = Riset::latest('tgl_riset')->get();

        return view('app', compact('modRiset'));
    }
}

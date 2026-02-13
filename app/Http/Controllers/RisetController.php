<?php

namespace App\Http\Controllers;

use App\Models\Profile;
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

    public function show(string $id): View
    {
        $modProfile = Profile::find(1);
        $riset = Riset::findOrFail($id);
        return view('show-riset', compact('modProfile', 'riset'));
    }
}

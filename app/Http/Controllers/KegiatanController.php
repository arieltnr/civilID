<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\View\View;

class KegiatanController extends Controller
{
    public function index() : View
    {
        $modKegiatan = Kegiatan::latest()->paginate(10);

        return view('app', compact('modKegiatan'));
    }
}

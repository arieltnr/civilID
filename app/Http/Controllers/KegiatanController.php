<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Profile;
use Illuminate\View\View;

class KegiatanController extends Controller
{
    public function index() : View
    {
        $modKegiatan = Kegiatan::latest()->paginate(10);

        return view('app', compact('modKegiatan'));
    }

    public function show(string $id): View
    {
        $modProfile = Profile::find(1);
        $kegiatan = Kegiatan::findOrFail($id);
        return view('show-kegiatan', compact('modProfile', 'kegiatan'));
    }
}

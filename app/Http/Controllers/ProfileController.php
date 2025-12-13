<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index() : View
    {
        $modProfile = Profile::find(1);

        return view('app', compact('modProfile'));
    }
}

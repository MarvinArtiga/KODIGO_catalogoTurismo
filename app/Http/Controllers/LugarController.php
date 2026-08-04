<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Contracts\View\View;

class LugarController extends Controller
{
    public function index(): View
    {
        return view('lugares.index', [
            'lugares' => Lugar::all(),
        ]);
    }

    public function show(Lugar $lugar): View
    {
        return view('lugares.show', [
            'lugar' => $lugar,
        ]);
    }
}

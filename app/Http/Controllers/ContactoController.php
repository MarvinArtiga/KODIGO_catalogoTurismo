<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoStoreRequest;
use App\Models\Contacto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactoController extends Controller
{
    public function create(): View
    {
        return view('contacto.create');
    }

    public function store(ContactoStoreRequest $request): RedirectResponse
    {
        Contacto::create($request->validated());

        return redirect()
            ->route('contacto.create')
            ->with('success', 'Gracias por su mensaje. Nos pondremos en contacto pronto.');
    }
}

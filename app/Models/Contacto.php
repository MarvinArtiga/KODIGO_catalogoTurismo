<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nombre', 'correo', 'telefono', 'mensaje'])]
class Contacto extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'contactos';
}

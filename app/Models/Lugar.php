<?php

namespace App\Models;

use Database\Factories\LugarFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['titulo', 'departamento', 'categoria', 'precio', 'descripcion', 'ubicacion', 'horario', 'imagen'])]
class Lugar extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'lugares';

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): LugarFactory
    {
        return LugarFactory::new();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    protected $table = 'aplications';

    protected $fillable = [
        'user_id',
        'name',
        'user_aplication',
        'password_aplication',
        'url_aplication',
        'notes',
    ];

    /**
     * Accessor para formatear la URL automáticamente.
     * El nombre del método debe ser el nombre de la columna en CamelCase.
     */
    protected function urlAplication(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (empty($value)) {
                    return null;
                }

                // Si no empieza con http o https, le ponemos https://
                return str_starts_with($value, 'http') 
                    ? $value 
                    : 'https://' . $value;
            },
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

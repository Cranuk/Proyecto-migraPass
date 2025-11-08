<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    protected $table = 'aplications';

    protected $fillable = [
        'user_id',
        'name',
        'user_aplication',
        'password_aplication',
        'url_application',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

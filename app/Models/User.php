<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'company_id',
        'name',
        'surname',
        'sector'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function aplications()
    {
        return $this->hasMany(Device::class);
    }
}

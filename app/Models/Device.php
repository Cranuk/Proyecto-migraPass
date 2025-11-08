<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';

    protected $fillable = [
        'user_id',
        'type_device_id',
        'name',
        'network_name',
        'user_device',
        'password_device',
        'ip_address',
        'system_operative',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typeDevice()
    {
        return $this->belongsTo(TypeDevice::class);
    }
}

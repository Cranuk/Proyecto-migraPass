<?php

namespace Database\Seeders;

use App\Models\TypeDevice;
use Illuminate\Database\Seeder;

class TypeDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeDevice::create([
            'name' => 'Computadora',
        ]);

        TypeDevice::create([
            'name' => 'Laptop',
        ]);
    }
}

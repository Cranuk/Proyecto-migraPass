<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CreateDatabase extends Command // TODO: comando para crear la base de datos si no existe el cual usa la configuración de .env para dicha creacion
{
    protected $signature = 'db:create';
    protected $description = 'Crea la base de datos si no existe';

    public function handle()
    {
        $database = Config::get('database.connections.mysql.database');
        $defaultConnection = Config::get('database.connections.mysql');
        $defaultConnection['database'] = null;

        Config::set('database.connections.temp', $defaultConnection); // NOTE: Conexión temporal sin base seleccionada

        try {
            DB::connection('temp')->statement("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
            $this->info("✅ Base de datos '$database' creada o ya existente.");
        } catch (\Exception $e) {
            $this->error("❌ Error al crear la base: " . $e->getMessage());
        }
    }
}

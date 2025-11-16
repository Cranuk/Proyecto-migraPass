<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helpers
{
    // TODO: aquí estarán los métodos que se usarán en toda la web, revisar igual si funciona como corresponde

    // NOTE: función para las fechas
    public static function formatDate($date)
    {
        $fecha = Carbon::parse($date)->format('d/m/Y H:i:s');
        return $fecha;
    }

    // NOTE: función para los acrónimos
    public static function getAcronym($data)
    {
        $name = trim($data);

        if (mb_strlen($name) === 0) return 'XX';

        $first = mb_substr($name, 0, 1);
        $last  = mb_substr($name, -1, 1);

        return strtoupper($first . $last);
    }
}

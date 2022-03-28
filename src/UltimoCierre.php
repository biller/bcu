<?php

namespace biller\bcu;

class UltimoCierre
{
    use WsBcu;

    public static function obtener($cache = true): string
    {
        if ($cache && ($fecha = self::cacheGet())) {
            return $fecha;
        }

        $conexion = self::getSoapClient('awsultimocierre');
        $resultado = $conexion->Execute();
        $fecha = $resultado->Salida->Fecha;

        if ($cache) {
            self::cachePut($fecha);
        }

        return $fecha;
    }

    private static function cacheGet()
    {
        $path = __DIR__ . '/../cache/ultimo_cierre.txt';

        if (!file_exists($path)) {
            return false;
        }

        $fecha = file_get_contents($path);
        if ($fecha == date('Y-m-d', strtotime('-3 hours'))) {
            return $fecha;
        }

        $modificacion = filemtime($path);
        if (strtotime('-30 minutes') < $modificacion) {
            return $fecha;
        }

        return false;
    }

    private static function cachePut($fecha)
    {
        $path = __DIR__ . '/../cache/ultimo_cierre.txt';
        file_put_contents($path, $fecha);
    }
}
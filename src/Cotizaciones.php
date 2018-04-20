<?php

namespace biller\bcu;

use DateTime;
use Exception;
use SoapClient;

class Cotizaciones {

    public static function obtenerUltimoCierre() {
        $conexion = self::getSoapClient('awsultimocierre');
        $resultado = $conexion->Execute();
        return $resultado->Salida->Fecha;
    }

    public static function obtenerCotizacion($fecha = null, $moneda = 2225, $grupo = 0) {
        if (isset($fecha)) {
            if (!DateTime::createFromFormat('Y-m-d', $fecha)) {
                throw new Exception("Formato de fecha no es AAAA-MM-DD");
            }
        } else {
            $fecha = self::obtenerUltimoCierre();
        }

        $params = [
            'Entrada' => [
                'FechaDesde' => $fecha,
                'FechaHasta' => $fecha,
                'Grupo' => $grupo,
                'Moneda' => ['item' => $moneda],
            ]
        ];

        $client = self::getSoapClient('awsbcucotizaciones');
        $response = $client->Execute($params);

        return $response->Salida->datoscotizaciones->{'datoscotizaciones.dato'}->TCC;
    }

    private static function getSoapClient($ws) {
        $options = [
            'cache_wsdl' => WSDL_CACHE_NONE,
            'stream_context' => stream_context_create([
                'ssl' => [
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                    'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT
                ]
            ])
        ];
        return new SoapClient("https://cotizaciones.bcu.gub.uy/wscotizaciones/servlet/$ws?wsdl", $options);
    }

}

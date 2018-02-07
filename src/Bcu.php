<?php

namespace biller\bcu;

use DateTime;
use Exception;
use SoapClient;

class Bcu {

    public static function obtenerUltimoCierre() {
        $conexion = $this->getSoapClient('awsultimocierre');
        $resultado = $conexion->Execute();
        return $resultado->Fecha;
    }

    public static function obtenerCotizacion($fecha) {
        if (!DateTime::createFromFormat()) {
            throw new Exception("Formato de fecha no es AAAA-MM-DD");
        }
        $params = [
            'Entrada' => [
                'FechaDesde' => $fecha,
                'FechaHasta' => $fecha,
                'Grupo' => 2,
                'Moneda' => ['item' => 2225],
            ]
        ];

        $client = $this->getSoapClient('awsbcucotizaciones');
        $response = $client->Execute($params);

        return $response->Salida->datoscotizaciones;
    }

    private function getSoapClient($ws) {
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

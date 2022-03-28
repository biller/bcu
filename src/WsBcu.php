<?php

namespace biller\bcu;

use SoapClient;

trait WsBcu
{
    private static function getSoapClient($ws)
    {
        $options = [
            'stream_context' => stream_context_create([
                'ssl' => ['cafile' => __DIR__ . '/../cacert.pem'],
            ]),
        ];

        return new SoapClient("https://cotizaciones.bcu.gub.uy/wscotizaciones/servlet/$ws?wsdl", $options);
    }
}
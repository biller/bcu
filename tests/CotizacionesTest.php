<?php

namespace tests;

use biller\bcu\Cotizaciones;
use PHPUnit\Framework\TestCase;

class CotizacionesTest extends TestCase
{
    public function testObtenerCotizacion()
    {
        $cotizacion = Cotizaciones::obtener('2019-07-16');
        $this->assertEquals(35.165, $cotizacion);
    }
}

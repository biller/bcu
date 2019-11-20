<?php

use biller\bcu\Cotizaciones;
use Codeception\Test\Unit;

class CotizacionesTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testObtenerCotizacion()
    {
        $cotizacion = Cotizaciones::obtenerCotizacion('2019-07-16');
        $this->tester->assertEquals(35.165, $cotizacion);
    }
}
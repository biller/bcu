<?php

namespace tests;

use biller\bcu\UltimoCierre;
use PHPUnit\Framework\TestCase;

class UltimoCierreTest extends TestCase
{
    public function testObtener()
    {
        $fecha = UltimoCierre::obtener();
        $this->assertMatchesRegularExpression('/\d{4}-\d{2}-\d{2}/', $fecha);
    }

    public function testObtenerSinCache()
    {
        $fecha = UltimoCierre::obtener(false);
        $this->assertMatchesRegularExpression('/\d{4}-\d{2}-\d{2}/', $fecha);
    }
}

<?php

namespace unit;

use biller\bcu\UltimoCierre;
use UnitTester;

class UltimoCierreTest extends \Codeception\Test\Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testObtener()
    {
        $fecha = UltimoCierre::obtener();
        $this->tester->assertRegExp('/\d{4}-\d{2}-\d{2}/', $fecha);
    }

    public function testObtenerSinCache()
    {
        $fecha = UltimoCierre::obtener(false);
        $this->tester->assertRegExp('/\d{4}-\d{2}-\d{2}/', $fecha);
    }
}
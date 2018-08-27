<?php
declare(strict_types=1);

namespace Tests\CuentaIban\Objetos;

use CuentaIban\Objetos\NumeroVerificador;
use PHPUnit\Framework\TestCase;

final class NumeroVerificadorTest extends TestCase
{
    private $resultadoEsperado;
    private $resultadoObtenido;

    final public function testCalcularEsDiez()
    {
        $this->resultadoEsperado = 10;
        $numeroVerificador = new NumeroVerificador('10200009007408120');
        $this->resultadoObtenido = $numeroVerificador->calcular();
        $this->assertEquals($this->resultadoEsperado, $this->resultadoObtenido);
    }

    final public function testCalcularEsMenorADiez()
    {
        $this->resultadoEsperado = 9;
        $numeroVerificador = new NumeroVerificador('10000073919007800');
        $this->resultadoObtenido = $numeroVerificador->calcular();
        $this->assertEquals($this->resultadoEsperado, $this->resultadoObtenido);
    }

    final public function testCalcularEsMenorADiezEsEntero()
    {
        $this->resultadoEsperado = 'int';
        $numeroVerificador = new NumeroVerificador('10000073919007800');
        $this->resultadoObtenido = $numeroVerificador->calcular();
        $this->assertInternalType($this->resultadoEsperado, $this->resultadoObtenido);
    }
}

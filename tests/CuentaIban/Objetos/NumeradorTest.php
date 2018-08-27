<?php
declare(strict_types=1);

namespace Tests\CuentaIban\Objetos;

use CuentaIban\Objetos\Numerador;
use PHPUnit\Framework\TestCase;

final class NumeradorTest extends TestCase
{
    private $resultadoEsperado;
    private $resultadoObtenido;

    final public function testNumeroVerificadorEsDiezNoSeProcedeConCero()
    {
        $this->resultadoEsperado = 'CR1010200009007408120';
        $this->resultadoObtenido = Numerador::generar('10200009007408120');
        $this->assertEquals($this->resultadoEsperado, $this->resultadoObtenido);
    }

    final public function testNumeroVerificadorEsMenorADiezSeProcedeConCero()
    {
        $this->resultadoEsperado = 'CR0910000073919007800';
        $this->resultadoObtenido = Numerador::generar('10000073919007800');
        $this->assertEquals($this->resultadoEsperado, $this->resultadoObtenido);
    }
}

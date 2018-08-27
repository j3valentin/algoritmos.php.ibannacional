<?php
declare(strict_types=1);

namespace Tests\CuentaIban\Objetos;

use CuentaIban\Objetos\DosDigitosVerificadores;
use PHPUnit\Framework\TestCase;

final class DosDigitosVerificadoresTest extends TestCase
{
    private $resultadoEsperado;
    private $resultadoObtenido;

    final public function testFormateeComoDosDigitosEsDiezNoSeProcedeConCero()
    {
        $this->resultadoEsperado = 10;
        $dosDigitosVerificadores = new DosDigitosVerificadores('10200009007408120');
        $this->resultadoObtenido = $dosDigitosVerificadores->formateeComoDosDigitos();
        $this->assertEquals($this->resultadoEsperado, $this->resultadoObtenido);
    }

    final public function testFormateeComoDosDigitosEsMenorADiezSeProcedeConCero()
    {
        $this->resultadoEsperado = '09';
        $dosDigitosVerificadores = new DosDigitosVerificadores('10000073919007800');
        $this->resultadoObtenido = $dosDigitosVerificadores->formateeComoDosDigitos();
        $this->assertEquals($this->resultadoEsperado, $this->resultadoObtenido);
    }

    final public function testFormateeComoDosDigitosEsMenorADiezSeProcedeConCeroEsString()
    {
        $this->resultadoEsperado = 'string';
        $dosDigitosVerificadores = new DosDigitosVerificadores('10000073919007800');
        $this->resultadoObtenido = $dosDigitosVerificadores->formateeComoDosDigitos();
        $this->assertInternalType($this->resultadoEsperado, $this->resultadoObtenido);
    }
}

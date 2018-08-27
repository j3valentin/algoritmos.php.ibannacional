<?php
/**
 * Created by PhpStorm.
 * User: mrbon
 * Date: 27/08/2018
 * Time: 3:34 PM
 */

namespace CuentaIban\Objetos;


class NumeroDeCuenta
{
    private $cuentaCliente;
    private $dosDigitosVerificadores;

    public function __construct($sCuentaCliente)
    {
        $this->cuentaCliente = $sCuentaCliente;
        $dosDigitosVerificadores = new DosDigitosVerificadores($sCuentaCliente);
        $this->dosDigitosVerificadores = $dosDigitosVerificadores->formateeComoDosDigitos();
    }

    public function formateeElNumeroDeCuenta()
    {
        $lasInicialesDelPais = 'CR';
        return $lasInicialesDelPais . $this->dosDigitosVerificadores . $this->cuentaCliente;
    }
}

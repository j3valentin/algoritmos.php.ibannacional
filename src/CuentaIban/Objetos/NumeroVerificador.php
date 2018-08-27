<?php
/**
 * Created by PhpStorm.
 * User: mrbon
 * Date: 27/08/2018
 * Time: 1:58 PM
 */

namespace CuentaIban\Objetos;


class NumeroVerificador
{
    private $requerimiento;

    public function __construct($sCuentaCliente)
    {
        $sCodigoDelPais = '00';
        $sNumeroISODelPais = '1227';
        $this->requerimiento = $sCuentaCliente . $sNumeroISODelPais . $sCodigoDelPais;
    }

    public function calcular()
    {
        return 98 - bcmod($this->requerimiento, '97');
    }
}

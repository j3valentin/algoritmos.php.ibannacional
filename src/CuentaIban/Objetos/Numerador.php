<?php
declare(strict_types=1);

namespace CuentaIban\Objetos;

final class Numerador
{
    public static function generar($sCuentaCliente)
    {
        $numeroDecuenta = new NumeroDeCuenta($sCuentaCliente);
        return $numeroDecuenta->formateeElNumeroDeCuenta();
    }
}

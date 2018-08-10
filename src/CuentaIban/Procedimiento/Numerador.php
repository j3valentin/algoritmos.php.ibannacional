<?php
declare(strict_types=1);

namespace CuentaIban\Procedimiento;

final class Numerador
{
    public static function generar(string $sNumeroCuenta)
    {
        $sLetrasDelPais = '1227';
        $sCodigoDelPais = '00';

        $sRequerimiento = $sNumeroCuenta . $sLetrasDelPais . $sCodigoDelPais;

        // http://rodriguezizquierdo.com/calcular-codigo-internacional-de-cuenta-bancaria-iban-en-php/
        $numeroVerificador = 98 - bcmod($sRequerimiento, '97');

        if ($numeroVerificador < 10) {
            $dosDigitosVerificadores = "0" . $numeroVerificador;
        } else {
            $dosDigitosVerificadores = $numeroVerificador;
        }

        return 'CR' . $dosDigitosVerificadores . $sNumeroCuenta;
    }
}

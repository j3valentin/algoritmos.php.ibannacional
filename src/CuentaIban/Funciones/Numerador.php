<?php
declare(strict_types=1);

namespace CuentaIban\Funciones;

final class Numerador
{
    public static function generar($sCuentaCliente)
    {
        $sDigitos = self::genereLosDosDigitosVerificadores($sCuentaCliente);
        return self::formateeElNumeroDeCuenta($sCuentaCliente, $sDigitos);
    }

    private static function genereLosDosDigitosVerificadores($sCuentaCliente)
    {
        $numeroVerificador = self::genereElNumeroVerificador($sCuentaCliente);
        return self::formateeComoDosDigitos($numeroVerificador);
    }

    private static function genereElNumeroVerificador($sCuentaCliente)
    {
        $sRequerimiento = self::formateeElRequerimiento($sCuentaCliente);
        return self::calculeElNumeroVerificador($sRequerimiento);
    }

    private static function formateeElRequerimiento($sCuentaCliente)
    {
        $sCodigoDelPais = '00';
        $sNumeroISODelPais = '1227';
        return $sCuentaCliente . $sNumeroISODelPais . $sCodigoDelPais;
    }

    private static function calculeElNumeroVerificador($sRequerimiento)
    {
        return 98 - bcmod($sRequerimiento, '97');
    }

    private static function formateeComoDosDigitos($numeroVerificador)
    {
        if (self::tieneSoloUnDigito($numeroVerificador)) {
            return self::formateeElNumeroPredecidoConUnCero($numeroVerificador);
        }
        return $numeroVerificador;
    }

    private static function tieneSoloUnDigito($numeroVerificador)
    {
        return $numeroVerificador < 10;
    }

    private static function formateeElNumeroPredecidoConUnCero($numeroVerificador)
    {
        return '0' . $numeroVerificador;        
    }
    
    private static function formateeElNumeroDeCuenta($sCuentaCliente, $losDosDigitos)
    {
        $lasInicialesDelPais = 'CR';
        return $lasInicialesDelPais . $losDosDigitos . $sCuentaCliente;  
    }
}

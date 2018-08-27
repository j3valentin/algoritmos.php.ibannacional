<?php
/**
 * Created by PhpStorm.
 * User: mrbon
 * Date: 27/08/2018
 * Time: 3:13 PM
 */

namespace CuentaIban\Objetos;


class DosDigitosVerificadores
{
    private $numeroVerificador;

    public function __construct($sCuentaCliente)
    {
        $numeroVerificador = new NumeroVerificador($sCuentaCliente);
        $this->numeroVerificador = $numeroVerificador->calcular();
    }

    public function formateeComoDosDigitos()
    {
        if ($this->tieneSoloUnDigito()) {
            return $this->formateeElNumeroPredecidoConUnCero();
        }
        return $this->numeroVerificador;
    }

    private function tieneSoloUnDigito()
    {
        return $this->numeroVerificador < 10;
    }

    private function formateeElNumeroPredecidoConUnCero()
    {
        return '0' . $this->numeroVerificador;
    }
}
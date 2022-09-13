<?php
if (! function_exists('sumarPuntos')) {
    function sumarPuntos($value, $tipe)
    {
        if ($value == null) {
            return $value = 5;
        }
        else {
            return $value->pluck($tipe)->sum();
        }
    }
}

<?php

function calcularFormula($x, $y) {
    if ($x + $y == 0) {
        return "Não é possível dividir por 0";
    }

    $resultado = (pow($x, 2) + pow($y, 2)) / ($x + $y);
    return $resultado;
}

echo calcularFormula(1, 4);
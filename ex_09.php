<?php

function analisarNumero(int $numero): array {
    $paridade = ($numero % 2 === 0) ? 'Par' : 'Ímpar';

    $ePrimo = true;
    if ($numero <= 1) {
        $ePrimo = false;
    } else {
        for ($i = 2; $i * $i <= $numero; $i++) {
            if ($numero % $i === 0) {
                $ePrimo = false;
                break;
            }
        }
    }

    $ePerfeito = false;
    if ($numero > 1) {
        $somaDivisores = 1;
        for ($i = 2; $i * $i <= $numero; $i++) {
            if ($numero % $i === 0) {
                $somaDivisores += $i;
                if ($i * $i !== $numero) {
                    $somaDivisores += $numero / $i;
                }
            }
        }
        $ePerfeito = ($somaDivisores === $numero);
    }

    return [
        'numero'   => $numero,
        'paridade' => $paridade,
        'primo'    => $ePrimo ? 'Sim' : 'Não',
        'perfeito' => $ePerfeito ? 'Sim' : 'Não',
    ];
}

$numerosParaTestar = [6, 7, 28, 12, 1];

foreach ($numerosParaTestar as $num) {
    $resultado = analisarNumero($num);
    echo sprintf(
        "Número %2d -> Paridade: %-5s | Primo: %-3s | Perfeito: %s\n",
        $resultado['numero'],
        $resultado['paridade'],
        $resultado['primo'],
        $resultado['perfeito']
    );
}
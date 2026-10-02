<?php

function estatisticasNumericas(array $numeros): array {
    if (empty($numeros)) {
        throw new InvalidArgumentException('O vetor de números não pode estar vazio.');
    }

    $totalElements = count($numeros);
    $soma = array_sum($numeros);
    $media = $soma / $totalElements;
    $maior = max($numeros);
    $menor = min($numeros);

    $pares = 0;
    $impares = 0;

    foreach ($numeros as $numero) {
        if ($numero % 2 === 0) {
            $pares++;
        } else {
            $impares++;
        }
    }

    $ordenados = $numeros;
    sort($ordenados);

    $meio = intdiv($totalElements, 2);

    if ($totalElements % 2 === 0) {
        $mediana = ($ordenados[$meio - 1] + $ordenados[$meio]) / 2;
    } else {
        $mediana = $ordenados[$meio];
    }

    return [
        'soma'       => $soma,
        'media'      => round($media, 2),
        'maior'      => $maior,
        'menor'      => $menor,
        'mediana'    => $mediana,
        'qtd_pares'   => $pares,
        'qtd_impares' => $impares,
    ];
}

$colecao = [10, 5, 8, 3, 12, 7];
$estatisticas = estatisticasNumericas($colecao);

print_r($estatisticas);
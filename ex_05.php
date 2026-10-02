<?php

function analisarTexto(string $texto): array {
    $caracteres = mb_strlen($texto);

    $palavras = preg_match_all('/\p{L}+/u', $texto);

    $vogais = preg_match_all('/[aeiouáàâãéêíóôõúü]/ui', $texto);

    $consoantes = preg_match_all('/[bcdfghjklmnpqrstvwxyzç]/ui', $texto);

    return [
        'palavras'   => $palavras,
        'caracteres' => $caracteres,
        'vogais'     => $vogais,
        'consoantes' => $consoantes,
    ];
}

$texto = "O PHP é uma linguagem incrível e muito popular!";
$estatisticas = analisarTexto($texto);

print_r($estatisticas);

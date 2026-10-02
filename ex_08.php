<?php

function ordenarNomes(string $nomes): array {
    $listaNomes = explode(',', $nomes);

    $listaNomes = array_map('trim', $listaNomes);

    $listaNomes = array_filter($listaNomes, fn($nome) => $nome !== '');

    natcasesort($listaNomes);

    return array_values($listaNomes);
}

$entrada = " Carlos, Ana , Beatriz ,  João,  alberto, Daniel ";
$nomesOrdenados = ordenarNomes($entrada);

print_r($nomesOrdenados);
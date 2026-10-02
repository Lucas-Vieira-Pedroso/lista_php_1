<?php

function mascararCpf(string $cpf): string {
    $tamanho = strlen($cpf);

    if ($tamanho <= 4) {
        return $cpf;
    }

    $visiveis = substr($cpf, -4);
    $ocultos = str_repeat('*', $tamanho - 4);

    return $ocultos . $visiveis;
}

echo mascararCpf('12345678900');
echo mascararCpf('123.456.789-00');
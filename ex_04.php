<?php

function gerarSenha(int $tamanho = 12): string {
    if ($tamanho < 4) {
        throw new InvalidArgumentException('O tamanho minimo da senha deve ser de 4 caracteres.');
    }

    $maiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $minusculas = 'abcdefghijklmnopqrstuvwxyz';
    $numeros    = '0123456789';
    $especiais  = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    $senha = [
        $maiusculas[random_int(0, strlen($maiusculas) - 1)],
        $minusculas[random_int(0, strlen($minusculas) - 1)],
        $numeros[random_int(0, strlen($numeros) - 1)],
        $especiais[random_int(0, strlen($especiais) - 1)],
    ];

    $todosConjuntos = $maiusculas . $minusculas . $numeros . $especiais;
    $maxIndex = strlen($todosConjuntos) - 1;

    for ($i = count($senha); $i < $tamanho; $i++) {
        $senha[] = $todosConjuntos[random_int(0, $maxIndex)];
    }

    for ($i = count($senha) - 1; $i > 0; $i--) {
        $j = random_int(0, $i);
        $temp = $senha[$i];
        $senha[$i] = $senha[$j];
        $senha[$j] = $temp;
    }

    return implode('', $senha);
}

echo gerarSenha(12);
echo "\n";
echo gerarSenha(16);
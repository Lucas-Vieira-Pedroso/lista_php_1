<?php

function calcularIMC(float $peso, float $altura): array {
    if ($altura <= 0 || $peso <= 0) {
        throw new InvalidArgumentException('Peso e altura devem ser valores positivos.');
    }

    $imc = $peso / ($altura ** 2);

    if ($imc < 18.5) {
        $classificacao = 'Abaixo do peso';
    } elseif ($imc < 25.0) {
        $classificacao = 'Peso normal';
    } elseif ($imc < 30.0) {
        $classificacao = 'Sobrepeso';
    } else {
        $classificacao = 'Obesidade';
    }

    return [
        'imc' => round($imc, 2),
        'classificacao' => $classificacao,
    ];
}

function validarEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function gerarSenhaAleatoria(int $tamanho = 12): string {
    if ($tamanho < 4) {
        throw new InvalidArgumentException('A senha deve ter no mínimo 4 caracteres.');
    }

    $maiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $minusculas = 'abcdefghijklmnopqrstuvwxyz';
    $numeros    = '0123456789';
    $especiais  = '!@#$%^&*()_+-=';

    $senha = [
        $maiusculas[random_int(0, strlen($maiusculas) - 1)],
        $minusculas[random_int(0, strlen($minusculas) - 1)],
        $numeros[random_int(0, strlen($numeros) - 1)],
        $especiais[random_int(0, strlen($especiais) - 1)],
    ];

    $todos = $maiusculas . $minusculas . $numeros . $especiais;
    $max = strlen($todos) - 1;

    for ($i = count($senha); $i < $tamanho; $i++) {
        $senha[] = $todos[random_int(0, $max)];
    }

    shuffle($senha);
    return implode('', $senha);
}

function contarVogais(string $texto): int {
    return preg_match_all('/[aeiouáàâãéêíóôõúü]/ui', $texto);
}

function inverterTexto(string $texto): string {
    $caracteres = mb_str_split($texto);
    return implode('', array_reverse($caracteres));
}

function calcularIdade(string $dataNascimento): int {
    $nascimento = new DateTime($dataNascimento);
    $hoje = new DateTime('now');
    return $nascimento->diff($hoje)->y;
}

function converterMoeda(float $valor, float $taxaCambio): float {
    return round($valor * $taxaCambio, 2);
}

function formatarTelefone(string $telefone): string {
    $digitos = preg_replace('/\D/', '', $telefone);
    $tamanho = strlen($digitos);

    if ($tamanho === 11) {
        return preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '($1) $2-$3', $digitos);
    } elseif ($tamanho === 10) {
        return preg_replace('/^(\d{2})(\d{4})(\d{4})$/', '($1) $2-$3', $digitos);
    }

    return $telefone;
}

function gerarSaudacao(?string $horario = null): string {
    $hora = $horario ? (int)date('H', strtotime($horario)) : (int)date('H');

    if ($hora >= 6 && $hora < 12) {
        return 'Bom dia!';
    } elseif ($hora >= 12 && $hora < 18) {
        return 'Boa tarde!';
    } else {
        return 'Boa noite!';
    }
}

function validarSenhaForte(string $senha): bool {
    $temTamanho = strlen($senha) >= 8;
    $temMaiuscula = preg_match('/[A-Z]/', $senha);
    $temMinuscula = preg_match('/[a-z]/', $senha);
    $temNumero = preg_match('/[0-9]/', $senha);
    $temEspecial = preg_match('/[\W_]/', $senha);

    return $temTamanho && $temMaiuscula && $temMinuscula && $temNumero && $temEspecial;
}
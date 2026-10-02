<?php

function criptografarMensagem(string $texto, int $deslocamento = 3): string {
    $deslocamento = ($deslocamento % 26 + 26) % 26;
    $resultado = '';

    for ($i = 0; $i < strlen($texto); $i++) {
        $char = $texto[$i];

        if ($char >= 'A' && $char <= 'Z') {
            $resultado .= chr((ord($char) - ord('A') + $deslocamento) % 26 + ord('A'));
        }
        elseif ($char >= 'a' && $char <= 'z') {
            $resultado .= chr((ord($char) - ord('a') + $deslocamento) % 26 + ord('a'));
        }
        else {
            $resultado .= $char;
        }
    }

    return $resultado;
}

function descriptografarMensagem(string $texto, int $deslocamento = 3): string {
    return criptografarMensagem($texto, -$deslocamento);
}

$mensagemOriginal = "Mensagem Secreta PHP 2026!";
$chave = 3;

$mensagemCriptografada = criptografarMensagem($mensagemOriginal, $chave);

$mensagemDecodificada = descriptografarMensagem($mensagemCriptografada, $chave);

echo "Original:       " . $mensagemOriginal . "\n";
echo "Criptografada:  " . $mensagemCriptografada . "\n";
echo "Descriptografada: " . $mensagemDecodificada . "\n";
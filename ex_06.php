<?php

function converterTemperatura(float $valor, string $origem, string $destino): float {
    $origem = strtoupper(trim($origem));
    $destino = strtoupper(trim($destino));

    if ($origem === $destino) {
        return $valor;
    }

    switch ($origem) {
        case 'C':
            $celsius = $valor;
            break;
        case 'F':
            $celsius = ($valor - 32) * 5 / 9;
            break;
        case 'K':
            $celsius = $valor - 273.15;
            break;
        default:
            throw new InvalidArgumentException("Escala de origem inválida: '{$origem}'. Use 'C', 'F' ou 'K'.");
    }

    switch ($destino) {
        case 'C':
            return $celsius;
        case 'F':
            return ($celsius * 9 / 5) + 32;
        case 'K':
            return $celsius + 273.15;
        default:
            throw new InvalidArgumentException("Escala de destino inválida: '{$destino}'. Use 'C', 'F' ou 'K'.");
    }
}

echo "100°C em Fahrenheit: " . converterTemperatura(100, 'C', 'F') . "°F\n";
echo "0°C em Kelvin: " . converterTemperatura(0, 'C', 'K') . " K\n";       
echo "32°F em Celsius: " . converterTemperatura(32, 'F', 'C') . "°C\n";       
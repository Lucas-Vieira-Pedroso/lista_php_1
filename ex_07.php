<?php

function calcularDesconto(float $valorTotal): array {
    if ($valorTotal <= 0) {
        throw new InvalidArgumentException('O valor da compra deve ser maior que zero.');
    }

    if ($valorTotal > 1000) {
        $percentual = 0.30; // 30%
    } elseif ($valorTotal > 500) {
        $percentual = 0.20; // 20%
    } elseif ($valorTotal > 100) {
        $percentual = 0.10; // 10%
    } else {
        $percentual = 0.00;
    }

    $valorDesconto = $valorTotal * $percentual;
    $valorFinal = $valorTotal - $valorDesconto;

    return [
        'valor_original'      => $valorTotal,
        'percentual_desconto' => ($percentual * 100) . '%',
        'valor_desconto'      => $valorDesconto,
        'valor_final'         => $valorFinal,
    ];
}

$valoresValidados = [80.00, 100.00, 250.00, 500.00, 750.00, 1000.00, 1500.00];

foreach ($valoresValidados as $valor) {
    $resultado = calcularDesconto($valor);
    
    echo sprintf(
        "Original: R$ %7.2f | Desconto: %4s (R$ %6.2f) | Valor Final: R$ %7.2f\n",
        $resultado['valor_original'],
        $resultado['percentual_desconto'],
        $resultado['valor_desconto'],
        $resultado['valor_final']
    );
}

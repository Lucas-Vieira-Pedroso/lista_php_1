<?php

function calcularMedia(array $notas): array {
    if (empty($notas)) {
        throw new InvalidArgumentException('O array de notas não pode estar vazio.');
    }

    $maiorNota = max($notas);
    $menorNota = min($notas);
    $media = array_sum($notas) / count($notas);

    if ($media >= 7.0) {
        $situacao = 'Aprovado';
    } elseif ($media >= 5.0) {
        $situacao = 'Recuperação';
    } else {
        $situacao = 'Reprovado';
    }

    return [
        'maior_nota' => $maiorNota,
        'menor_nota' => $menorNota,
        'media'      => round($media, 2),
        'situacao'   => $situacao,
    ];
}

$turma = [
    'Ana'   => [8.5, 9.0, 7.5, 10.0],
    'Bruno' => [5.5, 6.0, 4.5, 7.0],
    'Carla' => [3.0, 4.0, 2.5, 5.0],
];

foreach ($turma as $aluno => $notas) {
    $resultado = calcularMedia($notas);
    
    echo "Aluno(a): {$aluno}\n";
    echo "  - Maior Nota: {$resultado['maior_nota']}\n";
    echo "  - Menor Nota: {$resultado['menor_nota']}\n";
    echo "  - Média:      {$resultado['media']}\n";
    echo "  - Situação:   {$resultado['situacao']}\n";
    echo str_repeat('-', 30) . "\n";
}
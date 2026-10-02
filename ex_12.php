<?php

function analisarProdutos(array $produtos, string $termoBusca = ''): array {
    if (empty($produtos)) {
        throw new InvalidArgumentException('O catálogo de produtos não pode estar vazio.');
    }

    $maisCaro = $produtos[0];
    $maisBarato = $produtos[0];
    $somaPrecos = 0;
    $resultadoBusca = null;

    foreach ($produtos as $produto) {
        if ($produto['preco'] > $maisCaro['preco']) {
            $maisCaro = $produto;
        }

        if ($produto['preco'] < $maisBarato['preco']) {
            $maisBarato = $produto;
        }

        $somaPrecos += $produto['preco'];

        if (!empty($termoBusca) && mb_strtolower($produto['nome'], 'UTF-8') === mb_strtolower(trim($termoBusca), 'UTF-8')) {
            $resultadoBusca = $produto;
        }
    }

    $mediaPrecos = $somaPrecos / count($produtos);

    return [
        'mais_caro'    => $maisCaro,
        'mais_barato'  => $maisBarato,
        'media_precos' => round($mediaPrecos, 2),
        'pesquisa'     => $resultadoBusca ?? 'Produto não encontrado na busca',
    ];
}

$catalogo = [
    ['nome' => 'Arroz 5kg',    'preco' => 28.90],
    ['nome' => 'Feijão 1kg',   'preco' => 7.50],
    ['nome' => 'Café 500g',    'preco' => 18.20],
    ['nome' => 'Azeite 500ml', 'preco' => 42.00],
    ['nome' => 'Leite 1L',     'preco' => 4.80],
];

$resultado = analisarProdutos($catalogo, 'café 500g');

print_r($resultado);
<?php

function inverterTexto($texto){

$caracteres = preg_split('//u', $texto, preg_split_no_empty);

$caracteresInvertidos = array_reverse($caracteres);

}

echo inverterTexto(texto);
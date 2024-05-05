<?php

function Calculo($valor1, $valor2, $operador ) {
    switch ($operador) {
        case "+":
           $resultado = $valor1 + $valor2;
            break;
        case "-":
            $resultado = $valor1 - $valor2;
            break;
        case "*":
            $resultado = $valor1 * $valor2;
            break;
        case "/":
            $resultado = $valor1 / $valor2;
            break;
        case "!":
            for ($i = $valor1; $i >= 0; $i--) {
                $valor1 *= $i;
            }
            $resultado = $valor1;
            break;
        case "^":
            $resultado = pow($valor1, $valor2);

    }
}

?>
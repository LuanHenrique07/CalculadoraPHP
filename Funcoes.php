<?php

function fatorial($n) {
    if ($n < 0) {
        return "Erro: Não é possível calcular o fatorial de um número negativo.";
    } elseif ($n == 0) {
        return 1;
    } else {
        $resultado = 1;
        for ($i = 1; $i <= $n; $i++) {
            $resultado *= $i;
        }
        
        $calculo = "$n! = $resultado";
        registrarCalculoNoHistorico($calculo);
        return $resultado;
    }
}

function Calculo($valor1, $valor2, $operador ) {
    $resultado = null;

    switch ($operador) {
        case "+":
            $resultado = $valor1 + $valor2;
            return $resultado;
            break;
        case "-":
            $resultado = $valor1 - $valor2;
            return $resultado;
            break;
        case "*":
            $resultado = $valor1 * $valor2;
            return $resultado;
            break;
        case "/":
            if ($valor2 != 0) {
                $resultado = $valor1 / $valor2;
            } else {
                $resultado = "Erro: Divisão por zero!";
            }
            return $resultado;
            break;
        case "!":

            $resultado = fatorial($valor1);
            return $resultado;
            break;
        case "^":
            $resultado = pow($valor1, $valor2);
            return $resultado;
            break;
    }

    $calculo = "$valor1 $operador $valor2 = $resultado";
    registrarCalculoNoHistorico($calculo);
}

function registrarCalculoNoHistorico($calculo) {
    $arquivo = 'historico.txt';
    file_put_contents($arquivo, $calculo . PHP_EOL, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
</head>
<body>
   <div class="titulo">
        <h1>Calculadora PHP</h1>
   </div>

   <div class="Calculadora">
      <form action="" method="POST">
         <label for="valor1">Valor 1:</label>
         <input type="number" id="valor1" name="valor1" required><br><br>
         
         <label for="operador">Operador:</label>
         <select id="operador" name="operador" required>
               <option value="+">+</option>
               <option value="-">-</option>
               <option value="*">*</option>
               <option value="/">/</option>
               <option value="!">!</option>
               <option value="^">^</option>
         </select><br><br>

         <label for="valor2">Valor 2:</label>
         <input type="number" id="valor2" name="valor2"><br><br>

         <input type="submit" value="Calcular">
      </form>

      <?php
         require 'Funcoes.php';

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["valor1"]) && isset($_POST["operador"])) {
               $valor1 = $_POST["valor1"];
               $operador = $_POST["operador"];

               if ($operador == "!") {
                  $resultado = Calculo($valor1, null, $operador);
               } else {
                  if (isset($_POST["valor2"])) {
                     $valor2 = $_POST["valor2"];
                     $resultado = Calculo($valor1, $valor2, $operador);
                  } else {
                     echo "Por favor, preencha todos os campos!";
                     exit();
                  }
               }


               echo "Resultado: $resultado";


               $arquivo = 'historico.txt';
               $calculo = "$valor1 $operador " . ($valor2 ?? '') . " = $resultado";
               file_put_contents($arquivo, $calculo . PHP_EOL, FILE_APPEND);
            } else {
               echo "Por favor, preencha todos os campos!";
            }
         }
      ?>  
   </div>

   <div class="historico">
    <h2>Histórico</h2>
      <ul>
         <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["apagar_historico"])) {
               $arquivo = 'historico.txt';

               if (file_exists($arquivo) && unlink($arquivo)) {
                  echo "Histórico apagado com sucesso!";
               } else {
                  echo "Erro ao apagar o histórico!";
               }
            }

            $arquivo = 'historico.txt';
            if (file_exists($arquivo)) {
               $historico = file($arquivo, FILE_IGNORE_NEW_LINES);
               foreach ($historico as $calculo) {
                  echo "<li>$calculo</li>";
               }
            } else {
               echo "<li>Nenhum cálculo no histórico.</li>";
            }
         ?>
      </ul>
    
   <form action="" method="POST">
      <input type="submit" name="apagar_historico" value="Apagar Histórico">
   </form>
</div>
    
 </body>
 </html>
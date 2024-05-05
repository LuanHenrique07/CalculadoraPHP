<!DOCTYPE html>
 <html lang="pt-br ">
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
         <input type="number" id="valor2" name="valor2" required><br><br>

         <input type="submit" value="Calcular">

      <?php
         require 'Funcoes.php';

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["valor1"]) && isset($_POST["valor2"]) && isset($_POST["operador"])) {
               $valor1 = $_POST["valor1"];
               $valor2 = $_POST["valor2"];
               $operador = $_POST["operador"];

               $resultado = Calculo($valor1, $valor2, $operador);

               echo "Resultado: $resultado";
            } else {
               echo "Por favor, preencha todos os campos!";
            }
         }

      ?>  
    </div>
    
 </body>
 </html>
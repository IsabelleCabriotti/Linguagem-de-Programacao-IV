<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Resposta do Exercício 7</h1>
    <?php
        function calcularDias($dia1,$dia2) {
            $dataInicio = DateTime::createFromFormat('d/m/Y', $dia1);
            $dataFinal = DateTime::createFromFormat('d/m/Y', $dia2);

            $diferenca = $dataInicio->diff($dataFinal);
            return $diferenca->days;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $dia1 = $_POST['dia1'] ?? '';
                $dia2 = $_POST['dia2'] ?? '';
                $diasDiferenca = calcularDias($dia1, $dia2);
                echo "<p>A diferença de dias entre as datas é de $diasDiferenca dias</p>";
            } catch (Exception $e) {
                echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
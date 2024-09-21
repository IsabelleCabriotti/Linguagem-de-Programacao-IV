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
    <h1>Resposta do Exercício 4</h1>
    <?php
    function verificarData(int $dia, int $mes, int $ano)
    {
      if (checkdate($mes, $dia, $ano))
        return true;
      else
        return false;
    }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          try {
              $dia = (int) ($_POST['dia'] ?? 0);
              $mes = (int) ($_POST['mes'] ?? 0);
              $ano = (int) ($_POST['ano'] ?? 0);

              if (verificarData($mes, $dia, $ano)) {
                  echo "<p>A data informada é válida: $dia/$mes/$ano</p>";
              } else {
                echo "<p>A data informada é inválida! Por favor inserir uma data válida.</p>";
              }
            } catch (Exception $e) {
                echo "Erro: ".$e->getMessage();
            }
          }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
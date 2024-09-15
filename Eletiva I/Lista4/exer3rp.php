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
    <h1>Resposta do Exercício 3</h1>
    <?php
        function verificarPalavras(string $palavra1, string $palavra2): bool
        {
            return strpos($palavra1, $palavra2) !== false;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $palavra1 = $_POST["palavra1"] ?? '';
                $palavra2 = $_POST["palavra2"] ?? '';

                if (verificarPalavras($palavra1, $palavra2)) {
                    echo "<p>A 2º palavra: $palavra2, está contida na 1º palavra: $palavra1!</p>";
                } else {
                    echo "<p>A 2º palavra: $palavra2, NÃO está contida na 1º palavra: $palavra1!</p>";
                }
            } catch (Exception $e) {
                echo "Erro: ".$e->getMessage();
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
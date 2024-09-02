<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Resposta do Exercício 5</h1>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $mes = (int) $_POST['mes'] ?? 0;
            $nomeMes = "";

            switch ($mes)
            {
                case 1:
                    $nomeMes = "Janeiro";
                    break;
                case 2:
                    $nomeMes = "Fevereiro";
                    break;
                case 3:
                    $nomeMes = "Março";
                    break;
                case 4:
                    $nomeMes = "Abril";
                    break;
                case 5:
                    $nomeMes = "Maio";
                    break;
                case 6:
                    $nomeMes = "Junho";
                    break;
                case 7:
                    $nomeMes = "Julho";
                    break;
                case 8:
                    $nomeMes = "Agosto";
                    break;
                case 9:
                    $nomeMes = "Setembro";
                    break;
                case 10:
                    $nomeMes = "Outubro";
                    break;
                case 11:
                    $nomeMes = "Novembro";
                    break;
                case 12:
                    $nomeMes = "Dezembro";
                    break;
                default:
                    $nomeMes = "Mês informado não existe!";    
            }
                echo "<p>O mês referente ao número $mes é: $nomeMes</p>";
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
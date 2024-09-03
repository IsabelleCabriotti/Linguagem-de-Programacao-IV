<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<bodyclass="container">
    <div class="row mt-5">
    <h1>Resposta exemplo 1</h1>
    </div>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            try{
                $valor = $_POST['valor'];
                //funções de string
                $qtd_caracteres = strlen($valor);
                echo "<p>Quantidade de caracteres: $qtd_caracteres</p>";
                $maiusculo = strtoupper($valor);
                $minusculo = strtolower($valor);
                echo "<p>Maiusculo: $maiusculo";
                echo "<p>Minusculo: $minusculo";
                //funções de data
                $dia = 30;
                $mes = 2;
                $ano = 2024;
                if (checkdate($mes, $dia, $ano))
                {
                    echo "<p>Data válida</p>";
                }
                else
                {
                    echo "<p>Data inválida</p>";
                }
                //funções numericas
                $menor = min(1, 2, 3, 4, 5);
                echo "<p>Menor valor: $menor</p>";
                $maior = max(1, 2, 3, 4, 5);
                echo "<p>Maior valor: $maior</p>";
                $aleatorio = rand(1, 100);
                echo "<p>Valor aleatorio: $aleatorio</p>";
                $numero = 1567.98;
                $moeda = number_format($numero, 2, ",", ".");
                echo "<p>R$ $moeda</p>";
            } catch (Exception $e)
            {
                echo "Eroo: ".$e->getMessage();
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
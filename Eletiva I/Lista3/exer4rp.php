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
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try
            {
                $valor = (float) $_POST['valor'] ?? 0;

                    if($valor >= 100.00)
                    {
                        $desconto = $valor * 0.15;
                        $novoValor = $valor - $desconto;
                        echo "<p>Valor do produto: R$ " . number_format($valor, 2) . "</p>";
                        echo "<p>Valor do desconto: R$ " . number_format($desconto, 2) . "</p>";
                        echo "<p>Valor do produto com desconto: R$ " . number_format($novoValor, 2) . "</p>";
                    }
                    else
                    {
                        echo "<p>Valor do produto menor que R$100,00: R$ " . number_format($valor, 2) . "</p>";
                    }
            } catch (Exception $e)
            {
                echo "Erro:".$e->getMessage();
            }
        } 
        
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
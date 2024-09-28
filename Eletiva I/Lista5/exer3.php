<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Exercicio 3</h1>
    <form action="" method="POST">
        <?php for($i=0;$i<5; $i++): ?>
            <div class="row mt-3">
                <div class="col"> 
                    <input type="number" class="form-control" name="codigo[]" placeholder="Codigo">
                </div>
                <div class="col">
                    <input type="text" class="form-control" step="0.1" name="nome[]" placeholder="Nome">
                </div>
                <div class="col">
                    <input type="number" class="form-control" step="0.1" name="preco[]" placeholder="Preço">
                </div>
            </div>
        <?php endfor; ?>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                try{
                    $codigo = $_POST["codigo"];
                    $nome = $_POST["nome"];
                    $preco = $_POST["preco"];
                    for ($i=0; $i < count($nome); $i++)
                    {
                        if ($preco[$i] > 100)
                        {
                            $preco[$i] *= 0.9;
                        }
                        $produtos[$codigo[$i]] = [$nome[$i] => $preco[$i]];
                    }

                    ksort($produtos);
                    foreach($produtos as $codigo => $precos)
                    {
                        foreach($precos as $nome => $preco)
                        {
                            echo"<p>Código: $codigo Nome: $nome Preço: $preco</p>";
                        }
                    }
                } catch (Exception $e){
                    echo $e->getMessage();
                }
            }
        ?>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
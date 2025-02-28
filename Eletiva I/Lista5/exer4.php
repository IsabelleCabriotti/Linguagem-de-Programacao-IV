<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Exercicio 4</h1>
    <form action="" method="POST">
        <?php for($i=0;$i<5; $i++): ?>
            <div class="row mt-3">
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
                    $nome = $_POST["nome"];
                    $preco = $_POST["preco"];
                    for ($i=0; $i < 5; $i++)
                    {
                        $preco[$i] *= 1.15;
                        $produtos[$nome[$i]] = $preco[$i];
                    }

                    asort($produtos);
                    foreach($produtos as $nome => $preco)
                    {
                        echo"<p>Nome: $nome Preço: $preco</p>";
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
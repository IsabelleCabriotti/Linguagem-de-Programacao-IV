<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mapas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Mapas</h1>
    <form action="" method="POST"> <!-- Action vazio os dados voltam para a mesma pagina -->
        <div class="row">
            <div class="col">
                <?php for($i=1;$i<=10; $i++): ?> 
                    <input type="text" class="form-control" name="nome[]" placeholder="Valor <?= $i ?>">
                <?php endfor; ?>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try{
                $valores = $_POST['nome'];
                foreach($valores as $chave => $valor)
                    echo"<p>$chave: $valor </p>";
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
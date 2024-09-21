<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Exercicio 2</h1>
    <form action="" method="POST">
        <?php for($i=1;$i<=5; $i++): ?>
            <div class="row mt-3">
                <div class="col"> 
                    <input type="text" class="form-control" name="nome[]" placeholder="<?= $i ?>º Nome">
                </div>
                <div class="col">
                    <input type="number" class="form-control" step="0.1" name="nota1[]" id="nota1" placeholder="1º Nota">
                </div>
                <div class="col">
                    <input type="number" class="form-control" step="0.1" name="nota2[]" id="nota2" placeholder="2º Nota">
                </div>
                <div class="col">
                    <input type="number" class="form-control" step="0.1" name="nota3[]" id="nota3" placeholder="3º Nota">
                </div>
            </div>
                <?php endfor; ?>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try{
                $nome = $_POST['nome'];
                $nota1 = $_POST['nota1'];
                $nota2 = $_POST['nota2'];
                $nota3 = $_POST['nota3'];
                for ($i=0; $i < 5; $i++)
                {
                    $media = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;
                    $medias["$nome[$i]"] = $media;
                }
                arsort($medias);
                foreach($medias as $chave => $nota)
                    echo"<p>Nome: $chave - Média:  $nota</p>";
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
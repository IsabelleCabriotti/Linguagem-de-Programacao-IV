<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Exercício 15</h1>
    <form action="exer15rp.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="peso" class="form-label">Informe o peso (kg): </label>
                <input type="number" class="form-control" step="0.1" name="peso" id="peso">
            </div>
            <div class="col">
                <label for="altura" class="form-label">Informe a altura (metros): </label>
                <input type="number" class="form-control" step="0.01" name="altura" id="altura">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <button type="submit" class="btn btn-primary">Calcular IMC</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
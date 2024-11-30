<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/veiculos.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $ano = intval($_POST['ano']);
            $placa = $_POST['placa'];
            $preco_diaria = ($_POST['preco_diaria']);
            $preco_semanal = ($_POST['preco_semanal']);
            $preco_mensal = ($_POST['preco_mensal']);
            if (empty($marca) || empty($modelo))
            {
                $erro = "Informe os campos obrigatorios!";
            }else{
                if (criarProduto($marca, $modelo, $ano, $placa, $preco_diaria, $preco_semanal, $preco_mensal))
                {
                    header('Location: veiculos.php');
                    exit();
                }else{
                    $erro = "Erro ao inserir o veiculo!";
                }
            }

        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Cadastrar Novo Veiculo</h2>

    <?php if(!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Ano</label>
            <input type="number" name="ano" id="ano" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" name="placa" id="placa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="preco_diaria" class="form-label">Preço Diária</label>
            <input type="number" name="preco_diaria" id="preco_diaria" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="preco_semanal" class="form-label">Preço Semanal</label>
            <input type="number" name="preco_semanal" id="preco_semanal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="preco_mensal" class="form-label">Preço Mensal</label>
            <input type="number" name="preco_mensal" id="preco_mensal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Veiculo</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/veiculos.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $id = intval($_POST['id']);
            if (excluirVeiculos($id))
            {
                header('Location: veiculos.php');
                exit();
            }else{
                $erro = "Erro ao excluir o veiculo!";
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id']))
        {
            $id = intval($_GET['id']);
            $veiculos = buscarVeiculosPorId($id);
            if ($veiculos == null)
            {
                header('Location: veiculos.php');
                exit();
            }
        }else{
            header('Location: veiculos.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Veiculo</h2>
    
    <p>Tem certeza de que deseja excluir o veiculo abaixo?</p>

    <ul>
        <li><strong>Marca: <?= $veiculos['marca']?></strong> </li>
        <li><strong>Modelo: <?= $veiculos['modelo']?></strong> </li>
        <li><strong>Ano: <?= $veiculos['ano']?></strong> </li>
        <li><strong>Placa: <?= $veiculos['placa']?></strong> </li>
        <li><strong>Preço Diária: <?= $veiculos['preco_diaria']?></strong> </li>
        <li><strong>Preço Semanal: <?= $veiculos['preco_semanal']?></strong> </li>
        <li><strong>Preço Mensal: <?= $veiculos['preco_mensal']?></strong> </li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $veiculos['id']?>"/>
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="veiculos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>

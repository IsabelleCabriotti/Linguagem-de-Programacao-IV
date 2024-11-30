<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/contratos.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $id = intval($_POST['id']);
            if (excluirContratos($id))
            {
                header('Location: contratos.php');
                exit();
            }else{
                $erro = "Erro ao excluir o contrato!";
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id']))
        {
            $id = intval($_GET['id']);
            $contratos = buscarContratosPorId($id);
            if ($contratos == null)
            {
                header('Location: contratos.php');
                exit();
            }
        }else{
            header('Location: contratos.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Contrato</h2>

    <p>Tem certeza de que deseja excluir o contrato abaixo?</p>

    <ul>
        <li><strong>Data: <?= $contratos['data']?></strong> </li>
        <li><strong>Tipo Locação: <?= $contratos['observacao']?></strong> </li>
        <li><strong>Valor: <?= $contratos['valor']?></strong> </li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $contratos['id']?>"/>
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="contratos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>

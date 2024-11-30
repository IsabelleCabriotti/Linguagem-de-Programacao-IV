<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/observacao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $id = intval($_POST['id']);
            if (excluirObservacao($id))
            {
                header('Location: observacao.php');
                exit();
            }else{
                $erro = "Erro ao excluir o tipo de locação!";
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id']))
        {
            $id = intval($_GET['id']);
            $observacao = retornaObservacaoPorId($id);
            if ($observacao == null)
            {
                header('Location: observacao.php');
                exit();
            }
        }else{
            header('Location: observacao.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Tipo de Locação</h2>
    
    <p>Tem certeza de que deseja excluir o tipo de locação abaixo?</p>

    <ul>
        <li><strong>Nome: <?= $observacao['nome']?></strong> </li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $observacao['id']?>"/>
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="observacao.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>

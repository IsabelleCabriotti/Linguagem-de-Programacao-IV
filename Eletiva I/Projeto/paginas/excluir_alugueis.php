<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/alugueis.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $id = intval($_POST['id']);
            if (excluirAlugueis($id))
            {
                header('Location: alugueis.php');
                exit();
            }else{
                $erro = "Erro ao excluir o aluguel!";
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id']))
        {
            $id = intval($_GET['id']);
            $alugeis = buscarAlugueisPorId($id);
            if ($alugueis == null)
            {
                header('Location: alugueis.php');
                exit();
            }
        }else{
            header('Location: alugueis.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Aluguel</h2>
    
    <p>Tem certeza de que deseja excluir o aluguel abaixo?</p>

    <ul>
        <li><strong>ID: <?= $alugueis['id']?></strong> </li>
        <li><strong>Data Inicio: <?= $alugueis['data_inicio']?></strong> </li>
        <li><strong>Data Fim: <?= $alugueis['data_fim']?></strong> </li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $alugueis['id']?>"/>
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="alugueis.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
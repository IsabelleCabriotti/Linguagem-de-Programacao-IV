<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/clientes.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $id = intval($_POST['id']);
            if (excluirClientes($id))
            {
                header('Location: clientes.php');
                exit();
            }else{
                $erro = "Erro ao excluir o cliente!";
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id']))
        {
            $id = intval($_GET['id']);
            $clientes = buscarClientesPorId($id);
            if ($clientes == null)
            {
                header('Location: clientes.php');
                exit();
            }
        }else{
            header('Location: clientes.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Cliente</h2>
    
    <p>Tem certeza de que deseja excluir o cliente abaixo?</p>

    <ul>
        <li><strong>ID: <?= $clientes['id']?></strong> </li>
        <li><strong>Nome: <?= $clientes['nome']?></strong> </li>
        <li><strong>CPF: <?= $clientes['cpf']?></strong> </li>
        <li><strong>Telefone: <?= $clientes['telefone']?></strong> </li>
        <li><strong>Email: <?= $clientes['email']?></strong> </li>
        <li><strong>Endereço: <?= $clientes['endereco']?></strong> </li>
        <li><strong>CNH: <?= $clientes['cnh']?></strong> </li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $clientes['id']?>"/>
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="clientes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
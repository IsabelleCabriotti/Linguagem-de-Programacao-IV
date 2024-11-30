
<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/observacao.php';

    $erro = '';
    $sucesso = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $id = intval($POST['id']);
            $nome = ($POST['nome']);

            if (empty($nome))
            {
                $erro = "O campo nome é obrigatório!";
            }else{
                if (!empty($nome)) {
                    if (alterarObservacao($id, $nome)) {
                        $sucesso = "Informações do tipo de locação atualizadas com sucesso!";
                    }else{
                        $erro = "Erro ao atualizar o tipo de locação, verifique as informações!";
                    }
                }
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $observacao = retornaObservacaoPorId($id);
            if ($observacao == null) {
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
    <h2>Editar Tipo de Locação</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger">$erro</p>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <p class="text-sucess">$sucesso</p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <input type="hidden" name="id" value="<?= $observacao['id']?>"/>
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= ($observacao['nome']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Tipo de Locação</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>

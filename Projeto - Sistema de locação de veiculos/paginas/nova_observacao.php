<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/observacao.php';

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $nome = $_POST['nome'];

            if (empty($nome))
            {
                $erro = "O campo nome é obrigatório";
            }else{
                if (criarObservacao($nome))
                {
                    header("Location: observacao.php");
                    exit();
                }else{
                    $erro = "Erro ao criar o tipo de locação!";
                }
            }
        }catch (Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Novo Tipo</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger">$erro</p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Tipo de Locação</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>

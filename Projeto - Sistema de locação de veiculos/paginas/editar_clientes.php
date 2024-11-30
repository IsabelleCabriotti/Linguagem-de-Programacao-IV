<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/clientes.php';

    $erro = '';
    $sucesso = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $id = intval($_POST['id']);
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = ($_POST['telefone']);
            $email = $_POST['email'];
            $endereco = ($_POST['endereco']);
            $cnh = ($_POST['cnh']);

            if (empty($nome) || empty($cpf))
            {
                $erro = "Os campos nome e cpf são obrigatórios!";
            }else{
                if (!empty($nome)) {
                    if (alterarClientes($id, $nome, $cpf, $telefone, $email, $endereco, $cnh)) {
                        $sucesso = "Informações do cliente atualizadas com sucesso!";
                        header('Location: clientes.php');
                        exit();
                    }else{
                        $erro = "Erro ao atualizar o cliente, verifique as informações!";
                    }
                }
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $clientes = buscarClientesPorId($id);
            if ($clientes == null) {
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
    <h2>Editar Cliente</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <p class="text-sucess"><?= $sucesso ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $clientes['id']?>"/>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $clientes['nome']?>" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $clientes['cpf']?>" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="telefone" name="telefone" id="telefone" class="form-control" value="<?= $clientes['telefone']?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $clientes['email']?>" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="number" name="endereco" id="endereco" class="form-control" value="<?= $clientes['endereco']?>" required>
        </div>
        <div class="mb-3">
            <label for="cnh" class="form-label">CNH</label>
            <input type="number" name="cnh" id="cnh" class="form-control" value="<?= $clientes['cnh']?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Cliente</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
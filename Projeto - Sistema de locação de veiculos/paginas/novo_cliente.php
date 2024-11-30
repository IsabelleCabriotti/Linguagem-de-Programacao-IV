<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/clientes.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = ($_POST['telefone']);
            $email = $_POST['email'];
            $endereco = ($_POST['endereco']);
            $cnh = ($_POST['cnh']);
            if (empty($nome) || empty($cpf))
            {
                $erro = "Informe os campos obrigatorios!";
            }else{
                if (criarClientes($nome, $cpf, $telefone, $email, $endereco, $cnh))
                {
                    header('Location: clientes.php');
                    exit();
                }else{
                    $erro = "Erro ao inserir o cliente!";
                }
            }

        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Cadastrar Novo Cliente</h2>

    <?php if(!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="telefone" name="telefone" id="telefone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cnh" class="form-label">CNH</label>
            <input type="number" name="cnh" id="cnh" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
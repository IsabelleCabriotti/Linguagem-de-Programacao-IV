<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/usuarios.php';

    $erro = '';
    $sucesso = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $id = intval($POST['id']);
            $nome = ($POST['nome']);
            $email = ($POST['email']);
            $senha = ($POST['senha']);

            if (empty($nome) || empty($email))
            {
                $erro = "Os campos nome e email são obrigatórios!";
            }else{
                if (!empty($senha)) {
                    if (atualizarUsuarioSenha($id, $nome, $email, $senha)) {
                        $sucesso = "Informações do usuário atualizadas com sucesso!";
                    }else{
                        $erro = "Erro ao atualizar o usuário, verifique as informações!";
                    }
                }else{
                    if (atualizarUsuario($id, $nome, $email)) {
                        $sucesso = "Informações do usuário atualizadas com sucesso!";
                    } else {
                        $erro = "Erro ao atualizar o usuário, verifique as informações!";
                    }
                }
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $usuario = retornaUsuarioPorId($id);
            if ($usuario == null) {
                header('Location: usuarios.php');
                exit();
            }
        }else{
            header('Location: usuarios.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Usuário</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger">$erro</p>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <p class="text-sucess">$sucesso</p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $usuario['id']?>"/>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= ($usuario['nome']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= ($usuario['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Nova Senha (Deixe em branco caso não queira fazer alterações!)</label>
            <input type="password" name="senha" id="senha" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Atualizar dados</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>

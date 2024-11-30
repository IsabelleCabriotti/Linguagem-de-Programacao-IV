<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/clientes.php';

    $clientes = buscarClientes();

?>

<div class="container mt-5">
    <h2>Gerenciamento de Clientes</h2>
    <a href="novo_cliente.php" class="btn btn-success mb-3">Novo Cliente</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>CNH</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($clientes as $cl): ?>
            <tr>
                <td><?= $cl['id'] ?></td>
                <td><?= $cl['nome'] ?></td>
                <td><?= $cl['cpf'] ?></td>
                <td><?= $cl['telefone'] ?></td>
                <td><?= $cl['email'] ?></td>
                <td><?= $cl['endereco'] ?></td>
                <td><?= $cl['cnh'] ?></td>
                <td>
                    <a href="editar_clientes.php?id=<?= $cl['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_clientes.php?id=<?= $cl['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
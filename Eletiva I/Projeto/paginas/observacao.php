<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/observacao.php';

    $observacao = buscarObservacao();

?>

<div class="container mt-5">
    <h2>Gerenciamento de Tipo de Locação</h2>
    <a href="nova.observacao.php" class="btn btn-success mb-3">Novo Tipo</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($observacao as $o): ?>
            <tr>
                <td><?= $o['id'] ?></td>
                <td><?= $o['nome'] ?></td>
                <td>
                    <a href="editar_observacao.php?id=<?= $o['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_observacao.php?id=<?= $o['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/contratos.php';

    $contratos = buscarContratos();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Contratos</h2>
    <a href="novo_contrato.php" class="btn btn-success mb-3">Novo Contrato</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Tipo Locação</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($contratos as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['datas'] ?></td>
                <td><?= $c['observacao_id'] ?></td>
                <td><?= $c['valor'] ?></td>
                <td>
                    <a href="editar_contrato.php?id=<?= $c['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_contrato.php?id=<?= $c['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>

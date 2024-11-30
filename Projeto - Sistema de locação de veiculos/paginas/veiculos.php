<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/veiculos.php';

    $veiculos = buscarVeiculos();

?>

<div class="container mt-5">
    <h2>Gerenciamento de Veiculos</h2>
    <a href="novo_veiculo.php" class="btn btn-success mb-3">Novo Veiculo</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Placa</th>
                <th>Preço Diária</th>
                <th>Preço Semanal</th>
                <th>Preço Mensal</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($veiculos as $v): ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $v['marca'] ?></td>
                <td><?= $v['modelo'] ?></td>
                <td><?= $v['ano'] ?></td>
                <td><?= $v['placa'] ?></td>
                <td><?= $v['preco_diaria'] ?></td>
                <td><?= $v['preco_semanal'] ?></td>
                <td><?= $v['preco_mensal'] ?></td>
                <td>
                    <a href="editar_veiculo.php?id=<?= $v['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_veiculo.php?id=<?= $v['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>

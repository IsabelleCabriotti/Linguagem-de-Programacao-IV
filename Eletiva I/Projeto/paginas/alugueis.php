<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/alugueis.php';

    $alugueis = buscarAlugueis();

?>

<div class="container mt-5">
    <h2>Gerenciamento de Alugueis</h2>
    <a href="novo_aluguel.php" class="btn btn-success mb-3">Novo Aluguel</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data Início</th>
                <th>Data Fim</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($alugueis as $al): ?>
            <tr>
                <td><?= $al['id'] ?></td>
                <td><?= $al['data_inicio'] ?></td>
                <td><?= $al['data_fim'] ?></td>
                <td>
                    <a href="editar_alugueis.php?id=<?= $al['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_alugueis.php?id=<?= $al['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
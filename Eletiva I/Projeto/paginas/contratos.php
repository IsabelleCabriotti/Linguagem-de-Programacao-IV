<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
?>

<div class="container mt-5">
    <h2>Gerenciamento de Contratos</h2>
    <a href="novo_contrato.php" class="btn btn-success mb-3">Novo Contrato</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Quantidade de Veiculos</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo Locação</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>10/10/2024</td>
                <td>Armando</td>
                <td>1</td>
                <td>Jeep</td>
                <td>Compass</td>
                <td>Mensal</td>
                <td>R$2.000,00</td>
                <td>
                    <a href="excluir_compra.php" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>

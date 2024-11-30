<?php
    declare(strict_types=1);
    require_once '../config/bancodedados.php';

    function buscarVeiculos() :array
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM veiculos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function buscarVeiculosPorId(int $id) :?array
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM veiculos WHERE id = ?");
        $stmt->execute([$id]);
        $veiculo = $stmt->fetch(PDO::FETCH_ASSOC);
        return $veiculo ? $veiculo : null;
    }

    function criarVeiculos(string $marca, string $modelo, int $ano, string $placa, float $preco_diaria, float $preco_semanal, float $preco_mensal) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO veiculos (marca, modelo, ano, placa, preco_diaria, preco_semanal, preco_mensal) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$marca, $modelo, $ano, $placa, $preco_diaria, $preco_semanal, $preco_mensal]);
    }

    function alterarVeiculos(int $id, string $marca, string $modelo, int $ano, string $placa, float $preco_diaria, float $preco_semanal, float $preco_mensal) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE veiculos SET marca = ?, modelo = ?, ano = ?, placa = ?, preco_diaria = ?, preco_semanal = ?, preco_mensal = ? WHERE id = ?");
        return $stmt->execute([$marca, $modelo, $ano, $placa, $preco_diaria, $preco_semanal, $preco_mensal, $id]);
    }

    function excluirVeiculos(int $id) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM veiculos WHERE id = ?");
        return $stmt->execute([$id]);
    }
?>
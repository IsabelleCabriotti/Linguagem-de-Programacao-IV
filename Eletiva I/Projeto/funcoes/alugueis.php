<?php
    declare(strict_types=1);
    require_once '../config/bancodedados.php';

    function criarAlugueis(int $cliente_id, int $veiculo_id, int $contrato_id, string $data_inicio, string $data_fim) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO alugueis (id_cliente, id_veiculo, id_contrato, data_inicio, data_fim) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$cliente_id, $veiculo_id, $contrato_id, $data_inicio, $data_fim]);
    }

    function alterarAlugueis(int $id, int $cliente_id, int $veiculo_id, int $contrato_id, string $data_inicio, string $data_fim) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE alugueis SET id_cliente = ?, id_veiculo = ?, id_contrato = ?, data_inicio = ?, data_fim = ? WHERE id = ?");
        return $stmt->execute([$cliente_id, $veiculo_id, $contrato_id, $data_inicio, $data_fim, $id]);
    }

    function excluirAlugueis(int $id) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM alugueis WHERE id = ?");
        return $stmt->execute([$id]);
    }
    function buscarAlugueis() :array
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM alugueis");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function buscarAlugueisPorId(int $id) :?array
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM alugueis WHERE id = ?");
        $stmt->execute([$id]);
        $alugueis = $stmt->fetch(PDO::FETCH_ASSOC);
        return $alugueis ? $alugueis : null;
    }
?>
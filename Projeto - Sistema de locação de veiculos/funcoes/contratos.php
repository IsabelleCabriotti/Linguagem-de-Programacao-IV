<?php
    declare(strict_types=1);
    require_once '../config/bancodedados.php';

    function buscarContratos() :array
    {
        global $pdo;
        $stmt = $pdo->query("SELECT c.*, o.nome AS nome_observacao FROM contratos c INNER JOIN observacao o ON o.id = c.observacao_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function buscarContratosPorId(int $id) :?array
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT c.*, o.nome AS nome_observacao FROM contratos c INNER JOIN observacao o ON o.id = c.observacao_id WHERE c.id = ?");
        $stmt->execute([$id]);
        $veiculo = $stmt->fetch(PDO::FETCH_ASSOC);
        return $veiculo ? $veiculo : null;
    }

    function criarContratos(float $valor, int $observacao_id, string $datas) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO contratos (valor, observacao_id, datas) VALUES (?, ?, ?)");
        return $stmt->execute([$valor, $observacao_id, $datas]);
    }

    function alterarContratos(int $id, float $valor, int $observacao_id) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE contratos SET valor = ?, observacao_id = ? WHERE id = ?");
        return $stmt->execute([$valor, $observacao_id, $id]);
    }

    function excluirContratos(int $id) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM contratos WHERE id = ?");
        return $stmt->execute([$id]);
    }
?>
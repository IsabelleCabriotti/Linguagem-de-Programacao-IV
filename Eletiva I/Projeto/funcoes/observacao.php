<?php
    declare(strict_types=1);
    require_once "../config/bancodedados.php";

    function buscarObservacao() :array
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM observacao");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function criarObservacao(string $nome) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO observacao (nome, observacao_id) VALUES (?, ?)");
        return $stmt->execute([$nome]);
    }

    function alterarObservacao(int $id, string $nome) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE observacao SET nome = ?, observacao_id = ? WHERE id = ?");
        return $stmt->execute([$nome, $id]);
    }

    function excluirObservacao(int $id) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM observacao WHERE id = ?");
        return $stmt->execute([$id]);
    }
    function retornaObservacaoPorId(int $id) :?array
    {
        global $pdo;
        $stament = $pdo->prepare("SELECT * FROM observacao WHERE id = ?");
        $stament->execute([$id]);
        $observacao = $stament->fetch(PDO::FETCH_ASSOC);
        return $observacao ? $observacao : null;
    }
?>
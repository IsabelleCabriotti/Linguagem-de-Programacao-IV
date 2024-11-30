<?php
    declare(strict_types=1);
    require_once '../config/bancodedados.php';

    function buscarClientes() :array
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function buscarClientesPorId(int $id) :?array
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente ? $cliente : null;
    }

    function criarClientes(string $nome, string $cpf, string $telefone, string $email, string $endereco, string $cnh) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, telefone, email, endereco, cnh) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$nome, $cpf, $telefone, $email, $endereco, $cnh]);
    }

    function alterarClientes(int $id, string $nome, string $cpf, string $telefone, string $email, string $endereco, string $cnh) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE clientes SET nome = ?, cpf = ?, telefone = ?, email = ?, endereco = ?, cnh = ? WHERE id = ?");
        return $stmt->execute([$nome, $cpf, $telefone, $email, $endereco, $cnh, $id]);
    }

    function excluirClientes(int $id) :bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
        return $stmt->execute([$id]);
    }
?>
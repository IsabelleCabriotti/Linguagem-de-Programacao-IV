CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nivel ENUM('adm', 'colab') NOT NULL
);

CREATE TABLE observacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    placa VARCHAR(100) UNIQUE NOT NULL,
    preco_diaria DECIMAL(10, 2) NOT NULL,
    preco_semanal DECIMAL(10, 2),
    preco_mensal DECIMAL(10, 2)
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    telefone VARCHAR(12),
    email VARCHAR(100),
    endereco VARCHAR(100),
    cnh VARCHAR(100)
);

CREATE TABLE contratos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    observacao_id INT,
    valor DECIMAL(10, 2) NOT NULL,
    datas DATE NOT NULL,
    FOREIGN KEY (observacao_id) REFERENCES observacao(id)
);

CREATE TABLE alugueis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_veiculo INT NOT NULL,
    id_contrato INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id),
    FOREIGN KEY (id_veiculo) REFERENCES veiculos(id),
    FOREIGN KEY (id_contrato) REFERENCES contratos(id)
);
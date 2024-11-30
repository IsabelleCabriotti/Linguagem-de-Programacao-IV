<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/alugueis.php';
    require_once '../funcoes/clientes.php';
    require_once '../funcoes/veiculos.php';
    require_once '../funcoes/contratos.php';

    $erro = '';
    $sucesso = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $cliente_id = intval($_POST['cliente_id']);
            $veiculo_id = intval($_POST['veiculo_id']);
            $contrato_id = intval($_POST['contrato_id']);
            $id = intval($_POST['id']);
            $data_inicio = $_POST['data_inicio'];
            $data_sim = $_POST['data_fim'];

            if (empty($data_inicio) || empty($data_fim))
            {
                $erro = "Os campos de data são obrigatórios!";
            }else{
                if (!empty($id)) {
                    if (alterarAlugueis($id, $cliente_id, $veiculo_id, $contrato_id, $data_inicio, $data_fim)) {
                        $sucesso = "Informações do aluguel atualizadas com sucesso!";
                    }else{
                        $erro = "Erro ao atualizar o aluguel, verifique as informações!";
                    }
                }
            }
        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }else{
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $alugueis = buscarAlugueisPorId($id);
            if ($alugueis == null) {
                header('Location: alugueis.php');
                exit();
            }
        }else{
            header('Location: alugueis.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Aluguel</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger">$erro</p>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <p class="text-sucess">$sucesso</p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $alugueis['id']?>"/>
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-select" required>
                <?php foreach($clientes as $cl): ?>
                    <option value="<?= $cl['id'] ?>"><?= $cl['nome'] ?><?= $cl['cpf'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="veiculo_id" class="form-label">Veiculo</label>
            <select name="veiculo_id" id="veiculo_id" class="form-select" required>
                <?php foreach($veiculos as $v): ?>
                    <option value="<?= $v['id'] ?>"><?= $v['marca'] ?><?= $v['modelo'] ?><?= $v['placa'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="contrato_id" class="form-label">Contrato</label>
            <select name="contrato_id" id="contrato_id" class="form-select" required>
                <?php foreach($contratos as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['id'] ?><?= $c['valor'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data Inicio</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="<?= $alugueis['data_inicio']?>" required>
        </div>
        <div class="mb-3">
            <label for="data_fim" class="form-label">Data Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" value="<?= $alugueis['data_fim']?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Aluguel</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
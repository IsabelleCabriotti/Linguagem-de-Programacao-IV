<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/contratos.php';
    require_once '../funcoes/observacao.php';

    $observacao = buscarObservacao();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try{
            $observacao = $_POST['observacao_id'];
            $valor = floatval($_POST['valor']);
            $datas = $_POST['datas'];
            if (empty($observacao) || empty($valor) || empty($datas))
            {
                $erro = "Informe todos os campos obrigatorios!";
            }else{
                if (criarContratos($valor, $observacao, $datas))
                {
                    header('Location: contratos.php');
                    exit();
                }else{
                    $erro = "Erro ao inserir o contrato!";
                }
            }

        }catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Novo Contrato</h2>

    <?php if(!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="datas" class="form-label">Data</label>
            <input type="date" name="datas" id="datas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="observacao" class="form-label">Tipo Locação</label>
            <select name="observacao_id" id="nome" class="form-select" required>
                <?php foreach($observacao as $o): ?>
                    <option value="<?= $o['id'] ?>"><?= $o['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" name="valor" id="valor" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Contrato</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>

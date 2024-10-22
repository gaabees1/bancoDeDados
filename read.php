read :  <?php
require 'banco.php';
$id = null;
if (!empty($_GET['codigo'])) {
    $id = $_REQUEST['codigo'];
}
if (null == $id) {
    header("Location: index.php");
    exit(); // Adiciona um exit após o header para garantir que o script pare
} else {
    $pdo = Banco::conectar(); // Corrigido para atribuir o valor a $pdo
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_alunos WHERE codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Informações do Contato</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well">Informações do Contato</h3>
            </div>
            <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <span class="form-control"><?php echo htmlspecialchars($data['nome']); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <span class="form-control"><?php echo htmlspecialchars($data['endereco']); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <span class="form-control"><?php echo htmlspecialchars($data['fone']); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <span class="form-control"><?php echo htmlspecialchars($data['email']); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Idade</label>
                        <div class="controls">
                            <span class="form-control"><?php echo htmlspecialchars($data['idade']); ?></span>
                        </div>
                    </div>
                    <br />
                    <div class="form-actions">
                        <a href="index.php" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
 
 
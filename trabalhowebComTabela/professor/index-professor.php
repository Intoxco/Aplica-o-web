<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/login.php');
    exit();
}

if ($_SESSION['usuario'] === 'Aluno') {
    $mensagem = "Você não tem permissão para acessar esta página.";
    $botao = "Ir para minha área";
    $urlBotao = "aluno.php";
    $acaoBotao = "deslogar";
} else {

$erro = $_SESSION['erro'] ?? '';
$sucesso = $_SESSION['sucesso'] ?? '';

unset($_SESSION['erro']);
unset($_SESSION['sucesso']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor - Trabalho PHP</title>
    <link rel="icon" href="../assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/style_professor.css">
</head>

<body>

<?php include '../includes/navbar.php'; ?>
<div class="form">
<?php if (isset($mensagem)): ?>
        <div class="access-denied">
            <p><?php echo $mensagem; ?></p>
            <button onclick="window.location.href='<?php echo $urlBotao; ?>'"><?php echo $botao; ?></button>
            <button onclick="window.location.href='../login/logout.php'">Logout</button>
        </div>
    <?php else: ?>
        <?php if ($erro): ?>
            <p class="error"><?php echo $erro; ?></p>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <p class="success"><?php echo $sucesso; ?></p>
        <?php endif; ?>

        <?php include 'view-professor.php'; ?>
    <?php endif; ?>
</div>
</body>

</html>
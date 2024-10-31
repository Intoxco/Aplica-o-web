<?php
session_start();
$title = "Informações do Aluno";

$nota1 = isset($_SESSION['nota1']) ? $_SESSION['nota1'] : 0;
$nota2 = isset($_SESSION['nota2']) ? $_SESSION['nota2'] : 0;
$nota3 = isset($_SESSION['nota3']) ? $_SESSION['nota3'] : 0;
$media = ($nota1 + $nota2 + $nota3) / 3;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno - Trabalho PHP</title>
    <link rel="icon" href="../assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/style_aluno.css">
</head>

<body>
<?php include '../includes/navbar.php'; ?>
    <div class="container">
        <header>
            <h1>Informações do Aluno</h1>
        </header>

        <div class="content">
            <h2>Notas Cadastradas</h2>
            <ul class="info-list">
                <li><strong>Nome do Aluno:</strong> <?php echo htmlspecialchars($_SESSION['nomealuno']); ?></li>
                <li><strong>Nota 1:</strong> <?php echo htmlspecialchars($_SESSION['nota1']); ?></li>
                <li><strong>Nota 2:</strong> <?php echo htmlspecialchars($_SESSION['nota2']); ?></li>
                <li><strong>Nota 3:</strong> <?php echo htmlspecialchars($_SESSION['nota3']); ?></li>
                <li><strong>Média:</strong> <?php echo number_format($media, 1, '.', '.'); ?></li>
                
            </ul>
        </div>
    </div>
</body>

</html>
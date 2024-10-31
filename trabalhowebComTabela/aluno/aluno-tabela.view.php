<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno- Trabalho PHP</title>
    <link rel="stylesheet" href="../css/style_aluno_tabela.css">
    <link rel="icon" href="../assets/logo.png" type="image/png">
    </head>
<body>
        <?php include '../includes/navbar.php'; ?>
        <?php echo imprimirTabela($horarios,$tipoTabela)?>
</body>
</html>
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
    <div>
        <form action="controller-selecionar-materia.php" method="POST">
            <fieldset>
                <legend>SELECIONE A MATERIA</legend>
                <select name="alunoMateria" id="select" required>
                <?php carregarMateria($bd);?>
                </select>
                <button type="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
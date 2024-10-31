<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do aluno</title>
    <link rel="stylesheet" href="../css/aluno/style.css">
    </head>
<body>
    <h1>Seja bem vindo <?=$aluno?>!</h1>
    <p></p>
        <?= imprimirTabela($horarios,$tipoTabela)?>
</body>
</html>
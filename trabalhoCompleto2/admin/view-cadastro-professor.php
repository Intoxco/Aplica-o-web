<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Trabalho PHP</title>
    <link rel="stylesheet" href="../css/style_professor.css">
    <style>
        body{
            display:flex;
            flex-direction:column;
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php';?>
        <?php if ($erro): ?>
        <p class="error"><?php echo $erro; ?></p>
        <?php endif; ?>
        <?php if ($sucesso): ?>
        <p style="color:green;"class="success"><?php echo $sucesso; ?></p>
    <?php endif; ?>
    <form method = "POST" action = "controller-cadastro-professor.php" required>
        <fieldset>
            <legend>CADASTRAR PROFESSOR </legend>
            <p>
                <label for="professorLogin">LOGIN</label>
                <input name="professorLogin" type="text" required>
            </p>
            <p>
                <label for="professorSenha">SENHA</label>
                <input name="professorSenha" type="text" required>
            </p>
            <p>
                <label for="professorNome">NOME</label>
                <input name="professorNome" type="text" required>
            </p>
            <p>
                <label for="professorDataNascimento">DATA DE NASCIMENTO</label>
                <input name="professorDataNascimento" type="date"  max="2008-01-01"required>
            </p>
        </fieldset>
        <button type="submit" name="envio" value="true">Enviar</button>
    </form>
</body>
</html>
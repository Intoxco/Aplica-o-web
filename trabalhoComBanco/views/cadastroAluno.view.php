<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Trabalho PHP</title>
    <link rel="stylesheet" href="../css/style_professor.css">
    <link rel="icon" href="../assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/navbar.css">
    <style>
        body{
            display:flex;
            flex-direction:column;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../includes/navbar.php';?>
    <?php if (isset($mensagem)): ?>
        <div class="access-denied">
            <p><?php echo $mensagem; ?></p>
            <button onclick="window.location.href='<?php echo $urlBotao; ?>'"><?php echo $botao; ?></button>
            <button onclick="window.location.href='../login/logout.php'">Logout</button>
        </div>
    <?php elseif (isset($erro) || isset($sucesso)): ?>
        <?php if ($erro): ?>
            <p class="error"><?php echo $erro; ?></p>
        <?php endif; ?>
        <?php if ($sucesso): ?>
            <p style="color:green;"class="success"><?php echo $sucesso; ?></p>
        <?php endif; ?>
    <form method = "POST" action = "/admin/aluno" required>
        <fieldset>
            <legend>CADASTRAR ALUNO </legend>
            <p>
                <label for="alunoLogin">LOGIN</label>
                <input name="alunoLogin" type="text" required>
            </p>
            <p>
                <label for="alunoSenha">SENHA</label>
                <input name="alunoSenha" type="text" required>
            </p>
            <p>
                <label for="alunoNome">NOME</label>
                <input name="alunoNome" type="text" required>
            </p>
            <p>
                <label for="alunoDataNascimento">DATA DE NASCIMENTO</label>
                <input name="alunoDataNascimento" type="date"  max="2018-01-01" required>
            </p>
            <p>
                <label for="alunoResponsavel">NOME RESPONSÁVEL</label>      
                <input name="alunoResponsavel" type="text" required>                
            </p>
                <p>
                <label for="alunoTurma">TURMA</label>
            </p>
            <select name="alunoTurma" id="select" required>
                <?php carregarTurmas($bd);?>
            </select>
        </fieldset>
        <button type="submit" name="envio" value="true">Enviar</button>
    </form>
    
    <?php endif; ?>
</body>
</html>
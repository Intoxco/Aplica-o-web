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
    <?php include '../includes/navbar.php';?>
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
    <form method = "POST" action = "cadastro-aluno.php" required>
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
                <label for="alunoIdade">IDADE</label>
                <input name="alunoIdade" type="number" min="6" max="30" required>
            </p>
            <p>
                <label for="alunoResponsavel">NOME RESPONSÁVEL</label>      
                <input name="alunoResponsavel" type="text" required>                </p>
                <p>
                <label for="alunoTurma">TURMA</label>
            </p>
            <select name="alunoTurma" id="select" required>
                <option selected disabled data-default></option>
                <option disabled data-default>ENSINO FUNDAMENTAL</option>
                <option value="1F">1° Ano</option>
                <option value="2F">2° Ano</option>
                <option value="3F">3° Ano</option>
                <option value="4F">4° Ano</option>
                <option value="5F">5° Ano</option>
                <option value="6F">6° Ano</option>
                <option value="7F">7° Ano</option>
                <option value="8F">8° Ano</option>                        
                <option value="9F">9° Ano</option>
                <option disabled data-default>ENSINO MÉDIO</option>
                <option value="1M">1° Ano </option>
                <option value="2M">2° Ano </option>
                <option value="3M">3° Ano </option>
            </select>
        </fieldset>
        <button type="submit" name="envio" value="true">Enviar</button>
    </form>
    <?php endif; ?>
</body>
</html>
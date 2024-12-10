<?php 
$error = $_SESSION['error'] ?? false;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/style_login.css">
    <title>Login - Trabalho PHP</title>
</head>
<body>
    <div class="left">
    <div class="form">
    <?php if (!empty($error)): ?>
    <p style="color: red;"><?php echo('Usuario ou senha invalidos'); ?></p>
    <?php endif; ?>
        <form id="loginForm" method="POST" action="controller-login.php">
            <fieldset><span>LOGIN</span>
                    <input name="usuario" type="text" placeholder="Usuário">
                    <input name="senha" type="password" placeholder="Senha" >
                <button type="submit" id="loginButton">Entrar</button>
            </fieldset>
        </form>
    </div>
    </div>
    <div class="right">
        <img src="../assets/loginBg.jpg" alt="Imagem de fundo">
    </div>
</body>
</html>
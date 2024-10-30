<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <script src="script_login.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="form">
        <form id="loginForm" method="POST" action="login.php">
        <?php if ($error): ?>
         <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
            <fieldset><span>Login</span>
                    <input name="usuario" type="text" placeholder="Usuário">
                    <input name="senha" type="password" placeholder="Senha" >
                <button type="submit" id="loginButton">Entrar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>

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
    <div>
        <form action="controller-professor.php" method="POST">
            <fieldset>
                <legend>CADASTRAR NOTA DO ALUNO</legend>
                <p>
                    <label>NOME DO ALUNO:</label>
                    <input type="text" name="nomealuno" required>
                </p>
                <p>
                    <label>NOTA 1:</label>
                    <input type="text" name="nota1" required>
                </p>
                <p>
                    <label>NOTA 2:</label>
                    <input type="text" name="nota2" required>
                </p>
                <p>
                    <label>NOTA 3:</label>
                    <input type="text" name="nota3" required>
                </p>
                <button type="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>

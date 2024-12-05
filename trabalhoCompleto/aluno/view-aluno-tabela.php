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
    <?php include '../includes/navbar.php';
    if (isset($mensagem)): ?>
        <div id="erro">
            <h1><?=$mensagem?></h1>
        </div>
        <?php else: 
            if($tipoTabela == "input"):?>
    <form method='POST' action='controller-aluno-tabela.php'>
            <div id='tabela'>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Segunda-Feira</th>
                            <th>Terça-feira</th>
                            <th>Quarta-feira</th>
                            <th>Quinta-feira</th>
                            <th>Sexta-feira</th>
                            <th>Sábado</th>
                    </thead>
                    <?= imprimirPeriodoInput($tabela,$horarios,"manhã",0,0);?>
                    <?= imprimirPeriodoInput($tabela,$horarios,"tarde",0,7);?>
                    <?= imprimirPeriodoInput($tabela,$horarios,"noite",0,14);?>
                </table>
            </div>
            <div id='botao'>
                <button type="submit" name="tipoTabela" value="dado">Enviar horários</button>
            </div>
        </form>
    <?php else:?>
        <div id='tabela'>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Segunda-Feira</th>
                    <th>Terça-feira</th>
                    <th>Quarta-feira</th>
                    <th>Quinta-feira</th>
                    <th>Sexta-feira</th>
                    <th>Sábado</th>
                </tr>
            </thead>
            <tbody>
                <?php if($_POST["tipoTabela"] == "dado"){
                    salvarDados($i,$j); }?>
                <?=imprimirPeriodo($tabela,$horarios,"manhã",0,0);?>
                <?=imprimirPeriodo($tabela,$horarios,"tarde",0,7);?>
                <?=imprimirPeriodo($tabela,$horarios,"noite",0,14);?>
            </tbody>
        </table>
    </div>
    <form action="controller-aluno-tabela.php" method="POST">
        <div id="botao">
            <button type="submit" name="tipoTabela" value="input">Editar horários</button>
        </div>
    </form>
    <?php endif;
        endif; ?>
</body>
</html>
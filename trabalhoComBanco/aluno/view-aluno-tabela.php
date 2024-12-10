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
    <?php endif;?>
    <div id="tabela">
    <?php ?>
        <table>
                <caption>Horários da Turma</caption>
                <thead>
                    <tr>
                        <th>Horário</th>
                        <th>Segunda-Feira</th>
                        <th>Terca-Feira</th>
                        <th>Quarta-Feira</th>
                        <th>Quinta-Feira</th>
                        <th>Sexta-Feira</th>
                        <th>Sabado</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
                foreach($horarios as $horario):?>
                <tr>
                    <td><?=$horario?></td>
                    <?php foreach($dias as $dia):?>
                    <td><?php carregarAula($bd,$horario,$dia,buscarTurma($bd,$_SESSION["idUsuario"]))?></td>
                <?php endforeach;?>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>
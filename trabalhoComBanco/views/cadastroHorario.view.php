<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Trabalho PHP</title>
    <link rel="stylesheet" href="../css/style_horario.css">
    <link rel="icon" href="../assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <?php include __DIR__ . '/../includes/navbar.php'; ?>

        <?php if (isset($mensagem)): ?>
            <div class="access-denied">
                <p><?php echo $mensagem; ?></p>
                <button onclick="window.location.href='<?php echo $urlBotao; ?>'"><?php echo $botao; ?></button>
                <button onclick="window.location.href='../login/logout.php'">Logout</button>
        </div>
        <?php endif;?>
        <?php if (!isset($_POST['enviado']) || $_POST['enviado'] != true): ?>
    <form method="post" action="">
        <label for="turma">Selecione uma turma</label> 
        <select name="turma" required>
            <option selected disabled data-default></option>
            <?php carregarTurmas($bd); ?>
        </select>
        <button type="submit" name="enviado" value="true">Enviar</button>
    </form>
    <?php else:?>
        
        <form method="POST" action="/admin/horario">
            <label for="professor">Selecione um professor</label>
            <select name="professor">
                <option selected disabled data-default></option>
                <?php carregarProfessores($bd);?>
            </select>
            <label for="materia">Selecione uma matéria</label>
            <select name="materia">
                <option selected disabled data-default></option>
                <?php carregarMaterias($bd);;?>
            </select>
            <label for="dia">Selecione um dia</label>
            <select name="dia">
                <option selected disabled data-default></option>
                <option>Segunda-Feira</option>
                <option>Terca-Feira</option>
                <option>Quarta-Feira</option>
                <option>Quinta-Feira</option>
                <option>Sexta-Feira</option>
                <option>Sabado</option>
            </select>
            <label for="horario">Selecione um horario</label>
            <select name="horario">
                <option selected disabled data-default></option>
                <?php carregarHorarios($bd,$_POST["turma"]);?>
            </select>
            <button type="submit" name="enviar" value="true">Enviar</button>
            
        </form>
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
                $horarios = buscarHorarios($bd,$_POST["turma"]); 
                $dias = ["Segunda-Feira","Terca-Feira","Quarta-Feira","Quinta-Feira","Sexta-Feira","Sabado"];
                foreach($horarios as $horario):?>
                <tr>
                    <td><?=$horario?></td>
                    <?php foreach($dias as $dia):?>
                    <td><?php carregarAula($bd,$horario,$dia,$_POST["turma"])?></td>
                <?php endforeach;?>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php endif;?>
</body>
</html>
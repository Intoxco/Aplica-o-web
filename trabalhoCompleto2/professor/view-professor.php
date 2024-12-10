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
    <?php include '../includes/navbar.php'; ?>
    
    <div>
    <form method="POST" action="controller-professor.php">
        <fieldset>
            <legend>SELECIONE A MATERIA</legend>
            <p>
                <select name="alunoMateria" id="materiaSelect" required>
                    <?php carregarMateria($bd); ?>
                </select>
            </p>

            <legend>SELECIONE A TURMA</legend>
        <p>
            <select name="alunoTurma" id="turmaSelect" required onchange="this.form.submit()">
            <option value="">Selecione uma turma</option>
                <?php
                    $turmas = buscarTurmas($bd);
                    foreach ($turmas as $id => $turma) {
                    $selected = (isset($_POST['alunoTurma']) && $_POST['alunoTurma'] == $id) ? "selected" : "";
                    echo "<option value='$id' $selected>" . $turma["ano"] . "</option>";
                    }   
                ?>
            </select>
        </p>

            
        <legend>SELECIONE O ALUNO</legend>
            <p>
                <select name="aluno" id="alunoSelect" required>
                    <option value="">Selecione um aluno</option>
                    <?php
                        if (!empty($alunos)) {
                            foreach ($alunos as $id => $aluno) {
                                echo "<option value='" . $aluno["idUsuario"] . "'>" . $aluno["nome"] . "</option>";
                            }
                         } else {
                            echo "<option value='' disabled>Nenhum aluno disponível</option>";
                        }
                    ?>
                </select>
            </p>

            <legend>INSIRA A NOTA</legend>
            <p>
                <input type="number" name="nota" id="nota" step="0.01" min="0" max="10" required>
            </p>
        </fieldset>
        <button type="submit" name="envio" value="true">Enviar</button>
    </form>
    </div>
</body>
</html>
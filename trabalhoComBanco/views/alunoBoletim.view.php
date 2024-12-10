<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno - Trabalho PHP</title>
    <link rel="stylesheet" href="../css/style_aluno.css">
    <link rel="icon" href="../assets/logo.png" type="image/png">
</head>
<body>
    <?php include __DIR__ . '/../includes/navbar.php' ?>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Matérias</td>
                    <?php 
                        foreach ($materias as $materia): ?>
                            <td><?= htmlspecialchars($materia['nome']); ?></td>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Notas</td>
                    <?php 
                        foreach ($materias as $materia): ?>
                            <td>
                                <?php 
                                    if (isset($notas[$materia['idMateria']])) {
                                        echo htmlspecialchars($notas[$materia['idMateria']]);
                                    } else {
                                        echo 'N/A'; 
                                    }
                                ?>
                            </td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
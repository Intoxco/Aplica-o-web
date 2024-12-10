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
    <?php include '../includes/navbar.php'; ?>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Matérias</td>
                    <?php 
                        // Exibe dinamicamente as matérias
                        foreach ($materias as $materia): ?>
                            <td><?= htmlspecialchars($materia['nome']); ?></td>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Notas</td>
                    <?php 
                        // Exibe as notas para cada matéria
                        foreach ($materias as $materia): ?>
                            <td>
                                <?php 
                                    // Verifica se a nota para essa matéria existe
                                    if (isset($notas[$materia['idMateria']])) {
                                        echo htmlspecialchars($notas[$materia['idMateria']]);
                                    } else {
                                        echo 'N/A'; // Caso não tenha nota registrada
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
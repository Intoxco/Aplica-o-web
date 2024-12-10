<?php session_start(); ?>
<link rel="stylesheet" href="../css/navbar.css">
<nav>
    <ul>
        <?php if (isset($_SESSION['usuario'])): ?>
            <?php if ($_SESSION["funcao"] == "aluno"): ?>
                <li><a href="../aluno/view-aluno.php" class="my-area-button">Minha Área</a></li>
                <li><a href="../aluno/controller-aluno-tabela.php">Horário das aulas</a></li>
            <?php elseif ($_SESSION["funcao"] == "professor"): ?>
                <li><a href="../professor/index-professor.php" class="my-area-button">Minha Área</a></li>
            <?php elseif($_SESSION['usuario'] === 'admin'): ?>
                <li><a href="../admin/controller-cadastro-aluno.php">Cadastrar Aluno</a></li>
                <li><a href="../admin/controller-cadastro-professor.php">Cadastrar Professor</a></li>
                <li><a href="../admin/controller-cadastro-horario.php">Cadastrar Horários de Turma</a></li>
            <?php endif; ?>
            <li><a href="../login/logout.php" class="logout-button">Logout</a></li>
        <?php else: ?>
            <li><a href="../login/controller-login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

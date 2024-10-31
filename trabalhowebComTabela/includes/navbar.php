<?php session_start(); ?>
<link rel="stylesheet" href="../css/navbar.css">
<nav>
    <ul>
        <?php if (isset($_SESSION['usuario'])): ?>
            <?php if ($_SESSION['usuario'] === 'Aluno'): ?>
                <li><a href="../aluno/aluno.php" class="my-area-button">Minha Área</a></li>
                <li><a href="../aluno/aluno-tabela.php">Horário das aulas</a></li>
            <?php elseif ($_SESSION['usuario'] === 'Professor'): ?>
                <li><a href="../professor/index-professor.php" class="my-area-button">Minha Área</a></li>
            <?php endif; ?>
            <li><a href="../login/logout.php" class="logout-button">Logout</a></li>
        <?php else: ?>
            <li><a href="../login/login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

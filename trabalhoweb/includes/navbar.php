
<link rel="stylesheet" href="../css/navbar.css">
<nav>
    <ul>
        <?php if (isset($_SESSION['usuario'])): ?>
            <?php if ($_SESSION['usuario'] === 'Aluno'): ?>
                <li><a href="aluno.php" class="my-area-button">Minha Área</a></li>
            <?php elseif ($_SESSION['usuario'] === 'Professor'): ?>
                <li><a href="index-professor.php" class="my-area-button">Minha Área</a></li>
            <?php endif; ?>
            <li><a href="logout.php" class="logout-button">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

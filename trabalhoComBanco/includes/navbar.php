<link rel="stylesheet" href="../css/navbar.css">
<nav>
    <ul>
        <?php if (isset($_SESSION['usuario'])): ?>
            <?php if ($_SESSION["funcao"] == "aluno"): ?>
                <li><a href="/aluno/boletim" class="my-area-button">Minha Área</a></li>
            <?php elseif ($_SESSION["funcao"] == "professor"): ?>
                <li><a href="/professor" class="my-area-button">Minha Área</a></li>
            <?php elseif($_SESSION['funcao'] === 'admin'): ?>
                <li><a href="/admin/aluno">Cadastrar Aluno</a></li>
                <li><a href="/admin/professor">Cadastrar Professor</a></li>
            <?php endif; ?>
            <li><a href="../login/logout.php" class="logout-button">Logout</a></li>
        <?php else: ?>
            <li><a href="/">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>

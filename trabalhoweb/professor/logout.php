<?php
session_start();
session_unset();
session_destroy();
session_start();

$_SESSION['message'] = 'Você foi desconectado com sucesso.';

header("Location: ../login/login.php");
exit();
?>

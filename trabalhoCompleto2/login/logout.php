<?php
session_start();

$_SESSION["usuario"] = "";
$_SESSION["logado"] = false;

$_SESSION['message'] = 'Você foi desconectado com sucesso.';

header("Location: view-login.php");
exit();
?>

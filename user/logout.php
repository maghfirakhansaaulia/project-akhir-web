<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('idusr', '', time() - 3600, '/');
setcookie('roleusr', '', time() - 3600, '/');
setcookie('emailusr', '', time() - 3600, '/');

header("Location: ../login.php");
exit;
?>
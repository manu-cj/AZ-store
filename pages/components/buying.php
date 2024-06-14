<?php
session_start();
$_SESSION['Payment'] = $_POST['buy'];
$_SESSION['activeCart'] = false;
?>

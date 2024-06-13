<?php
session_start();
$referer = $_SERVER['HTTP_REFERER'] ?? 'index.php';


    $_SESSION['activeCart'] = false;
    echo $_SESSION['activeCart'];
    header('Location: ' . $referer);

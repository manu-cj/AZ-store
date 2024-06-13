<?php

// Commencer le tampon de sortie
ob_start();

// Récupérer le référent ou définir 'index.php' par défaut si non disponible
$referer = $_SERVER['HTTP_REFERER'] ?? 'index.php';

// Vérifier si le paramètre 'cart' est défini dans l'URL
$cartValue = trim($_GET['cart'] ?? '');

// Debug: afficher la valeur de cart pour vérifier
error_log("cart value: " . $cartValue);

// Mettre à jour la session en fonction de la valeur du paramètre 'cart'
if ($cartValue === 'on') {
    $_SESSION['activeCart'] = true;
    error_log("Cart is set to on");
} elseif ($cartValue === 'of') {
    $_SESSION['activeCart'] = false;
    error_log("Cart is set to of");
} else {
    error_log("Cart value is not recognized");
}

// Rediriger vers la page précédente
echo '<script>window.location.replace("'.$referer.'");</script>';
// header('Location: ' . $referer);
exit();

// Terminer le tampon de sortie et envoyer la sortie (au cas où il y aurait eu des erreurs de sortie)
ob_end_flush();
?>



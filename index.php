<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0e39d36e41.js" crossorigin="anonymous"></script>
  <script defer type="module" src="assets/js/app.js"></script>
  <title>AZ_Store</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
    <a class="navbar-brand spacer custom-text-color" href="?c=home">AZ[store]</a>
      <div id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="?c=home">Home</a>
          <a class="nav-link" href="?c=products">Products</a>
          <a class="nav-link" href="?c=contact">Contact</a>
          <?php
        session_start();
    include("pages/components/notification.php");
        if (!isset($_SESSION['activeCart'])) {
          $_SESSION['activeCart'] = false;
         }else {
          if ($_SESSION['activeCart'] === true) {
            include("pages/cart.php");
          }
         }
        if ($_SESSION['activeCart'] === false) {
        ?>
        <a class="cart-icon" href="?c=activeCart&cart=on"><i class="fa-solid fa-cart-shopping"></i></a>
        <?php } ?>
        <?php
        if ($_SESSION['activeCart'] === true) {
        ?>
        <a class="cart-icon" href="?c=activeCart&cart=of"><i class="fa-solid fa-cart-shopping"></i></a>
        <?php } ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        </div>
      </div>
    </div>
  </nav>
  <?php

    $c = $_GET['c'];
    $a = $_GET['a'] ?? null;
   




  ?>
 
    <?php
    
  

    function getPath($page)
    {
      require __DIR__ . "/" . $page . ".php";
    }

    if (!isset($c)) {
      header("LOCATION: ?c=home");
    }
    switch ($c) {
      case 'home':
        getPath('pages/home');
        break;
      case 'cart':
        getPath('pages/cart');
        break;
      case 'products':
        getPath('pages/products');
        break;
      case 'add-to-cart':
        getPath('controller/addToCart');
        break;
      case 'activeCart':
        getPath('controller/cartController');
        break;
      case 'not-display-cart':
        getPath('controller/notDisplayCartController');
        break;

      case 'shipping-address':
        getPath('pages/shippingAddress');
        break;

        // pour ajouter une page rajouter un case en suivant les exemples précèdents
      default:
        getPath('pages/404');
        break;
    }

    ?>
  </main>
  <i class="fas fa-toggle-on fa-flip-vertical toggleTheme"></i>
  <footer class="down">
  
        <a href="?c=home">Home</a>
        <a href="?c=products">Products</a>
        <a href="?c=contact">Contact</a>
        
</footer>

</body>

</html>

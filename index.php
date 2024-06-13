<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="main.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0e39d36e41.js" crossorigin="anonymous"></script>
  <title>AZ_Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="main.css"rel="stylesheet">
    <link href="assets/css/style.css"rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>AZ_Store</title>
</head>

<body>
<article id="main-wrapper">
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid justify-content-between">
    <a class="navbar-brand spacer custom-text-color" href="#">AZ[store]</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="?c=products">Product</a>
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        <a class="nav-link cart" href="?c=cart"><i class="fa-solid fa-cart-shopping"></i></a>
        <a class="nav-link disabled " aria-disabled="true">Login</a>
      </div>
    </div>
  </div>
</nav>
</article>
  <main class="container">
  <div class="shoe">
        <p>
          SHOE THE
        </p>
        <p>RIGHT <span class="one">ONE</span>.
        </p>
        <a href="?c=products"><button class="btn btn-primary btn-sm">See our store</button></a>
      </div>
      <div class="nike">
        <img class="shoe1" src="shoe_one.png">
        NIKE
      </div>
    </main>

    <div class="OurProduct">
      <span class="our">Our</span>
      last product
      
    </div>
    <?php
    session_start();
    $c = $_GET['c'];
    $a = $_GET['a'] ?? null;

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

      case 'shipping-address':
        getPath('pages/shippingAddress');
        break;
        // pour ajouter une page rajouter un case en suivant les exemples précèdents
      default:
        getPath('pages/404');
        break;
    }

    ?>
  
</body>

</html>
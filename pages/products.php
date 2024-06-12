<?php
$productsJson = file_get_contents('real_products.json');
$products = json_decode($productsJson, true);


if (isset($_GET['product']) && isset($_GET['price']) && isset($_GET['image_url']) && isset($_GET['id'])) {
  $id = $_GET['id'];
  $product = $_GET['product'];
  $price = $_GET['price'];
  $imgProduct = $_GET['image_url'];

  $cartProduct = [$id, $product, $price, $imgProduct];

  // Initialiser le tableau des produits s'il n'existe pas
  if (!isset($_SESSION['product-datas'])) {
      $_SESSION['product-datas'] = [];
  }

  // Ajouter le nouveau produit
  $_SESSION['product-datas'][] = [$id, $product, $price, $imgProduct];
}

// Récupérer les produits de la session
if (isset($_SESSION['product-datas'])) {
  $prod = $_SESSION['product-datas'];

  // Afficher les produits
  foreach ($prod as $product) {
    foreach ($product as $key => $value) {
      echo "$value";
    }
  }
}

?>
<section class="articles-container">
<?php
foreach ($products as $key => $value) {
  echo '
     <div class="card" style="width: 20rem;">
    <img src="'.$value['image_url'].'" class="card-img-top" alt="'.$value['product'].'">
    <div class="card-body">
      <h5 class="card-title">'.$value['product'].'</h5>
        <p class="card-text">'.$value['price'].' €</p>
      <a href="?c=products&product='.$value['product'].'&price='.$value['price'].'&image_url='.$value['image_url'].'&id='.$value['id'].'" class="btn btn-primary">Add to cart</a>
    </div>
  </div>
    ';
}
?>
</section>
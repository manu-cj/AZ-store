<?php

$productsJson = file_get_contents('real_products.json');
$products = json_decode($productsJson, true);

//    Afficher les produits
// if (isset($_SESSION['product-datas'])) {
//   $prod = $_SESSION['product-datas'];
//   echo '
//   <pre>
//   '.print_r($prod).'
//   </pre>';

//   foreach ($prod as $product) {
 
//     foreach ($product as $key => $value) {
//       echo "$value";
//     }
//   }
// }

?>
<container class="articles-container">
<?php
foreach ($products as $key => $value) {
  echo '
  <form action="?c=add-to-cart" method="post">
     <div class="card" style="width: 20rem;">
      <img src="' . $value['image_url'] . '" class="card-img-top" alt="' . $value['product'] . '">
      <div class="card-body">
        <h5 class="card-title">' . $value['product'] . '</h5>
          <p class="card-text">' . $value['price'] . ' €</p>
          <input type="hidden" name="article-id" value="'.$value['id'].'">
        <input type="submit" class="btn btn-primary" name="add-to-cart" value="Add to Cart">
      </div>
  </div>
  </form>
    ';
}
?>
</container>
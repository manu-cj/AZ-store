<?php

$productsJson = file_get_contents('real_products.json');
$products = json_decode($productsJson, true);

if (isset($_POST['add-to-cart'])) {
  var_dump('coucou');
  $id = strip_tags($_POST['article-id']);

  $productId = $products[$id - 1]['id'];
  $product = $products[$id - 1]['product'];
  $price = $products[$id - 1]['price'];

  $cartProduct = array('id' => $id, 'name' => $product, 'price' => $price, 'quantity' => 1);

  if (!isset($_SESSION['product-data'])) {
    $_SESSION['product-data'] = [];
  }

  $_SESSION['product-data'][] = $cartProduct;

  header("LOCATION: ?c=cart");
}

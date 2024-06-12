<?php

$productsJson = file_get_contents('real_products.json');
$products = json_decode($productsJson, true);

if (isset($_POST['add-to-cart'])) {
    $id = strip_tags($_POST['article-id']);

    $productId = $products[$id-1]['id'];
    $product = $products[$id-1]['product'];
    $price = $products[$id-1]['price'];
    $imageUrl = $products[$id-1]['image_url'];
   

      
        $cartProduct = array($id, $product, $price, $imgProduct);
      
        if (!isset($_SESSION['product-datas'])) {
          $_SESSION['product-datas'] = [];
        }

        $_SESSION['product-datas'][] = $cartProduct;
      

      header("LOCATION: ?c=products");
}
?>
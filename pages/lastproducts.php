<?php


$productsJson = file_get_contents('real_products.json');
$lastproducts = json_decode($productsJson, true);

for ($i=0; $i < 4; $i++) { 
    ?>
      <form action="?c=add-to-cart&#<?php echo $lastproducts[$i]["product"]; ?>" method="post">
    <div class="card" style="width: 20rem;">
    <img class="imgcard" src="<?php echo $lastproducts[$i]["image_url"]; ?>" alt="<?php echo $lastproducts[$i]["product"]; ?>" style="height:350px;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $lastproducts[$i]["product"]; ?></h5>
      <p class="card-text"><?php echo $lastproducts[$i]["price"]; ?>€</p>
      <input type="hidden" name="article-id" value="<?php echo $lastproducts[$i]["id"]; ?>">
      <input type="submit" class="btn btn-primary" name="add-to-cart" value="Add to Cart">
    </div>
  </div>
  </form>
      <?php
}
?>

<?php


$productsJson = file_get_contents('real_products.json');
$lastproducts = json_decode($productsJson, true);

for ($i=0; $i < 4; $i++) { 
    ?>
    <div class="card" style="width: 20rem;">
    <img  src="<?php echo $lastproducts[$i]["image_url"]; ?>" alt="<?php echo $lastproducts[$i]["product"]; ?>" style="height:350px;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $lastproducts[$i]["product"]; ?></h5>
      <p class="card-text"><?php echo $lastproducts[$i]["price"]; ?>€</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
      <?php
}
?>

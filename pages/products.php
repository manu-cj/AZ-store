<?php
$productsJson = file_get_contents('real_products.json');
$products = json_decode($productsJson, true);

foreach ($products as $key => $value) {
  echo '
     <div class="card" style="width: 18rem;">
    <img src="'.$value['image_url'].'" class="card-img-top" alt="'.$value['product'].'">
    <div class="card-body">
      <h5 class="card-title">'.$value['product'].'</h5>
      <a href="" class="btn btn-primary">Add to cart</a>
    </div>
  </div>
    ';
}
?>
<section class="articles-container">

  <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</section>
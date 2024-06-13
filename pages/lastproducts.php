<?php
$lastproducts = [
  
    [
        "id"=> 17,
        "product"=> "Salomon Speedcross 5",
        "price"=> 130,
        "image_url"=> "./assets/images/shoe_one.png"
    ],
    [
        "id"=> 18,
        "product"=> "Merrell Moab 2 Ventilator",
        "price"=> 100,
        "image_url"=> "./assets/images/shoe_one.png"
    ],
    [
        "id"=> 19,
        "product"=> "On Cloud X",
        "price"=> 140,
        "image_url"=> "./assets/images/shoe_one.png"
    ],
    [
        "id"=> 20,
        "product"=> "Topo Athletic Fli-Lyte 3",
        "price"=> 120,
        "image_url"=> "./assets/images/shoe_one.png"
    ]
];

foreach ($lastproducts as $item) {
    ?>
  <div class="card lastproducts" style="width: 18rem;">
  <img  src="<?php echo $item["image_url"]; ?>" alt="">
  <div class="card-body products">
    <h5 class="card-title"><?php echo $item["product"]; ?></h5>
    <p class="card-text"><?php echo $item["price"]; ?>€</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    <?php
}
?>

<?php
$articles = [
    [
     "id"=> 1,
    "product" => "Nike Air Max 270",
    "price"=> 140,
    "image_url"=> "./assets/images/shoe_one.png"
    ],
    [
        "id"=> 2,
        "product"=> "Adidas Ultraboost 21",
        "price"=> 180,
        "image_url"=> "./assets/images/shoe_one.png"
    ],
      [
        "id"=> 3,
        "product"=> "Puma RS-X3",
        "price"=> 110,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 4,
        "product"=> "New Balance 990v5",
        "price"=> 175,
        "image_url" => "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 5,
        "product"=> "Reebok Club C 85",
        "price"=> 85,
        "image_url" => "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 6,
        "product"=> "Converse Chuck Taylor",
        "price"=> 55,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 7,
        "product"=> "Vans Old Skool",
        "price"=> 60,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 8,
        "product"=> "Asics Gel-Kayano 27",
        "price"=> 160,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 9,
        "product"=> "Under Armour HOVR Phantom",
        "price"=> 140,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 10,
        "product"=> "Jordan Air Jordan 1",
        "price"=> 170,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 11,
        "product"=> "Brooks Ghost 13",
        "price"=> 130,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 12,
        "product"=> "Saucony Endorphin Speed",
        "price"=> 160,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 13,
        "product"=> "Hoka One One Clifton 7",
        "price"=> 130,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 14,
        "product"=> "Mizuno Wave Rider 24",
        "price"=> 125,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 15,
        "product"=> "Skechers GOrun Razor 3",
        "price"=> 120,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
      [
        "id"=> 16,
        "product"=> "Altra Torin 4.5 Plush",
        "price"=> 140,
        "image_url"=> "./assets/images/shoe_one.png"
      ],
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

// Obtenir les 5 derniers produits
$lastFiveProducts = array_slice($articles, -5);

foreach ($articles as $item) {
?>
    <div>
        <div>
            <img src="<?php echo $item["image_url"]; ?>" alt="">
        </div>
        <div>
            <div>
                <div><?php echo $item["product"]; ?></div>
                <div><?php echo $item["price"]; ?>€</div>
            </div>
            <form method="post" action="cart.php">
                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                <input type="hidden" name="quantity" min="1" value="1">
              
                    <input type="submit" name="add_to_cart" value="Add to Cart">
             
            </form>
        </div>
    </div>
<?php };

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['add_to_cart']) && isset($_POST['item_id']) && array_key_exists($_POST['item_id'], $articles)) {
    $item_id = $_POST['item_id'];
    $item = $articles[$item_id];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!isset($_SESSION['cart'][$item_id])) {
        // If the item isn't in the cart, add it with the specified quantity
        $_SESSION['cart'][$item_id] = array("quantity" => $quantity, "price" => $item["price"], "name" => $item["name"]);
    } else {
        // If the item is already in the cart, update the quantity
        $_SESSION['cart'][$item_id]["quantity"] += $quantity;
    }
}

?>
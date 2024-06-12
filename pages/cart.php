<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <title>Shopping Cart</title>
</head>
<body>

<header >
<nav>
 
    <a href="../index.php">AZ[store]</a>


        <a href="../index.php">Home</a>
        <a href="#">Features</a>
        <a href="./pages/cart.php">cart</a>
        <a>Disabled</a>
            <img src="../assets/images/shopping-cart.svg" alt="Cart"><a href="./cart.php" alt="shopping cart"><span>Login</span></a>
    
    </header>

    <h1>Shopping Cart</h1>

    <?php 

     // Creating an array to store items to purchase
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

    foreach ($articles as $item) {
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_POST['add_to_cart']) && isset($_POST['item_id'])) {
        $item_id = $_POST['item_id'];
        $item = array_filter($articles, function ($item) use ($item_id) {
            return $item['id'] == $item_id;
        });
        $item = reset($item);
        $quantity = isset($_POST['quantity']) && !empty($_POST['quantity']) ? $_POST['quantity'] : 1;
        $key = array_search($item, $articles);
        if (!isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key] = array("quantity" => $quantity, "price" => $item["price"], "product" => $item[""]);
        } else {
            $_SESSION['cart'][$key]["quantity"] += $quantity;
        }
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }


    function remove_from_cart($item_id)
    {
        if (isset($_SESSION['cart'][$item_id])) {
            unset($_SESSION['cart'][$item_id]);
        }
    }

    if (isset($_POST['remove_from_cart'])) {
        $item_id = $_POST['item_id'];
        remove_from_cart($item_id);
    }

    function get_cart_total()
    {
        global $articles;
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item_id => $item) {
                $price = $item["price"];
                $item_total = intval($price) * intval($item["quantity"]);
                $total += $item_total;
            }
        }
        return $total;
    }
    ?>


    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Remove</th>
        </tr>

        <?php
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item_id => $item) {
                $name = $item["product"];
                $quantity = $item["quantity"];
                $price = $item["price"];
                $item_total = $price * $quantity;
                $total += $item_total;
        ?>
                <tr>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $quantity; ?>
                    </td>
                    <td>
                        €<?php echo $price; ?>
                    </td>
                    <td>
                        €<?php echo $item_total; ?>
                    </td>
                    <td>
                        <form method="post" action="cart.php">
                            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                            <input type="submit" name="remove_from_cart" value="Remove">
                        </form>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        <tr>
            <td></td>
            <td>Total: €<?php echo get_cart_total(); ?></td>
            <td></td>
        </tr>
    </table>
    <div>
        <a href="../index.php" alt="homepage"><button>Back to shopping</button></a>
        <a href="../checkout.php" alt="checkout"><button>Purchase</button></a>
    </div>
    <footer>
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Products</a>
            <a href="#">Contact</a>
        </nav>
    </footer>
    
    
</body>
</html>
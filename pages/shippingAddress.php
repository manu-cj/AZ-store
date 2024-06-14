<?php
session_start();
$_SESSION['Payment'] = false;

$valid = false;
$error = false;

function get_cart_total()
{
    $total = 0;
    if (isset($_SESSION['product-data'])) {
        foreach ($_SESSION['product-data'] as $item) {
            $price = $item["price"];
            $item_total = intval($price) * intval($item["quantity"]);
            $total += $item_total;
        }
    }
    return $total;
}

function get_cart_quantity()
{
    $quantity = 0;
    if (isset($_SESSION['product-data'])) {
        foreach ($_SESSION['product-data'] as $item) {
            $quantity += intval($item["quantity"]);
        }
    }
    return $quantity;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $firstname = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $deliveryOption = filter_input(INPUT_POST, 'deliveryOption', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $checkCondition = filter_input(INPUT_POST, 'checkCondition', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $checkPub = filter_input(INPUT_POST, 'checkPub', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (empty($country)) {
        $valid = false;
    }
    if (empty($firstname)) {
        $valid = false;
    }
    if (empty($lastname)) {
        $valid = false;
    }
    if (empty($address)) {
        $valid = false;
    }
    if (empty($email)) {
        $valid = false;
    }
    if ($checkCondition != "Yes") {
        $valid = false;
    }
    if (!$valid) {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/shippingAddress.css">
</head>

<body>
    <header>
        <div class="sep-raw">
            <p class="-true"><span class="caseNumberTrue">1</span> SHIPPING</p>
            <?php
            if (!$valid) {
            ?>
                <p class="-false"><span class="caseNumberFalse">2</span> PAYMENT</p>
            <?php
            } else {
            ?>
                <p class="-true"><span class="caseNumberTrue">2</span> PAYMENT</p>
            <?php
            }
            ?>
        </div>
        <div>
            <p>NEED HELP? TOLL-FREE NUMBER: 0800 81843 📞 SECURE PAYMENT 🔒</p>
        </div>
    </header>
    <main>
        <?php
        if (!$valid) {
        ?>
            <div class="form-address">
                <form id="contactForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <?php
                    if ($error) {
                        echo "<h2>ERROR</h2>";
                        echo "<hr>";
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo "<p class=\"error\">Invalid email</p>";
                        }
                        if (empty($country)) {
                            echo "<p class=\"error\">Country field is empty!</p>";
                        }
                        if (empty($firstname)) {
                            echo "<p class=\"error\">Name field is empty!</p>";
                        }
                        if (empty($lastname)) {
                            echo "<p class=\"error\">First name field is empty!</p>";
                        }
                        if (empty($address)) {
                            echo "<p class=\"error\">Address field is empty!</p>";
                        }
                        if (empty($email)) {
                            echo "<p class=\"error\">Email field is empty!</p>";
                        }
                        if ($checkCondition != "Yes") {
                            echo "<p class=\"error\">Please accept the T&Cs.</p>";
                        }
                    }
                    ?>

                    <h2>DETAILS</h2>
                    <hr>
                    <div class="input">
                        <label>Country:</label>
                        <input class="inputfield" type="text" id="country" name="country" placeholder="Your country" required>
                        <label>Name:</label>
                        <input class="inputfield" type="text" id="name" name="name" placeholder="Your name" required>
                        <label>First name:</label>
                        <input class="inputfield" type="text" id="lastname" name="lastname" placeholder="Your first name" required>
                        <label>Address:</label>
                        <input class="inputfield" type="text" id="address" name="address" placeholder="Your address" required>
                        <label>Gender:</label>
                        <select class="inputfield" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="HDC">Hélicopter de combat</option>
                        </select>
                        <label>Phone:</label>
                        <input class="inputfield" type="text" id="phoneNumber" name="phoneNumber" placeholder="Your phone number">
                        <label class="comment">To talk to you about your order</label>
                        <label>Email:</label>
                        <input class="inputfield" type="email" id="email" name="email" placeholder="Your email" required>
                        <label class="comment">To send your info and order tracking</label>
                    </div>

                    <h2>Option</h2>
                    <hr>

                    <select class="livraisonSelect" id="gender" name="gender" required>
                        <option value="standard">Standard delivery [ 2 to 4 working days* ]</option>
                        <option value="express">Express delivery [ 24-48 hours* ]</option>
                    </select>

                    <div class="CGU"><input type="checkbox" name="checkCondition" value="Yes" required> <label class="comment">I accept the general conditions of AZ-store and I acknowledge having read and understood the Privacy Policy of AZ-store.</label></div>
                    <div class="CGU"><input type="checkbox" name="checkPub" value="Yes"> <label class="comment">I want to be informed about special offers, new products and AZ-store news.<br> <span>I consent to the processing of my personal data for profile-based marketing purposes, as described in our Privacy Policy.</span></label></div>

                    <button type="submit">PAYMENT</button>
                </form>
            </div>
        <?php
        } else {
        ?>
            <div class="form-address">
                <h2>BILLING ADDRESS</h2>
                <hr>
                <?php
                echo "<p class=\"payment-text\">$firstname $lastname</p>";
                echo "<p class=\"payment-text\">$address</p>";
                echo "<p class=\"payment-text\">$country</p>";
                if (!empty($phoneNumber)) {
                    echo "<p class=\"payment-text\">$phoneNumber</p>";
                }
                echo "<p class=\"payment-text\">$email</p>";
                ?>
                <br>
                <br>
                <h2>SELECT YOUR PAYMENT METHOD</h2>
                <hr>
                <br>
                <div class="payment">
                    <button class="payment-button">PAYPAL</button>
                    <button class="payment-button">BANCONTACT</button>
                </div>
                <script>
                    <?php
                    $test = $_SESSION['Payment'];
                    echo "console.log(\"test : $test\");"
                    ?>
                    let btn_payement = document.querySelectorAll(".payment-button")
                    for (const x of btn_payement) {
                        $(x).on('click', function(e) {
                            e.preventDefault();
                            $.ajax({
                                type: 'POST',
                                url: './components/buying.php',
                                data: {
                                    buy: true
                                },
                                success: function() {
                                    console.log("La requête a réussi !");
                                    window.location.href = "../?c=home"
                                },
                                error: function() {
                                    console.log("La requête a échoué !");
                                }
                            });
                        })
                    }
                </script>
            </div>
        <?php
        }
        ?>
        <div class="shopCard">
            <h2>ORDER SUMMARY</h2>
            <hr>
            <p class="card-article"><?php echo get_cart_quantity(); ?> ARTICLE IN YOUR CART</p>
            <?php

            if (isset($_SESSION['product-data'])) {
                echo "<table class=\"card-table\">";
                foreach ($_SESSION['product-data'] as $item) {
                    $price = $item["price"] * intval($item["quantity"]);
                    $qtt = $item["quantity"];
                    $name = $item["name"];

                    echo "<tr>";
                    echo "<td>€ $price</td>";
                    echo "<td>x$qtt</td>";
                    echo "<td class=\"td-name\">$name</td>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>

                <script>
                    let btn_article = document.querySelector(".card-article");

                    let table = document.querySelector(".card-table");
                    table.style.visibility = "hidden";
                    table.style.position = "absolute";


                    function openList() {
                        let table = document.querySelector(".card-table");
                        table.style.visibility = table.style.visibility == "hidden" ? "visible" : "hidden";
                        table.style.position = table.style.position == "absolute" ? "relative" : "absolute";
                    }

                    btn_article.addEventListener('click', function(e) {
                        openList();
                    });
                </script>

            <?php
            }
            ?>

        <div class="sep"><p class="card-total">Subtotal</p><p class="card-total">€ <?php echo get_cart_total(); ?></p></div>
        <div class="sep"><p class="card-delivery">Delivery</p><p class="card-delivery">FREE</p></div>
        <p class="eco">Very good!<br><span class="card-message">By reaching the shipping threshold, you have helped to minimize the environmental impact of your shipment</span></p>
        <div class="total">
            <div class="sep"><p class="total-total">Total</p><p class="total-total">€ <?php echo get_cart_total(); ?></p></div>
            <p class="total-vat">(21% VAT included)</p>
        </div>
        <?php
        if($valid){
            echo "<br>";
            echo "<h3>DELIVERY ADDRESS</h3>";
            echo "<hr>";
            echo "<p class=\"payment-text\">$firstname $lastname</p>";
            echo "<p class=\"payment-text\">$address</p>";
            echo "<p class=\"payment-text\">$country</p>";
        }
        ?>
    </div>
</main>
<footer>
</footer>
</body>

</html>
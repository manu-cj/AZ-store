<body>
  <main>
    <?php

    function remove_from_cart($item_id)
    {
      if (isset($_SESSION['product-data'])) {
        foreach ($_SESSION['product-data'] as $key => $product) {
          if ($product["id"] == $item_id) {
            unset($_SESSION['product-data'][$key]);
            $_SESSION['product-data'] = array_values($_SESSION['product-data']);
            break;
          }
        }
      }
    }


    if (isset($_POST['remove_from_cart'])) {
      $item_id = $_POST['item_id'];
      remove_from_cart($item_id);
    }

    function get_cart_total() {
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
      if (isset($_SESSION['product-data'])) {
        foreach ($_SESSION['product-data'] as $product) {
          $name = $product["name"];
          $quantity = $product["quantity"];
          $price = $product["price"];
          $item_total = $price * $quantity;
          // $total += $item_total;
          $item_id = $product["id"];
      ?>
          <tr>
            <td>
              <?php echo $name; ?>
            </td>
            <td>
              <?php echo $quantity;  ?>
            </td>
            <td>
              €<?php echo $price;  ?>
            </td>
            <td>
              €<?php echo $item_total;  ?>
            </td>
            <td>
              <form method="post" action="?c=cart">
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
        <td class="total">Total: €<?php echo get_cart_total() ?? 0; ?></td>
        <td></td>
      </tr>
    </table>
    <div>
      <a href="?c=products" alt="homepage"><button class="back">Back to shopping</button></a>
      <a href="?c=shipping-address" alt="shipping-address"><button>Purchase</button></a>
    </div>
  </main>


</body>

</html>
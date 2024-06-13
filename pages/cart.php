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

function update_quantity($item_id, $quantity)
{
  if (isset($_SESSION['product-data'])) {
    foreach ($_SESSION['product-data'] as $key => $product) {
      if ($product["id"] == $item_id) {
        $_SESSION['product-data'][$key]["quantity"] = $quantity;
        break;
      }
    }
  }
}

if (isset($_POST['remove_from_cart'])) {
  $item_id = $_POST['item_id'];
  remove_from_cart($item_id);
}

if (isset($_POST['update_quantity'])) {
  $item_id = $_POST['item_id'];
  $quantity = intval($_POST['quantity']);

  if ($quantity > 0) {
    update_quantity($item_id, $quantity);
  } else {
    remove_from_cart($item_id);
  }
}

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
?>
<section id="cart">
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
        <tr class="table-body">
          <td>
            <?php echo $name; ?>
          </td>
          <td>
            <form method="post" action="" id="update-form-<?php echo $item_id; ?>">
              <input class="quantity" type="number" name="quantity" value="<?php echo $quantity; ?>" min="0" onchange="document.getElementById('update-form-<?php echo $item_id; ?>').submit();">
              <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
              <input type="hidden" name="update_quantity" value="1">
            </form>
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
              <button type="submit" name="remove_from_cart" value="Remove"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
    <?php

      }
    }
    ?>
    <tr class="table-footer">
      <td></td>
      <td class="total">Total (excl. VAT): €<?php echo get_cart_total() ?? 0; ?></td>
      <td class="total">Total (incl. VAT): €<?php echo get_cart_total() * 1.21 ?? 0; ?></td>
      <td></td>
    </tr>
  </table>
  <div>
    <a href="?c=shipping-address" alt="shipping-address"><button>Purchase</button></a>
  </div>
</section>
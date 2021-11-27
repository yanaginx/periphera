<link rel="stylesheet" href="./public/css/cart.css">
<link rel="stylesheet" href="./public/css/products.css">

<div class="small-container-col4 cart-page mb-5">
    <table>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>
      <?php
      $total = 0.00;
      if(isset($data["data"])){
        $data = json_decode($data["data"], true);
        $count = 0;
        foreach($data as $data){
            echo '<tr>';
            echo '<td>';
            echo     '<div class="cart-info">';
            echo   '<img src="'.$data["image"].'" width="30%">';
            echo     '<div>';
            echo        '<p>'.$data["name"].'</p>';
            echo        '<small>Price: $'.$data["price"].'</small>';
            echo        '<br>';
            echo '<form method="post" action="./products/cart" class="form-remove-'.$count.'">';
            echo        '<input type="hidden" name="productIdRemove" value="'.$data["order_id"].'">';
            echo        '<button type="submit" class="btn-remove" onclick="document.getElementsByClassName ("form-remove-'.$count.'").submit();">Remove</button>';
            echo '</form>';
            echo    '</div>';
            echo    '</div>';
            echo '</td>';
            echo '<td>';
            echo    '<form method="post" action="./products/cart" class="form-prod-mount-'.$count.'">';
            echo    '<input type="hidden" name="productIdUpdate" value="'.$data["order_id"].'">';
            echo    '<input type="number" onchange="form.submit();" value="'.$data["prod_amount"].'" min="1" max="10" name="productMount">';
            echo    '</form>';
            echo '</td>';
            echo '<td>$'.(number_format((float)($data["price"]*$data["prod_amount"]), 2, '.', '')).'</td>';
            echo '</tr>';
            $total += ($data["price"]*$data["prod_amount"]);
            $count++;
        }
      }
        
      ?>
    </table>

    <div class="total-price my-3">
      <table>
        <tr>
          <td>Subtotal</td>
          <td>$<?php echo number_format((float)$total, 2, '.', ''); ?></td>
        </tr>
        <tr>
          <td>Tax</td>
          <td>$<?php echo number_format((float)(0.1*$total), 2, '.', ''); ?></td>
        </tr>
        <tr>
          <td>Total</td>
          <td>$<?php echo number_format((float)(0.1*$total+$total), 2, '.', ''); ?></td>
        </tr>
      </table>
    </div>
  </div>
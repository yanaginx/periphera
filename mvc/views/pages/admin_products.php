<?php 
  if ( isset($data["qr_res"]) ) {
  echo '<table class="table table-hover table-striped">';
  echo '<thead>';
  echo '<tr>';
  echo '<th scope="col">Product name</th>';
  echo '<th scope="col">Category</th>';
  echo '<th scope="col">Date added</th>';
  echo '<th scope="col">Price</th>';
  echo '<th scope="col">Featured product</th>';
  echo '<th scope="col">Action</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  foreach ($data["qr_res"] as $row) {
      echo '<tr>';
      echo '<td>'.$row['name'].'</td>';
      echo '<td>'.$row['category_name'].'</td>';
      echo '<td>'.$row['date_added'].'</td>';
      echo '<td>'.$row['price'].'</td>';
      echo '<td>'.$row['is_featured'].'</td>';
      echo '<td class="col-3">';
      echo '<a href="#"> <input type="button" class="btn btn-success" value="Edit"></a>';
      echo '<a href="#"> <input type="button" class="btn btn-danger" value="Delete"></a>';
      echo '</td>';
      echo '</tr>';          
  }
  echo '</ tbody>';
  echo '</table>';
  }
?>
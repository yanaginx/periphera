<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
  <div class="col"><h3>Manage Orders</h3></div>
  <div class="col">
    
  </div>
</div>

<?php
  if ( isset($data["qr_res"]) ) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-hover table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Username</th>';
    echo '<th scope="col">Date</th>';
    echo '<th scope="col">Product Name</th>';
    echo '<th scope="col">Product Amount</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($data["qr_res"] as $row) {
        echo '<tr>';
        echo '<td>'.$row['username'].'</td>';
        echo '<td>'.$row['date'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['prod_amount'].'</td>';
        echo '<td class="col-3">';
        echo '<input id="hidden-id" type="hidden" value='.$row["id"]." />";
        echo '<a data-mdb-toggle="modal" class="del-btn" data-mdb-target="#deleteModal"><i class="fas fa-trash-alt text-danger fa-1x mx-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</ tbody>';
    echo '</table>';
    echo '</div>';
  }
?>

<!-- Delete Modal -->
<div
  class="modal fade"
  id="deleteModal"
  tabindex="-1"
  aria-labelledby="deleteModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete order</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>

      <form method="post" action="./products/ad_delete_order" id="form-delete-user">
      <input type="hidden" id="orderId" name="orderId" />
      <div class="modal-body">					
        <p>Are you sure you want to delete this record?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="submit" id="del-submit" class="btn btn-danger">Delete</button>
      </div>
      </form>

    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script id="tmp">
$(document).ready(function() {
    $(".del-btn").on("click", function() {
        $td = $(this).closest("td");
        var orderId = $td.children("#hidden-id").val();
        $("#orderId").val(orderId);
    });
});
    
</script>
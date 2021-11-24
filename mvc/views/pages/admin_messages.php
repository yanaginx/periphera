<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
  <div class="col"><h3>Manage Messages</h3></div>
  <div class="col">
    
  </div>
</div>

<?php
  if ( isset($data["qr_res"]) ) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-hover table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">First Name</th>';
    echo '<th scope="col">Last Name</th>';
    echo '<th scope="col">Email</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($data["qr_res"] as $row) {
        echo '<tr>';
        echo '<td>'.$row['fname'].'</td>';
        echo '<td>'.$row['lname'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td class="col-3">';
        echo '<input id="hidden-id" type="hidden" value='.$row["id"]." />";
        echo '<input id="hidden-content" type="hidden" value="'.$row["content"].'" />';
        echo '<a data-mdb-toggle="modal" class="view-btn" data-mdb-target="#viewModal"><i class="fas fa-search text-warning fa-1x mx-2"></i></a>';
        echo '<a data-mdb-toggle="modal" class="del-btn" data-mdb-target="#deleteModal"><i class="fas fa-trash-alt text-danger fa-1x mx-2"></i></a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</ tbody>';
    echo '</table>';
    echo '</div>';
  }
?>

<!-- View Modal -->
<div
  class="modal fade"
  id="viewModal"
  tabindex="-1"
  aria-labelledby="viewModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Content</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="modal-content text-wrap" id="msg-content"></div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
      </div>

    </div>
  </div>
</div>

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
        <h5 class="modal-title" id="exampleModalLabel">Delete message</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>

      <form method="post" action="./contact/ad_Delete" id="form-delete-msg">
      <input type="hidden" id="msgId" name="msgId" />
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
    $(".view-btn").on("click", function() {
        $td = $(this).closest("td");
        var data = $td.children("#hidden-content").val();
        $("#msg-content").text(data);
    });
    $(".del-btn").on("click", function() {
        $td = $(this).closest("td");
        var msgId = $td.children("#hidden-id").val();
        $("#msgId").val(msgId);
    });
});
    
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
  <div class="col"><h3>Manage News</h3></div>
  <div class="col">
    <div class="text-end">
      <!-- Button trigger modal -->
      <button
        type="button"
        class="btn btn-primary"
        data-mdb-toggle="modal"
        data-mdb-target="#createModal"
      >
        Create New Article
      </button>
    </div>
  </div>
</div>

<?php
  if ( isset($data["qr_res"]) ) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-hover table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Title</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($data["qr_res"] as $row) {
        echo '<tr>';
        echo '<td>'.$row['title'].'</td>';
        echo '<td class="col-3">';
        echo '<input id="hidden-id" type="hidden" value='.$row["id"]." />";
        echo '<input id="hidden-title" type="hidden" value='.$row["title"]." />";
        echo '<input id="hidden-content" type="hidden" value="'.$row["content"].'" />';
        echo '<input id="hidden-image" type="hidden" value='.$row["image"]." />";
        echo '<a data-mdb-toggle="modal" class="view-btn" data-mdb-target="#viewModal"><i class="fas fa-search text-warning fa-1x mx-2"></i></a>';
        echo '<a data-mdb-toggle="modal" class="edit-btn" data-mdb-target="#editModal"><i class="fas fa-pencil-alt text-warning fa-1x mx-2"></i></a>';
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
        <div class="modal-content text-wrap" id="news-content"></div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
      </div>

    </div>
  </div>
</div>


<!-- Create Modal -->
<div
  class="modal fade"
  id="createModal"
  tabindex="-1"
  aria-labelledby="createModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create article</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form method="post" action="./news/ad_Add" id="form-add-news">
      <div class="modal-body">
        <div class="form-outline mb-3">
          <input type="text" name="title" id="title" class="form-control" />
          <label class="form-label" for="name">Title</label>
        </div>
        <div class="form-outline mb-3">
          <textarea class="form-control form-input" name="content" id="content" rows="6"></textarea>
          <label class="form-label" for="description">Content</label>
        </div>
        <div class="form-outline mb-3">
          <input type="text" name = "image" id="image" class="form-control" />
          <label class="form-label" for="price">Image URL</label>
        </div>
        <div class="mb-3">
          <label class="form-label" for="imageUpload">Image</label>
          <input type="file" class="form-control" id="imageUpload" />
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>

    </div>
  </div>
</div>


<!-- Edit Modal -->
<div
  class="modal fade"
  id="editModal"
  tabindex="-1"
  aria-labelledby="editModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit article</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>

      <form method="post" action="./news/ad_Edit" id="form-edit-news">
      <input type="hidden" id="newsId-edit" name="newsId" />
      <div class="modal-body">
        <div class="form-outline mb-3">
          <input type="text" id="title1" name="title" class="form-control" />
          <label class="form-label" for="name">Title</label>
        </div>
        <div class="form-outline mb-3">
          <textarea class="form-control form-input" name="content" id="content1" rows="6"></textarea>
          <label class="form-label" for="description">Content</label>
        </div>
        <div class="form-outline mb-3">
          <input type="text" id="image1" name="image" class="form-control" />
          <label class="form-label" for="price">Image URL</label>
        </div>
        <div class="mb-3">
          <label class="form-label" for="imageUpload">Image</label>
          <input type="file" class="form-control" id="imageUpload" />
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>

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
        <h5 class="modal-title" id="exampleModalLabel">Delete article</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>

      <form method="post" action="./news/ad_Delete" id="form-delete-news">
      <input type="hidden" id="newsId-del" name="newsId" />
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
        $("#news-content").text(data);
    });
    $(".edit-btn").on("click", function() {
        $td = $(this).closest("td");
        var newsId = $td.children("#hidden-id").val();
        var title = $td.children("#hidden-title").val();
        var content = $td.children("#hidden-content").val();
        var image = $td.children("#hidden-image").val();

        document.getElementById("title1").value = title;
        document.getElementById("content1").value = content;
        document.getElementById("image1").value = image;
        $("#newsId-edit").val(newsId);
    });
    $(".del-btn").on("click", function() {
        $td = $(this).closest("td");
        var newsId = $td.children("#hidden-id").val();
        $("#newsId-del").val(newsId);
    });
});
    
</script>
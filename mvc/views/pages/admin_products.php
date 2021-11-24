<div class="row">
  <div class="col"><h3>Manage Products</h3></div>
  <div class="col">
    <div class="text-end">
      <!-- Button trigger modal -->
      <button
        type="button"
        class="btn btn-primary"
        data-mdb-toggle="modal"
        data-mdb-target="#createModal"
      >
        Create New Products
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
        echo '<input id="hidden-name" type="hidden" value="'.$row["name"].'" />';
        echo '<input id="hidden-category" type="hidden" value="'.$row["category_name"].'" />';
        echo '<input id="hidden-price" type="hidden" value="'.$row["price"].'" />';
        echo '<input id="hidden-description" type="hidden" value="'.$row["description"].'" />';
        echo '<input id="hidden-feature" type="hidden" value="'.$row["is_featured"].'" />';
        echo '<input id="hidden-id" type="hidden" value="'.$row["id"].'" />';
        echo '<input id="hidden-rating" type="hidden" value="'.$row["rating"].'" />';
        echo '<input id="hidden-image" type="hidden" value="'.$row["image"].'" />';
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
        <h5 class="modal-title" id="exampleModalLabel">Create product</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form action="./products/ad_add_product" method="post" id="form-admin-add-product">
        <div class="modal-body">
          <div class="form-outline mb-3">
            <input type="text" id="name" name="name" class="form-control" />
            <label class="form-label" for="name">Name</label>
          </div>
          <select class="form-select mb-3" aria-label="categorySelect" name="category">
            <option selected value="1">Bracelet</option>
            <option value="2">Earring</option>
            <option value="3">Necklet</option>
          </select>
          <div class="form-outline mb-3">
            <textarea class="form-control form-input" name="description" id="description" rows="6"></textarea>
            <label class="form-label" for="description">Description</label>
          </div>
          <div class="form-outline mb-3">
            <input type="text" id="price" name="price" class="form-control" />
            <label class="form-label" for="price">Price</label>
          </div>
          <div class="form-outline mb-3">
            <input type="text" id="rating" name="rating" class="form-control" />
            <label class="form-label" for="rating">Rating</label>
          </div>
          <div class="form-outline mb-3">
            <input type="text" id="image" name="image" class="form-control" />
            <label class="form-label" for="image">Image URL</label>
          </div>
          <!-- Checked checkbox -->
          <div class="form-check mb-3">
            <input
              class="form-check-input"
              type="checkbox"
              value="1"
              id="isFeatured"
              name="isFeatured"
              checked
            />
            <label class="form-check-label" for="isFeatured">
              Is Featured
            </label>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form action="./products/ad_edit_product" method="post" id="form-admin-edit-product">
      <input type="hidden" id="proId-edit" name="productId" />
        <div class="modal-body">
          <div class="form-outline mb-3">
            <input type="text" id="name1" name="name1"  class="form-control" />
            <label class="form-label" for="name1">Name</label>
          </div>
          <select class="form-select mb-3" aria-label="categorySelect" id="category1" name="category1">
            <option selected value="1">Bracelet</option>
            <option value="2">Earring</option>
            <option value="3">Necklet</option>
          </select>
          <div class="form-outline mb-3">
            <textarea class="form-control form-input" name="description1" id="description1" rows="6"></textarea>
            <label class="form-label" for="description1">Description</label>
          </div>
          <div class="form-outline mb-3">
            <input type="text" id="price1" name="price1" class="form-control" />
            <label class="form-label" for="price1">Price</label>
          </div>
          <div class="form-outline mb-3">
              <input type="text" id="rating1" name="rating1" class="form-control" />
              <label class="form-label" for="rating1">Rating</label>
            </div>
          <div class="form-outline mb-3">
            <input type="text" id="image1" name="image1" class="form-control" />
            <label class="form-label" for="image1">Image URL</label>
          </div>
          <!-- Checked checkbox -->
          <div class="form-check mb-3">
            <input
              class="form-check-input"
              type="checkbox"
              value="1"
              id="isFeatured1"
              name="isFeatured1"
              checked
            />
            <label class="form-check-label" for="isFeatured1">
              Is Featured
            </label>
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
        <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <form method="post" action="./products/ad_delete_product" id="form-delete-product">
      <input type="hidden" id="productIdDelete" name="productIdDelete" />
      <div class="modal-body">					
        <p>Are you sure you want to delete this record?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script id="tmp">
$(document).ready(function() {
    $(".edit-btn").on("click", function() {
        $td = $(this).closest("td");
        var id = $td.children("#hidden-id").val();
        var name = $td.children("#hidden-name").val();
        var category = $td.children("#hidden-category").val();
        var description = $td.children("#hidden-description").val();
        var price = $td.children("#hidden-price").val();
        var rating = $td.children("#hidden-rating").val();
        var image = $td.children("#hidden-image").val();
        var featured = $td.children("#hidden-feature").val();
        document.getElementById("name1").value = String(name);
        if(category=="bracelet"){
          document.getElementById("category1").value = "1";
        }
        else if(category=="earring"){
          document.getElementById("category1").value = "2";
        }
        else if (category=="necklet"){
          document.getElementById("category1").value = "3";
        }
        
        document.getElementById("description1").value = description;
        document.getElementById("price1").value = price;
        document.getElementById("rating1").value = rating;
        document.getElementById("proId-edit").value = id;
        document.getElementById("image1").value = image;
        if(featured==1 && document.getElementById("isFeatured1").checked == false){
          document.getElementById("isFeatured1").click();
        }
        else if(featured==0 && document.getElementById("isFeatured1").checked == true){
          document.getElementById("isFeatured1").click();
        }
    });
    $(".del-btn").on("click", function() {
        $td = $(this).closest("td");
        var id = $td.children("#hidden-id").val();
        document.getElementById("productIdDelete").value = id;
    });
});
    
</script>
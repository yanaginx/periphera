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
        echo '<a data-mdb-toggle="modal" data-mdb-target="#editModal"><i class="fas fa-pencil-alt text-warning fa-1x mx-2"></i></a>';
        echo '<a data-mdb-toggle="modal" data-mdb-target="#deleteModal"><i class="fas fa-trash-alt text-danger fa-1x mx-2"></i></a>';
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
      <div class="modal-body">
        <div class="form-outline mb-3">
          <input type="text" id="name" class="form-control" />
          <label class="form-label" for="name">Name</label>
        </div>
        <select class="form-select mb-3" aria-label="categorySelect">
          <option selected value="1">Bracelet</option>
          <option value="2">Earring</option>
          <option value="3">Necklet</option>
        </select>
        <div class="form-outline mb-3">
          <textarea class="form-control form-input" name="description" id="description" rows="6"></textarea>
          <label class="form-label" for="description">Description</label>
        </div>
        <div class="form-outline mb-3">
          <input type="text" id="price" class="form-control" />
          <label class="form-label" for="price">Price</label>
        </div>
        <div class="form-outline mb-3">
          <input type="text" id="image" class="form-control" />
          <label class="form-label" for="price">Image URL</label>
        </div>
        <div class="mb-3">
          <label class="form-label" for="imageUpload">Image</label>
          <input type="file" class="form-control" id="imageUpload" />
        </div>
        <!-- Checked checkbox -->
        <div class="form-check mb-3">
          <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="isFeatured"
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

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

      <div class="modal-body">
        <div class="form-outline mb-3">
          <input type="text" id="name" class="form-control" />
          <label class="form-label" for="name">Name</label>
        </div>
        <select class="form-select mb-3" aria-label="categorySelect">
          <option selected value="1">Bracelet</option>
          <option value="2">Earring</option>
          <option value="3">Necklet</option>
        </select>
        <div class="form-outline mb-3">
          <textarea class="form-control form-input" name="description" id="description" rows="6"></textarea>
          <label class="form-label" for="description">Description</label>
        </div>
        <div class="form-outline mb-3">
          <input type="text" id="price" class="form-control" />
          <label class="form-label" for="price">Price</label>
        </div>
        <div class="form-outline mb-3">
          <input type="text" id="image" class="form-control" />
          <label class="form-label" for="price">Image URL</label>
        </div>
        <div class="mb-3">
          <label class="form-label" for="imageUpload">Image</label>
          <input type="file" class="form-control" id="imageUpload" />
        </div>
        <!-- Checked checkbox -->
        <div class="form-check mb-3">
          <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="isFeatured"
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
        <button type="button" class="btn btn-primary">Save changes</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>

      <div class="modal-body">					
        <p>Are you sure you want to delete this record?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>

    </div>
  </div>
</div>


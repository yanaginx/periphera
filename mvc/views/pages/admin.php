<section>
  <div class="row">
    <div class="col-sm-6 col-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between px-md-1">
            <div class="align-self-center">
              <i class="fas fa-users text-info fa-3x"></i>
            </div>
            <div class="text-end">
              <h3> <?php echo $data['user'] ?> </h3>
              <p class="mb-0">Total users</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between px-md-1">
            <div class="align-self-center">
              <i class="fas fa-box-open text-warning fa-3x"></i>
            </div>
            <div class="text-end">
              <h3> <?php echo $data['product'] ?> </h3>
              <p class="mb-0">Total Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between px-md-1">
            <div class="align-self-center">
              <i class="fas fa-shopping-cart text-danger fa-3x"></i>
            </div>
            <div class="text-end">
              <h3> <?php echo $data['order'] ?> </h3>
              <p class="mb-0">Total Orders</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between px-md-1">
            <div class="align-self-center">
              <i class="far fa-comments text-success fa-3x"></i>
            </div>
            <div class="text-end">
              <h3> <?php echo $data['message'] ?> </h3>
              <p class="mb-0">Total Messages</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between px-md-1">
            <div class="align-self-center">
              <i class="far fa-newspaper text-secondary fa-3x"></i>
            </div>
            <div class="text-end">
              <h3> <?php echo $data['news'] ?> </h3>
              <p class="mb-0">Total News</p>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
</section>

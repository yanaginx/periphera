<!-- <base href="http://localhost/periphera/">   Fix the domain when deploy on the server -->

<section style="background-color: #EFEFEF;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="./public/img/placeholders/login-form.jpg"
                alt="login form"
                class="img-fluid h-100 w-auto overflow-hidden" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="./users/login" method="POST">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span> -->
                    <img style="width: 50%" src="./public/img/logo/logo.png" alt="logo">
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline">
                    <input type="text" id="username" name ="username" class="form-control form-control-lg" />
                    <label class="form-label" for="username">Username</label>
                  </div>
                  <div id="un-validate" class="form-text fw-bold mb-4"><?php echo $data['usernameError']?></div>

                  <div class="form-outline">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div id="passwd-validate" class="form-text fw-bold mb-4"><?php echo $data['passwordError']?></div>

                  <?php 
                    if ( isset($data["result"]) ) {
                      echo '<div class="alert alert-primary">';
                      echo $data["result"];
                      echo '</div>';
                    }
                  ?>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block btn-rounded" id="submit" name="btnLogin" type="submit">Login</button>
                  </div>

                  <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="./users/register" style="color: #5A4AE3;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

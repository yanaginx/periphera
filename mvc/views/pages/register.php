<!-- <base href="http://localhost/periphera/">   Fix the domain when deploy on the server -->

<section style="background-color: #EFEFEF;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <div class="d-flex align-items-center mb-3 pb-1">
                    <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span> -->
                    <img style="width: 50%" src="./public/img/logo/logo.png" alt="logo">
                </div>
                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create an account</h5>

                <form name="reg-form" action="./users/register" method="POST">

                  <!-- Username input -->
                  <div class="form-outline">
                    <input required type="text" id="username" name="username" class="form-control form-control-lg" />
                    <label class="form-label" for="username">Username</label>
                  </div>
                  <div id="un-validate" class="form-text fw-bold mb-1"><?php echo $data["usernameError"]; ?></div>
                  <!-- <div id="un-valid" class="valid-feedback feedback-pad">Looks good!</div> -->
                  <div id="un-invalid" class="invalid-feedback feedback-pad mb-3"></div>
                  <div id="un-helper" class="form-text mb-3">Username contains only letters and numbers</div>
                  <!-- Password input -->
                  <div class="form-outline">
                    <input required type="password" id="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div id="password-validate" class="form-text fw-bold mb-1"> <?php echo $data["passwordError"]; ?> </div>
                  <div id="password-invalid" class="invalid-feedback feedback-pad mb-3"></div>
                  <div id="password-helper" class="form-text mb-3">Password must be at least 5 characters long, must have at least 1 letter, 1 numeric character, 1 special character and 1 uppercase letter.</div>

                  <!-- Confirm Password input -->
                  <div class="form-outline">
                    <input required type="password" id="confirm-password" name="confirmPassword" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Confirm Password</label>
                  </div>
                  <div id="confirm-passwd-validate" class="form-text fw-bold mb-1"> <?php echo $data['confirmPasswordError']; ?> </div>
                  <div id="confirm-passwd-invalid" class="invalid-feedback feedback-pad mb-3"></div>
                  <div id="confirm-passwd-helper" class="form-text mb-3">Re-enter your password here</div>
  
                  <!-- Email input -->
                  <div class="form-outline">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email address</label>
                  </div>
                  <div id="em-validate" class="form-text fw-bold mb-1"> <?php echo $data['emailError']; ?> </div>
                  <div id="em-invalid" class="invalid-feedback feedback-pad mb-3"></div>

                  <p class="mb-3 pb-lg-2" style="color: #393f81;">Have already an account? <a href="./users/login" style="color: #5A4AE3;">Login here</a></p>

                  <!-- Submit button -->
                  <div class="pt-1 mb-4">
                    <button type="submit" name="btnRegister" class="btn btn-dark btn-lg btn-block btn-rounded mb-4">Register</button>
                  </div>
                </form>
                <div class="mb-5"></div>
                  <?php 
                    if ( isset($data["result"]) ) {
                      echo '<div class="alert alert-primary">';
                      echo $data["result"];
                      echo '</div>';
                    }
                  ?>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="./public/img/placeholders/signup-form.jpg"
                alt="signup form"
                class="img-fluid h-100" style="border-radius: 0 1rem 1rem 0;"
              />
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./public/js/register_fill.js"></script>



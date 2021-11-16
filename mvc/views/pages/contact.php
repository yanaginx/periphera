<section class="gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">

      <div class="text-center mb-3">
        <i class="fas fa-3x fa-envelope text-white"></i>
        <h3 class="mt-3 text-white">Contact Us</h3>
        <p class="text-white">We would love to hear from you</p>
      </div>

      <div class="col col-xl-8">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <div class="row">
                  <h4>Get in touch:</h4>
                  <div class="col-md-6 col-lg-7">
                    <form class="my-3" name="contact-form" action="./contact" method="POST">
                        <!-- First name input -->
                      <div class="form-outline mb-3">
                        <input required type="text" id="fname" name="fname" class="form-control form-control-lg" />
                        <label class="form-label" for="fname">First name</label>
                      </div>
                      <!-- Last name input -->
                      <div class="form-outline mb-3">
                        <input required type="text" id="lname" name="lname" class="form-control form-control-lg" />
                        <label class="form-label" for="lname">Last name</label>
                      </div>
      
                      <!-- Email input -->
                      <div class="form-outline mb-3">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="email">Email address</label>
                      </div>
                      <div id="em-validate" class="form-text fw-bold mb-1"> <?php echo $data['emailError']; ?> </div>
                      <div id="em-invalid" class="invalid-feedback mb-3"></div>

                      <!-- Message input -->
                      <div class="form-outline mt-5 mb-3">
                        <textarea class="form-control form-input" name="message" id="message" rows="6"></textarea>
                        <label class="form-label" for="message">Message</label>
                      </div>
                      

                      <!-- Submit button -->
                      <div class="mt-5">
                        <button type="submit" name="btnSend" class="btn btn-dark btn-lg btn-rounded mb-4">Submit</button>
                      </div>
                    </form>
                    <?php 
                      if ( isset($data["result"]) ) {
                        echo '<div class="alert alert-primary">';
                        echo $data["result"];
                        echo '</div>';
                      }
                    ?>
                  </div>

                  <div class="col-md-6 col-lg-5 my-3">
                    <p class="fw-bold mb-0"> Call us now at: </p>
                    <p class="text-center"><i class="fas fa-phone"></i> Phone: + 01 234 567 88</p>
                    <p class="fw-bold mb-0"> Email us: </p>
                    <p class="text-center"><i class="fas fa-envelope"></i> Email: <a href="mailto: admin@pheriphera.com">admin@periphera.com</a></p>
                    <p class="fw-bold mb-0"> Come to our office: </p>
                    <p class="text-center"><i class="fas fa-map-marker-alt"></i> Address:  </p>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./public/js/contact_fill.js"></script>

<link rel="stylesheet" href="./public/css/cart.css">

<link rel="stylesheet" href="./public/css/products.css">
<script>
  function enterComment(cmt){
    if(event.key === 'Enter') {
      <?php if (isset($_SESSION["username"])){ ?>
        var form = document.getElementById("form-comment");
        form.action = "./products/comment";
        form.submit();   
      <?php }
      else{
      ?>
        var form = document.getElementById("form-comment");
        form.action = "./users/login";
      <?php }
      ?>
    }
  }
</script>
<div class="small-container" style="margin: 100px 0 ;">
        <?php
          $cmt = $data["comment"];
          if (isset($data["data"])) {
            $data = json_decode($data["data"], true);
            echo '<div class="row">';
            
            foreach ($data as $data) {
                echo '<div class="col-12 col-sm-6">';
                echo  '<img src="'.$data["image"].'" alt="" style="width: 100%;">';
                      
                echo '</div>';

                echo '<div class="col-12 col-lg-6 col-md-12">';
                echo '<h3 style="margin: 10px 0; font-size: 50px;line-height: 60px;">'.$data["name"].'</h3>
                      <h4 style="font-size: 22px;font-weight: bold;">$'.$data["price"].'</h4>';
                if(isset($_SESSION["username"])){
                  echo '<form action="./products/addtocart" method="POST" class="form-addtocart">';
                }
                echo '<input type="number" value="1" style="font-size: 20px;
                                                            width: 50px;
                                                            height: 40px;
                                                            padding-left: 10px;
                                                            margin-right: 10px;
                                                            border: 1px solid #5A4AE3;" name="numberProduct"
                                                            min="1" max="10">';
                if(isset($_SESSION["username"])){
                  echo '<input type="hidden" name="imageProduct" value="'.$data["image"].'">';
                  echo '<input type="hidden" name="nameProduct" value="'.$data["name"].'">';
                  echo '<input type="hidden" name="priceProduct" value="'.$data["price"].'">';
                  echo '<input type="hidden" name="idProduct" value="'.$data["id"].'">';
                  echo '<button href="./products/addtocart" class="btn" style="margin:unset;" 
                        onclick="document.getElementsByClassName("form-addtocart").submit();"
                        type="submit">Add to cart</button>';
                  echo '</form>';
                }
                else{
                  echo '<a href="./users/login" class="btn" style="margin:unset;">Add to cart</a>';
                }
                
                echo '<h5 style="margin:16px 0;">
                        Product details <i class="fa fa-indent" aria-hidden="true" style="color: #5A4AE3;"></i>
                    </h5>';
                echo '<p style="text-align: justify;">'.$data['description'].'</p>';
                echo '</div>';
            }
            echo'</div>';
            
          }
          
        ?>
</div>

<div class="row d-flex justify-content-center">
  <div class="col-md-8 col-lg-6">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
      <div class="card-body p-4">
        <form method="post" action="./products/comment" id="form-comment" class="form-outline mb-4">
          <input
            type="text"
            id="addCmt"
            name="addCmt"
            class="form-control"
            placeholder="Type comment..."
            onkeydown="enterComment(this)"
          />
          <input type="hidden" name="prodID" value="<?php echo $data["id"]; ?>">
          <label class="form-label" for="addCmt">+ Add a comment</label>
        </form>
        
        <?php
          if(isset($cmt)){
            $data = json_decode($cmt, true);
            foreach ($data as $data){
              echo '<div class="card mb-4">';
              echo  '<div class="card-body">';
              echo    '<p>'.$data["comment"].'</p>';

              echo    '<div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <img
                        src="https://mdbootstrap.com/img/Photos/Avatars/img%20(4).jpg"
                        alt="avatar"
                        width="25"
                        height="25"
                      />';
              echo        '<p class="small mb-0 ms-2">'.$data["username"].'</p>
                    </div>
                    <div class="d-flex flex-row align-items-center">';
              echo        '<p class="small text-muted mb-0">'.$data["datetime"].'</p>
                    </div>
                  </div>
                </div>
              </div>';
            }

          }
        ?>
      </div>
    </div>
  </div>
</div>
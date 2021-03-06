<link rel="stylesheet" href="./public/css/products.css">
<link rel="stylesheet" href="./public/css/cart.css">
<script>
  function setCookie(cookieName, cookieValue) {
    document.cookie = cookieName+"="+String(cookieValue);
}
</script>

<div class="small-container" style="margin: 100px 0 0 0;">
    <div class="d-flex flex-row mb-2 justify-content-between">
      <div class="p-2 article__title"><h2>All Products</h2></div>
      <div class="p-2 ">
        <?php if($data["numberPage"] == 1){
        ?>
        <form action="./products" method="post" id="formselect">
          <select name="sort" id="sort" onchange='  setCookie("formselected", document.getElementById("sort").value);
                                                    document.getElementById("formselect").submit();'>
              <?php
                if($_COOKIE['formselected'] == 0){
                  echo '<option value="0" selected>Default Sorting</option>';
                  echo '<option value="1" >Sort by price</option>';
                  echo '<option value="2">Sort by rating</option>';
                }
                if($_COOKIE['formselected'] == 1){
                  echo '<option value="0">Default Sorting</option>';
                  echo '<option value="1" selected>Sort by price</option>';
                  echo '<option value="2">Sort by rating</option>';
                }
                if($_COOKIE['formselected'] == 2){
                  echo '<option value="0">Default Sorting</option>';
                  echo '<option value="1" >Sort by price</option>';
                  echo '<option value="2" selected>Sort by rating</option>';
                }
              ?>
          </select>
        </form>
        <?php } ?>
      </div>
        
    </div>
        <?php
          if ( isset($data["data"]) ) {
            $numberPage = $data["numberPage"];
            $data = json_decode($data["data"], true);
            $count = count($data);
            $temp = $numberPage;
            $i = 0;
            echo '<div class="row">';
            
            foreach ($data as $data) {
              if($i < $numberPage*12 && $i >= ($numberPage*12 - 12)){
                echo '<a class="col-12 col-sm-6 col-lg-4" href="./products/product_detail/'.$data['id'].'">';
                echo  '<img src="'.$data["image"].'" alt="" style="width: 100%;">'
                      .'<h6 style="margin: 10px 0;">'.$data["name"].'</h6>
                      <div>';
                      for($j = 1; $j<$data["rating"]; $j++){
                        echo '<i class="fas fa-star" style="color: #978AB5;"></i>';
                      }
                      if($data["rating"] - ((int)$data["rating"]) == 0){
                        echo '<i class="fas fa-star" style="color: #978AB5;"></i>';
                      }
                      if($data["rating"] - ((int)$data["rating"]) == 0.5){
                        echo '<i class="fas fa-star-half-alt" style="color: #978AB5;"></i>';
                      }
                echo'
                      </div>
                      <p>$'.$data["price"].'</p>';
                echo '</a>';
              }
              
              $i = $i + 1;
            }
            echo'</div>';
            echo '<div class="pagination">';
            for($t = 0; $t<=$count/12; $t++){
              echo'<a href="./products/page/'.($t+1).'">'.($t+1).'</a>';
            }
            echo '</div>';
          }
        ?>
      
      
  </div>
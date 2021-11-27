<!DOCTYPE html>
<html lang="en">
<head>
  <base href="http://localhost/periphera/">  <!--  Fix the domain when deploy on the server -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> 
    <?php 
      if ( isset($data["article"]) ) { 
        $article = json_decode($data["article"], true); 
        echo $article[0]["title"]; 
      } else {
        echo $data['title'];
      }
    ?> 
  </title>
  <!-- Font Awesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
  />
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
  />
  <!-- MDB -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
    rel="stylesheet"
  />
  <link 
    href="./public/css/main.css"
    rel="stylesheet" 
  />
  <link 
    href="./public/css/details.css"
    rel="stylesheet" 
  />

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
</head>
<body>
  <!-- nav bar -->
  <?php require_once "./mvc/views/blocks/headerMenu.php"; ?>

  <div class="container">
  <!-- Contents -->
  <?php require_once "./mvc/views/pages/".$data["page"].".php"; ?>
  </div>
  
  <!-- Footer -->
  <?php require_once "./mvc/views/blocks/footer.php"; ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src="https://kit.fontawesome.com/29945b370d.js" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

</body>
</html>
<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-scroll navbar-dark bg-dark fixed-top">
  <!-- <nav class="navbar navbar-expand-lg navbar-scroll fixed-top"> -->
    <div class="container-fluid">
      <a class="navbar-brand" href="./home">
        <img style="width: 128px" src="./public/img/logo/logo_white.png" alt="logo_white">
      </a>
      <button class="navbar-toggler collapsed" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="toggler-icon top-bar"></span>
        <span class="toggler-icon middle-bar"></span>
        <span class="toggler-icon bottom-bar"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href=".">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./news">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact">Contact</a>
          </li>
        </ul>
        <ul class="navbar-nav d-flex flex-row">
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="#">
              <span><i class="fas fa-shopping-cart"></i></span>
              <!-- <span class="badge rounded-pill badge-notification bg-danger">1</span> -->
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <div class="dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <!-- <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" class="rounded-circle" height="22" alt=""
                  loading="lazy" /> -->
                  <span><i class="fas fa-user"></i></span>             
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                <!-- <li><a class="dropdown-item" href="#">My profile</a></li> -->
                <?php if ( isset($_SESSION['username'] )) : ?>
                  <li><a class="dropdown-item" href="./users/details">Detals</a></li>
                  <li><a class="dropdown-item" href="./users/logout">Logout</a></li>
                <?php else : ?>
                  <li><a class="dropdown-item" href="./users/login">Login</a></li>
                  <li><a class="dropdown-item" href="./users/register">Register</a></li>                  
                <?php endif; ?>
              </ul>
            </div>
          </li>
        </ul>
        
        <!-- User -->
        
        <!-- end User -->
      </div>
    </div>
  </nav>
  <!-- Navbar -->
</header>
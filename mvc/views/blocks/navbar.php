<!-- Navbar -->
<nav
      id="main-navbar"
      class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
      >
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#sidebarMenu"
            aria-controls="sidebarMenu"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Brand -->
    <a class="navbar-brand" href="./admin">
      <img style="width: 128px" src="./public/img/logo/logo.png" alt="logo" loading="lazy"/>
    </a>

    <ul class="navbar-nav d-flex flex-row">
      <li class="nav-item me-3 me-lg-0">
        <div class="dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
            id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <!-- <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" class="rounded-circle" height="22" alt=""
              loading="lazy" /> -->
              <span><i class="fas fa-user"></i></span>             
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <!-- <li><a class="dropdown-item" href="#">My profile</a></li> -->
            <li><a class="dropdown-item" href="./users/logout">Logout</a></li>
          </ul>
        </div>
      </li>
    </ul>

  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
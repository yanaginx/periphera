<!-- Sidebar -->
<nav
  id="sidebarMenu"
  class="collapse d-lg-block sidebar collapse bg-white"
  >
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3 mt-4">
      <a
          href="./admin"
          class="list-group-item list-group-item-action py-2 ripple <?php if ($data['page'] === 'admin') echo 'active'?>"
          aria-current="true"
          >
        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
      </a>
      <a
          href="./admin/users"
          class="list-group-item list-group-item-action py-2 ripple <?php if ($data['page'] === 'admin_users') echo 'active'?>"
          aria-current="true"
          >
        <i class="fas fa-users fa-fw me-3"></i><span>Users</span>
      </a>
      <a
          href="./admin/products"
          class="list-group-item list-group-item-action py-2 ripple <?php if ($data['page'] === 'admin_products') echo 'active'?>"
          >
        <i class="fas fa-box-open fa-fw me-3"></i><span>Products</span>
      </a>
      <a
          href="./admin/orders"
          class="list-group-item list-group-item-action py-2 ripple <?php if ($data['page'] === 'admin_orders') echo 'active'?>"
          >
        <i class="fas fa-shopping-cart fa-fw me-3"></i><span>Orders</span>
      </a>
      <a
          href="./admin/news"
          class="list-group-item list-group-item-action py-2 ripple <?php if ($data['page'] === 'admin_news') echo 'active'?>"
          >
        <i class="fas fa-newspaper fa-fw me-3"></i><span>News</span>
      </a>
      <a
          href="./admin/messages"
          class="list-group-item list-group-item-action py-2 ripple <?php if ($data['page'] === 'admin_messages') echo 'active'?>"
          >
        <i class="fas fa-comments fa-fw me-3"></i><span>Messages</span>
      </a>     
    </div>
  </div>
</nav>
<!-- Sidebar -->
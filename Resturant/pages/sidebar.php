<div class="page-content d-flex align-items-stretch">
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar">
        <img src="img/admin.png" alt="..." class="img-fluid rounded-circle">
      </div>
      <div class="title">
        <h3 class="h5">
        <?php echo $_SESSION['resturant']; ?>
        </h3>
        <p class="text-dark">
          <?php echo $_SESSION['login_type'];?> Man</p>
      </div>
    </div>
    <ul class="list-unstyled font-weight-bold">
      <li class="active">
        <a href="resturant.php" class="font-weight-bold">
          <i class="icon-user">
          </i>Your Profile
        </a>
      </li>
      <li class="">
        <a href="addProduct.php">
          <i class="icon-padnote">
          </i>Add Product
        </a>
      </li>
      <li>
        <a href="viewProduct.php">
          <i class="icon-bill"></i>
          view Product
        </a>
      </li>
      <li>
        <a href="viewOrders.php">
          <i class="icon-interface-windows"></i>
          View Orders
        </a>
      </li>
      <li>
        <a href="../logout.php">
          <i class="icon-paper-airplane"></i>
        Logout </a>
      </li>
    </ul>
  </nav>
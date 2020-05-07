<div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
            <img src="img/admin.png" alt="..." class="img-fluid rounded-circle">
            </div>
            <div class="title">
              <h1 class="h4">
                <?php echo $_SESSION['admin']; ?>
              </h1>
              <p>Bussiness Man</p>
            </div>
          </div>
          <ul class="list-unstyled">

            <li class="active">
              <a href="view_customer.php"> 
                <i class="icon-user">
                </i>View Customer
              </a>
            </li>

            <li class="">
              <a href="add_product.php"> 
                <i class="icon-padnote">
                </i>Add Product
              </a>
            </li>

            <li>
              <a href="add_category.php"> 
                <i class="icon-bill"></i>
                Add Category 
              </a>
              </li>

            <li>
              <a href="view_orders.php"> 
                <i class="icon-interface-windows"></i>
                View Orders
              </a>
            </li>

            <li>
              <a href="change_slider.php"> 
                <i class="icon-picture"></i>
              Change Slider
            </a>
          </li>
            <li>
              <a href="logout.php"> 
                <i class="icon-paper-airplane"></i>
              Logout </a>
            </li>
          </ul>
        </nav>
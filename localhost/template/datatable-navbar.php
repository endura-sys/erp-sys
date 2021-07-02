  <div class="sidebar-menu">
    <ul class="menu">
      <?php  if (isset($_SESSION['username'])) { ?>
        <li class="sidebar-title"><h6>Welcome <strong><?php echo $_SESSION['username'];?></strong> </h6></li>
      <?php } ?>
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item <?php if ($currentPage == 'dashboard') {echo "active";} else  {echo "noactive";}?>">
            <a href="dashboard" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- General -->
        <li class="sidebar-item has-sub <?php if ($currentPage == 'item-list' || $currentPage == 'supplier-list'||$currentPage == 'customer-list') {echo "active";} else  {echo "noactive";}?>">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>General</span>
            </a>

            <ul class="submenu <?php if ($currentPage == 'item-list' || $currentPage == 'supplier-list'||$currentPage =='customer-list') {echo "active";} else  {echo "noactive";}?>">
                <li class="submenu-item <?php if ($currentPage == 'item-list') {echo "active";} ?>">
                    <a href="item-list">Items list</a>
                </li>
                <li class="submenu-item <?php if ($currentPage == 'supplier-list') {echo "active";} ?>">
                    <a href="supplier-list">Supplier list</a>
                </li>

                <li class="submenu-item <?php if ($currentPage == 'customer-list') {echo "active";} ?>">
                    <a href="customer-list">Customer list</a>
                </li>

            </ul>

        </li>

        <!-- Financial Management -->
        <li class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Financial Management</span>
            </a>

            <ul class="submenu">
                <li class="submenu-item ">
                    <a href="">Purchase schedule</a>
                </li>
                <li class="submenu-item ">
                    <a href="">Sales schedule</a>
                </li>
            </ul>
        </li>

        <!-- Inventory inquiry -->
   <li class="sidebar-item has-sub ">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Inventory inquiry</span>
            </a>

            <ul class="submenu ">

            <li class="submenu-item ">
                    <a href="">Warehousing list</a>
                </li>
                <li class="submenu-item ">
                    <a href="">Outbound list</a>
                </li>
            </ul>
        </li>

        <!-- Purchase -->
        <li class="sidebar-item has-sub <?php if ($currentPage == 'purchase-list') {echo "active";} else  {echo "noactive";}?>">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Purchase</span>
            </a>

            <ul class="submenu <?php if ($currentPage == 'purchase-list') {echo "active";} else  {echo "noactive";}?>">
                <li class="submenu-item <?php if ($currentPage == 'purchase-list') {echo "active";} ?>">
                <a href="purchase-list">Purchase schedule</a>
                </li>
            </ul>
        </li>

        <!-- Sales -->
        <li class="sidebar-item has-sub <?php if ($currentPage == 'sales' ||$currentPage == 'branch') {echo "active";} else  {echo "noactive";}?>">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Sales</span>
            </a>

            <ul class="submenu <?php if ($currentPage == 'sales' || $currentPage == 'branch') {echo "active";} else  {echo "noactive";}?>">
                <li class="submenu-item <?php if ($currentPage == 'sales') {echo "active";} else {echo "noactive";} ?>">
                <a href="sales">sales record</a>
                </li>
                <li class="submenu-item <?php if ($currentPage == 'branch') {echo "active";} else {echo "noactive";} ?>">
                <a href="branch">branch record</a>
            </ul>
        </li>

        <!-- Inbound -->
        <li class="sidebar-item has-sub <?php if ($currentPage == 'inbound-list') {echo "active";} else  {echo "noactive";}?>" >
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Inbound</span>
            </a>

            <ul class="submenu <?php if ($currentPage == 'inbound-list') {echo "active";} else  {echo "noactive";}?>">
                <li class="submenu-item <?php if ($currentPage == 'inbound-list') {echo "active";}?>">
                    <a href="inbound-list">Inbound schedule</a>
                </li>
                <li class="submenu-item ">
                    <a href="">New inbound</a>
                </li>
            </ul>
        </li>

        <!-- Outbound -->
        <li class="sidebar-item has-sub <?php if ($currentPage == 'outbound-schedule') {echo "active";} ?>">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Outbound</span>
            </a>

            <ul class="submenu <?php if ($currentPage == 'outbound-schedule') {echo "active";} ?>">
                <li class="submenu-item <?php if ($currentPage == 'outbound-schedule') {echo "active";} ?>">
                    <a href="outbound-schedule">Outbound schedule</a>
                </li>
                <li class="submenu-item ">
                    <a href="">New outbound order</a>
                </li>
            </ul>
        </li>


        <!-- User management -->
        <li class="sidebar-item has-sub <?php if ($currentPage == 'user-management' || $currentPage == 'position-management') {echo "active";} else  {echo "noactive";}?>">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>User management</span>
            </a>

            <ul class="submenu <?php if ($currentPage == 'user-management' || $currentPage == 'position-management') {echo "active";} else  {echo "noactive";}?>">
              <li class="submenu-item <?php if ($currentPage == 'user-management') {echo "active";} ?>">
                  <a href="user-management">User Management</a>
              </li>
                <li class="submenu-item <?php if ($currentPage == 'position-management') {echo "active";} ?>">
                    <a href="position-management">Position Management</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  ">
          <?php  if (isset($_SESSION['username'])){ ?>
          	<p> <a class="btn btn-outline-danger btn-block" href="index.php?logout='1'">Log out</a> </p>
          <?php } else {?>
            <p> <a class="btn btn-outline-primary btn-block" href="login" >Login</a> </p>
          <?php } ?>
        </li>

    </ul>
</div>

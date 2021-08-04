<?php
session_start();

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index");
}
if (!isset($_SESSION['username'])) {
  header("location: login");
}
?>
<div class="sidebar-wrapper active">
  <div class="sidebar-header">
    <div class="d-flex justify-content-between">
      <div class="logo text-center">
        <a href="index"><img width="30%" src="template/assets/images/logo/sake_logo.png"  alt="Logo" srcset=""></a>
      </div>
      <div class="toggler">
        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
      </div>
    </div>
  </div>

  <div class="sidebar-menu">
    <ul class="menu">
      <?php
      if (isset($_SESSION['username'])) {
        $conn = mysqli_connect('localhost', 'endurase_sakedb', 'oIx6!!!nZ_do3', 'endurase_sakedb');
        $sql_get_id = "SELECT employee_id FROM account WHERE username='" . $_SESSION['username'] . "'";
        $result_get_id = $conn->query($sql_get_id);
        $row_get_id = mysqli_fetch_array($result_get_id);
      ?>
        <li class="sidebar-title">
          <h6>Welcome <strong><a href="user-update?id=<?php echo $row_get_id["employee_id"] ?>"><?php echo $_SESSION['username']; ?></a></strong> </h6>
        </li>
      <?php
      }
      ?>
      <li class="sidebar-title">Menu</li>

      <li class="sidebar-item <?php if ($currentPage == 'dashboard') {
                                echo "active";
                              } else {
                                echo "noactive";
                              } ?>">
        <a href="dashboard" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- General -->
      <li class="sidebar-item has-sub <?php if ($currentPage == 'item-list' || $currentPage == 'supplier-list' || $currentPage == 'customer-list') {
                                        echo "active";
                                      } else {
                                        echo "noactive";
                                      } ?>">
        <a href="#" class='sidebar-link'>
          <i class="bi bi-file-earmark-spreadsheet-fill"></i>
          <span>General</span>
        </a>

        <ul class="submenu <?php if ($currentPage == 'item-list' || $currentPage == 'supplier-list' || $currentPage == 'customer-list') {
                              echo "active";
                            } else {
                              echo "noactive";
                            } ?>">
          <li class="submenu-item <?php if ($currentPage == 'item-list') {
                                    echo "active";
                                  } ?>">
            <a href="item-list">Items list</a>
          </li>
          <li class="submenu-item <?php if ($currentPage == 'supplier-list') {
                                    echo "active";
                                  } ?>">
            <a href="supplier-list">Supplier list</a>
          </li>

          <li class="submenu-item <?php if ($currentPage == 'customer-list') {
                                    echo "active";
                                  } ?>">
            <a href="customer-list">Customer list</a>
          </li>

        </ul>

      </li>

      <li class="sidebar-item <?php if ($currentPage == 'financial-management') {
                                echo "active";
                              } else {
                                echo "noactive";
                              } ?>">
        <a href="financial-management" class='sidebar-link'>
          <i class="bi bi-file-earmark-spreadsheet-fill"></i>
          <span>Financial Management</span>
        </a>
      </li>

      <!-- Inventory inquiry -->
      <li class="sidebar-item <?php if ($currentPage == 'stock-list') {
                                echo "active";
                              } else {
                                echo "noactive";
                              } ?>">
        <a href="stock-list" class='sidebar-link'>
          <i class="bi bi-file-earmark-spreadsheet-fill"></i>
          <!-- <span>Inventory inquiry</span> -->
          <span>Stock list</span>
        </a>

        <!-- <ul class="submenu <?php if ($currentPage == 'stock-list') {
                                  echo "active";
                                } else {
                                  echo "noactive";
                                } ?>">
            <li class="submenu-item <?php if ($currentPage == 'stock-list') {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>">
                    <a href="stock-list">Stock list</a>
                </li>
            </ul> -->
      </li>

      <!-- Purchase -->
      <li class="sidebar-item <?php if ($currentPage == 'purchase-list') {
                                echo "active";
                              } else {
                                echo "noactive";
                              } ?>">
        <a href="purchase-list" class='sidebar-link'>
          <i class="bi bi-file-earmark-spreadsheet-fill"></i>
          <span>Purchase</span>
        </a>

        <!-- <ul class="submenu <?php if ($currentPage == 'purchase-list') {
                                  echo "active";
                                } else {
                                  echo "noactive";
                                } ?>">
                <li class="submenu-item <?php if ($currentPage == 'purchase-list') {
                                          echo "active";
                                        } ?>">
                <a href="purchase-list">Purchase schedule</a>
                </li>
            </ul> -->
      </li>

      <!-- Sales -->
      <li class="sidebar-item <?php if ($currentPage == 'sales' || $currentPage == 'branch') {
                                echo "active";
                              } else {
                                echo "noactive";
                              } ?>">
        <a href="sales" class='sidebar-link'>
          <i class="bi bi-file-earmark-spreadsheet-fill"></i>
          <span>Sales</span>
        </a>

        <!-- <ul class="submenu <?php if ($currentPage == 'sales' || $currentPage == 'branch') {
                                  echo "active";
                                } else {
                                  echo "noactive";
                                } ?>">
                <li class="submenu-item <?php if ($currentPage == 'sales') {
                                          echo "active";
                                        } else {
                                          echo "noactive";
                                        } ?>">
                <a href="sales">sales record</a>
                </li>
            </ul> -->
      </li>

      <!-- Inbound -->
      <li class="sidebar-item <?php if ($currentPage == 'inbound-list') {
                                echo "active";
                              } else {
                                echo "noactive";
                              } ?>">
        <a href="inbound-list" class='sidebar-link'>
          <i class="bi bi-file-earmark-spreadsheet-fill"></i>
          <span>Inbound</span>
        </a>

        <!-- <ul class="submenu <?php if ($currentPage == 'inbound-list') {
                                  echo "active";
                                } else {
                                  echo "noactive";
                                } ?>">
                <li class="submenu-item <?php if ($currentPage == 'inbound-list') {
                                          echo "active";
                                        } ?>">
                    <a href="inbound-list">Inbound schedule</a>
                </li>
            </ul> -->
      </li>

      <!-- Outbound -->
      <li class="sidebar-item <?php if ($currentPage == 'outbound-schedule') {
                                echo "active";
                              } ?>">
        <a href="outbound-schedule" class='sidebar-link'>
          <i class="bi bi-file-earmark-spreadsheet-fill"></i>
          <span>Outbound</span>
        </a>

        <!-- <ul class="submenu <?php if ($currentPage == 'outbound-schedule') {
                                  echo "active";
                                } ?>">
                <li class="submenu-item <?php if ($currentPage == 'outbound-schedule') {
                                          echo "active";
                                        } ?>">
                    <a href="outbound-schedule">Outbound schedule</a>
                </li>
            </ul> -->
      </li>


      <!-- User management -->
      <?php
      $sql_access_level_check = "SELECT access_level FROM position, employee, account  WHERE position.position_id=employee.position_id AND employee.employee_id=account.employee_id AND account.username='" . $_SESSION['username'] . "'";
      $result_access_level_check = $conn->query($sql_access_level_check);
      $row_access_level_check = $result_access_level_check->fetch_assoc();
      if ($row_access_level_check['access_level'] != 'Low') {
      ?>
        <li class="sidebar-item has-sub <?php if ($currentPage == 'user-management' || $currentPage == 'position-management') {
                                          echo "active";
                                        } else {
                                          echo "noactive";
                                        } ?>">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
            <span>User management</span>
          </a>

          <ul class="submenu <?php if ($currentPage == 'user-management' || $currentPage == 'position-management') {
                                echo "active";
                              } else {
                                echo "noactive";
                              } ?>">
            <li class="submenu-item <?php if ($currentPage == 'user-management') {
                                      echo "active";
                                    } ?>">
              <a href="user-management">User Management</a>
            </li>
            <?php
            if ($row_access_level_check['access_level'] != 'Medium') {
            ?>
              <li class="submenu-item <?php if ($currentPage == 'position-management') {
                                        echo "active";
                                      } ?>">
                <a href="position-management">Position Management</a>
              </li>
            <?php
            } else if ($restrict_mid_access == true) {
              header("location: index");
            }
            ?>
          </ul>
        </li>
      <?php
      } else if ($restrict_low_access == true) {
        header("location: index");
      }
      mysqli_close($conn);
      ?>

      <li class="sidebar-item  ">
        <?php if (isset($_SESSION['username'])) { ?>
          <p> <a class="btn btn-outline-danger btn-block" href="index.php?logout='1'">Log out</a> </p>
        <?php } else { ?>
          <p> <a class="btn btn-outline-primary btn-block" href="login">Login</a> </p>
        <?php } ?>
      </li>

    </ul>
  </div>

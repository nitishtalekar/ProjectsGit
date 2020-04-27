<?php 

?>


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Visit -->
    <div class="input-group">
        <a href="index.php" target="_blank" class="btn btn-primary" type="submit">
          <i class="fas fa-eye"></i> Visit Website
        </a>
    </div>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-eye"></i> Visit Website
              </button>
      </div>
    </li>


    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 prof"><?=$_SESSION['admin_name']?></span>
        <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passModal">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Change Password
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="submit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <form class="" action="" method="post">
        <button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancel</button> 
        <button class="btn btn-primary" name="logout" type="submit">Logout</button>          
      </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="passModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passModalLabel">Change Password?</h5>
        <button class="close" type="submit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div>
        <form class="" action="" method="post">
          <div class="mt-3">
            <center>
          <!-- <input type="text" class="form-control bg-light border-0 small" name="oldpwd" style="width:80%;" placeholder="Enter Old Password"><br> -->
          <input type="text" class="form-control bg-light border-0 small" name="newpwd" style="width:80%;" placeholder="Enter New Password"><br>
          <input type="text" class="form-control bg-light border-0 small" name="cnewpwd" style="width:80%;" placeholder="Confirm New Password"><br>
        <button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" name="change_pwd" type="submit">Change</button>          
      </center>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
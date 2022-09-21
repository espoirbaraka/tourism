<header class="main-header">
  <!-- Logo -->
  <a href="index" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>K</b>T</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>KIVU-TOUR</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($user['Photo'])) ? 'img/'.$user['Photo'] : 'img/user.png'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $user['Username']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo (!empty($user['Photo'])) ? 'img/'.$user['Photo'] : 'img/user.png'; ?>" class="img-circle" alt="User Image">

              <p>
                <?php
                echo $user['Username'];
                 ?>
                <small>Membre depuis <?php echo date('M. Y', strtotime($user['Created_On'])); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Modifier</a>
              </div>
              <div class="pull-right">
                <a href="./logout" class="btn btn-default btn-flat">Déconnexion</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'modal/profile.php'; ?>

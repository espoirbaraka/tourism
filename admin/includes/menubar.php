<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->

    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? 'img/'.$user['photo'] : 'img/user.png'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php //echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Enline</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">GESTION</li>
      <li><a href="home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
            <a href="#">
                <i class="fa fa-list"></i>
                <span>Publication</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="publication"><i class="fa fa-circle-o"></i> Publication</a></li>
                <li><a href="commentaire"><i class="fa fa-circle-o"></i> Commentaire</a></li>
            </ul>
        </li>
      <li class="header">PARAMETRES</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i>
          <span>Paramètres</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="user"><i class="fa fa-circle-o"></i> Utilisateur</a></li>
            <li><a href="thematique"><i class="fa fa-circle-o"></i> Thematique</a></li>
        </ul>
      </li>
      

      
      <!-- <li><a href="chart"><i class="fa fa-comment"></i> <span>Chart</span></a></li> -->

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

        <div class="col-md-3 left_col menu_fixed" <?php echo "style='background-color:#ffb300 !important'"; ?> >
          <div class="left_col scroll-view" id='menu'>
            <div class="clearfix"></div>

            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="resources/img/<?php echo $_SESSION['Image']; ?>" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h4 style='color:black;'><strong> <?php echo $_SESSION['FirstName']." ". $_SESSION['LastName']  ?></strong></h4>
                <h5><a href="<?php echo base_url('login/logout'); ?>"  style='text-decoration: none;color:white' >Cerrar Sesión</a></h5>
              </div>
            </div>

            <br />

            <!-- sidebar menu -->
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section" >
                <h3 style='color:black;' >Menú</h3>
                <ul class="nav side-menu">
                  <li id='Inicio'><a href="<?php echo base_url('home'); ?>" style='color:white;'><i class="fa fa-home"></i> Inicio </a></li>
                  <li id='Registro'><a href="<?php echo base_url('rent'); ?>" style='color:white;'><i class="fa fa-list-alt"></i> Registro </a></li>
                  <li id='Usuario' style='display:none;color:black;' <?php if($_SESSION['ID_UserType'] == 2){ echo "style='display:none;'"; }  ?>><a href="<?php echo base_url('Users'); ?>"><i class="fa fa-users"></i> Usuarios </a></li>
                  <li id='Habitacion' <?php if($_SESSION['ID_UserType'] == 2){ echo "style='display:none;color:white;'"; }  ?>><a href="<?php echo base_url('room'); ?>"><i class="fa fa-th-list"></i> Habitaciones </a></li>
                  <li id='Perfil' style='display:none'><a href="<?php echo base_url('user'); ?>"><i class="fa fa-user"></i> Mi Perfil </a></li>
                </ul>
              </div>
            </div>

            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu hamburgesa" style='display:none';>
            <nav>
              <img src="resources/img/<?php echo $_SESSION['Image']; ?>" class="img-circle" style="margin-left: 8px; margin-top: 4px;" width="40px" height="40px" alt=""><span style="margin-left: 7px;"><?php echo $_SESSION['FirstName']." ". $_SESSION['LastName']; ?></span>
              <button class="navbar-toggle collapsed" style="border: 1px solid #eeeeee !important;background-color:lightgray !important;" type="button" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
                <span class="icon-bar" style="background-color: white;"></span>
                <span class="icon-bar" style="background-color: white;"></span>
                <span class="icon-bar" style="background-color: white;"></span>
              </button>
              <div class="navbar-collapse collapse" id="navbar-main" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav text-right" >
                <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home"></i> Inicio </a></li>
                <li><a href="<?php echo base_url('Rent'); ?>"><i class="fa fa-list-alt"></i> Registro </a></li>
                <li style='display:none' <?php if($_SESSION['ID_UserType'] == 2){ echo "style='display:none;'"; }  ?>><a href="<?php echo base_url('Users'); ?>"><i class="fa fa-users"></i> Usuarios </a></li>
                <li <?php if($_SESSION['ID_UserType'] == 2){ echo "style='display:none;'"; }  ?>><a href="<?php echo base_url('Room'); ?>"><i class="fa fa-th-list"></i> Habitaciones </a></li>               
                 <li style='display:none'><a href="<?php echo base_url('User'); ?>"><i class="fa fa-user"></i> Mi Perfil </a></li>            
                  <li><a  href="<?php echo base_url('Logint/logout'); ?>" ><i class="fa fa-sign-out"></i>Cerrar Sesión</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->




   <div class="right_col" role="main" style='height: 611px !important;    background-color: white;'>
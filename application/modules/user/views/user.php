

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_content">
    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
      <div class="profile_img">
        <div id="crop-avatar">
          <!-- Current avatar -->
          <img class="img-responsive avatar-view" src="resources/img/<?php echo $_SESSION['Image']; ?>" alt="Avatar" title="Change the avatar">
        </div>
      </div>
      <h3>Samuel Doe</h3>

      <ul class="list-unstyled user_data">
        <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
        </li>

        <li>
          <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
        </li>

        <li class="m-top-xs">
          <i class="fa fa-external-link user-profile-icon"></i>
          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
        </li>
      </ul>

      <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
      <br />

    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">

      <div class="profile_title">
        <div class="col-md-6">
          <h2>Seguimiento de Registros</h2>
        </div>
        <div class="col-md-6">
          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
          </div>
        </div>
      </div>
      <!-- start of user-activity-graph -->
      <div id="graph_bar" style="width:100%; height:280px;"></div>
      <!-- end of user-activity-graph -->

    </div>
  </div>
</div>
</div>

<script>


</script>

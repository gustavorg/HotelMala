<div class="">

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
        <button type="button" style='left: 214px;' id="createuser" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" >Nuevo Usuario</button>                               

          <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            
          </div>
          <div class="clearfix"></div>
                  <div class="x_content">
                    <div class='table-responsive'>
                    <table class="table dt-responsive nowrap datatable-user" cellspacing="0" width="100%" style='text-align: center;'>
                      <thead style='background:white;'>
                        <tr>
                          <th style='width:40px;'></th>
                          <th style='width:30px;text-align: center;'>Apellidos y Nombres</th>
                          <th style='text-align: center;'>DNI</th>
                          <th style='text-align: center;'>Tipo</th>
                          <th style='text-align: center;'>Telefono</th>
                          <th style='width:20px;text-align: center;'></th>
                          <th style='width:20px;text-align: center;'></th>
                        </tr>
                      </thead>
                      <tbody style='background-color:white'>
                      </tbody>
                    </table>
                  </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="modal fade bs-example-modal-sm" id="modaluser"  tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm" >
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2"></h4>
                              </div>

                              
                            <form id="NewUser" > 
                              <div class="modal-body" >
                                <div class='row'>
                                  
                                  <div class="col-md-12 col-sm-6 col-xs-12">
																				<div class="x_content">
																					<div class="" role="tabpanel" data-example-id="togglable-tabs">
																						
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
																							<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Información</a>

                                              </li>
																							<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Turnos</a>
																							
                                              </li>
																						</ul>
																						<div id="myTabContent" class="tab-content">
																							<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                              <input type='hidden' name='ID_User' id='ID_User'>
                                              <fieldset>
                                                  <div class="form-group">
                                                    <label for="N" class="control-label col-md-3 col-sm-6 col-xs-12">Usuario</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                      <input class="form-control col-md-7 col-xs-12 text-left" type="text" id="Username" name="Username" required>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                                <fieldset>
                                                  <div class="form-group">
                                                    <label for="N" class="control-label col-md-3 col-sm-6 col-xs-12">Clave</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                      <input class="form-control col-md-7 col-xs-12 text-left" type="password" id="Password" name="Password" required>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                                <fieldset>
                                                  <div class="form-group">
                                                    <label for="N" class="control-label col-md-3 col-sm-6 col-xs-12">DNI</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                      <input class="form-control col-md-7 col-xs-12 text-right" type="number" id="DNI" name="DNI" required>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                                <fieldset>
                                                  <div class="form-group">
                                                    <label for="N" class="control-label col-md-3 col-sm-6 col-xs-12">Apellidos</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                      <input class="form-control col-md-7 col-xs-12" type="text" id="Lastname"  name="Lastname" required>
                                                    </div>
                                                  </div>
                                                </fieldset> 
                                                <fieldset>
                                                  <div class="form-group">
                                                    <label for="N" class="control-label col-md-3 col-sm-6 col-xs-12">Nombres</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                      <input class="form-control col-md-7 col-xs-12" type="text" id="Firstname"  name="Firstname" required >
                                                    </div>
                                                  </div>
                                                </fieldset> 
                                                <fieldset>
                                                  <div class="form-group">
                                                    <label for="N" class="control-label col-md-3 col-sm-6 col-xs-12">Tipo</label>
                                                    <div class='col-md-9 col-sm-6 col-xs-12'>
                                                      <select class='form-control' id='ID_UserType' name='ID_UserType' required >
                                                        <option value='0'>------------</option>
                                                        <option value='1'>Administrador</option>
                                                        <option value='2'>Operario</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                                <fieldset>
                                                  <div class="form-group">
                                                    <label for="N" class="control-label col-md-3 col-sm-6 col-xs-12">Celular</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                      <input class="form-control col-md-7 col-xs-12 text-right" type="number" id="Phone" name="Phone" required>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                                <fieldset>
                                                  <div class="form-group">
                                                    <label for="N" class="control-label col-md-3 col-sm-6 col-xs-12">Estado</label>
                                                    <div class='col-md-9 col-sm-6 col-xs-12'>
                                                      <input type="checkbox" name='State' id='State' class="js-switch"  checked/> En Curso
                                                    </div>
                                                  </div>
                                                </fieldset>                			
																							</div>
																							<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                <div role="alert" class="alert alert-success">
                                                  <strong>Atención!</strong><br>
                                                  Antes de ingresar los turnos de este usuario, debe guardar.
                                                </div>
																							</div>
																						</div>
																					</div>
																				</div>
																		</div>
                                  
                                  </div>  

                              
  
                                </div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-warning" id='cerrar' data-dismiss="modal"  >Cerrar</button>
																	<button type='button' id="save"  class="btn btn-success"  >Guardar</button>
																</div>
                          </form>

                            </div>
                          </div>
</div>




<script>

/*
function listUsers(){
  
  $.ajax({
          url: "<?php echo base_url('User/selectAll'); ?>",
          type: "get",
          success: function (response) {
              var i = 0;
              var data = "";
             for(i;i< response.length; i++){
                var foto = "";
                if(response[i].Image == ""){ foto = "user.png"; }else{ foto = response[i].Image ; }

                data =  data + "<div class='col-md-4 col-sm-4 col-xs-12 profile_details'>" +
                          "<div class='well profile_view'>"+
                            "<div class='col-sm-12'>" +
                             "<h4 class='brief'><i>" + response[i].UserType + "</i></h4>" +
                              "<div class='left col-xs-7'>" +
                                "<h2>" + response[i].FirstName  + ' ' + response[i].LastName + "</h2>" +
                                "<ul class='list-unstyled'>" +
                                  "<li><i class='fa fa-info-circle'></i> DNI: " + response[i].DNI + "</li>" +
                                  "<li><i class='fa fa-phone'></i> Teléfono: " + response[i].Phone + "</li>" +
                                "</ul>" +
                              "</div>" +
                              "<div class='right col-xs-5 text-center'>" +
                                "<img src='resources/img/" + foto + "' alt='' class='img-circle img-responsive'> " +
                              "</div>" +
                            "</div>" +
                            "<div class='col-xs-12 bottom text-center'>" +
                           "<div class='col-xs-12 col-sm-6 emphasis'>"+
                            "<button type='button'  onclick=\"deleteUser( " + response[i].ID_User + ")\"  class='btn btn-danger btn-xs'> <i class='fa fa-delete'>"+
                             "</i> <i class='fa fa-times'></i> </button>" + 
                            "<button type='button' id='edituser' onclick=\"editUser( " + response[i].ID_User + ")\" class='btn btn-primary btn-xs'>"+
                              "<i class='fa fa-user'> </i> Editar"+
                            "</button>" +
                          "</div>" +
                        "</div>" +
                      "</div>" +
                    "</div>";
             }

             $('#listusers').html(data);

          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });



}
*/

function listUsers(){
  // Mostar en la tabla la lista de cuartos en uso
  
   var users = []; var jsonString = "";
  $.ajax({
          url: "<?php echo base_url('user/selectAll'); ?>",
          type: "get",
          success: function (response) {
              var i = 0;
             for(i;i< response.length; i++){
              var foto = "";
                if(response[i].Image == ""){ foto = "user.png"; }else{ foto = response[i].Image ; }
              users.push({ "Image" : "<img src='resources/img/" + foto + "' alt='' class='img-circle img-responsive' style='width:40px;height:40px;' >",
                           "Name" :  response[i].LastName + " " + response[i].FirstName,
                           "DNI" :  response[i].DNI,
                           "Tipo":  response[i].UserType,
                           "Telefono" : response[i].Phone,
                           "Edit" : "<a href='#' onclick=\"editUser( " + response[i].ID_User + ")\"  <span class='fa fa-pencil' ></span></a>",
                           "Delete": "<a href='#'  onclick=\" deleteUser("+ response[i].ID_User + ") \" <span class='fa fa-trash' ></span></a>" });
              }

              $( ".datatable-user" ).DataTable({
                "data" : users,
                "columns": [
                { "data": "Image" },
                { "data": "Name" },
                { "data": "DNI" },
                { "data": "Tipo" },
                { "data": "Telefono" },
                { "data": "Edit" },
                { "data": "Delete" }
              ],
              "language": {
                    "lengthMenu": "Vista _MENU_ Habitaciones",
                    "zeroRecords": "No existe habitación registrado",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No se registró",
                    "infoFiltered": "( from _MAX_ total records)",
                    "search":         "Buscar:",
                    "paginate": { 
                                "first":      "Primero",
                                "last":       "Último",
                                "next":       "Siguiente",
                                "previous":   "Anterior"
                                }
                },
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                
              });
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });



}


$(document).ready(function(){

  listUsers();

});

$('#save').click(function(){
  
    var user = $('#NewUser').serialize();
    $.ajax({
          url: "<?php echo base_url('user/update'); ?>",
          type: "post",
          data: user ,
          success: function (response) {
        
                
                var dataTable = $('.datatable-user').DataTable();
                    dataTable.destroy(); 
                   listUsers();
                $('#modaluser').modal('hide');
               
                if(!$('#NewUser #ID_User').val()){
                  mensaje("Correcto!", "Se registró el usuario correctamente","success");
                }else{
                  mensaje("Correcto!", "Se actualizó el usuario correctamente","success");
                }


          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });


});

$('#createuser').click(function(){
  $("#myModalLabel2").text("Nuevo Usuario");
  $('#modaluser select').val(0);
  $('#modaluser input').val("");
});

function editUser(ID_User){

  $("#myModalLabel2").text("Editar Usuario");
  $('#NewUser #ID_User').val(ID_User);

  $.ajax({
          url: "<?php echo base_url('user/select'); ?>" + "/" + ID_User,
          type: "get",
          success: function (response) {
            $('#NewUser #Username').val(response[0].Username);
            $('#NewUser #Password').val(response[0].Password);
            $('#NewUser #DNI').val(response[0].DNI);
            $('#NewUser #Firstname').val(response[0].FirstName);
            $('#NewUser #Lastname').val(response[0].LastName);
            $('#NewUser #ID_UserType').val(response[0].ID_UserType);
            $('#NewUser #Phone').val(response[0].Phone);
            if(response[0].State){
              $('#State').attr('checked',true);
            }else{
              $('#State').attr('checked',false);
            }
          }
  });
  $('#modaluser').modal('show');

}

function deleteUser(ID_User){

  $.ajax({
          url: "<?php echo base_url('user/delete'); ?>" + "/" + ID_User,
          type: "get",
          success: function (response) {
            if(response){
              var dataTable = $('.datatable-user').DataTable();
                dataTable.destroy(); 
                listUsers();
                mensaje("Correcto!", "Se eliminó el usuario correctamente","success");
            }
          }
  });

}




</script>


          <button type="button" style='left: 214px;' class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" >Nueva Habitación</button>                               
                  <div class="x_content">
                    <div class='table-responsive'>
                    <table class="table dt-responsive nowrap datatable-room" cellspacing="0" width="100%" style='text-align: center;'>
                      <thead style='background:white;'>
                        <tr>
                          <th style='width:30px;text-align: center;'>Habitación</th>
                          <th style='text-align: center;'>Tipo</th>
                          <th style='text-align: center;'>Precio - Dia</th>
                          <th style='text-align: center;'>Precio - Hora</th>
                          <th style='text-align: center;'>Hotel</th>
                          <th style='width:20px;text-align: center;'></th>
                          <th style='width:20px;text-align: center;s'></th>
                        </tr>
                      </thead>
                      <tbody style='background-color:white'>
                      </tbody>
                    </table>
                  </div>

                  
              <div class="modal fade bs-example-modal-sm" id="newroom"  tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm" style='width:500px !important'>
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="titulo"></h4>
                              </div>
                              <div class="modal-body" >
                              <form id="Room" >
                                <input type='hidden' id='ID_Room' name='ID_Room' >
                                <fieldset>
                                  <div class="form-group">
                                    <label for="N" class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12 text-right" type="number" id="N"  name="N"  min="1">
                                    </div>
                                    <label class='control-label col-md-2 col-sm-3 col-xs-12'>Tipo</label>
                                    <div class='col-md-4 col-sm-3 col-xs-12'>
                                      <select class='form-control' id='ID_RoomType' name='ID_RoomType'  >
                                        <option value='0'>------------</option>
                                        <option value='1'>Simples</option>
                                        <option value='2'>Matrimonial</option>
                                        <option value='3'>Dobles</option>
                                        <option value='4'>Camarotes</option>
                                        <option value='5'>Queen</option>
                                      </select>
                                    </div>
                                  </div>
                                </fieldset>                            
                                <fieldset>
                                  <div class='form-group'>
                                  <label class='control-label col-md-3 col-sm-3 col-xs-12'>Hotel</label>
                                    <div class='col-md-3 col-sm-3 col-xs-12'>
                                      <select class='form-control' id='ID_Hotel' name='ID_Hotel'  >
                                        <option value='0'>------------</option>
                                        <option value='1'>Aura</option>
                                        <option value='2'>Cris</option>
                                      </select>
                                    </div>
                                    <label class='control-label col-md-3 col-sm-3 col-xs-12'>Precio Día</label>
                                    <div class='col-md-3 col-sm-9 col-xs-12'>
                                      <input type='number' class='form-control text-right' step='0.01' id='PriceDay' name='PriceDay' min='0.01' >
                                    </div>
                                  </div>
                                </fieldset>
                                <fieldset>
                                  <div class='form-group'>
                                    <label class='control-label col-md-3 col-sm-3 col-xs-12'>Precio Hora</label>
                                    <div class='col-md-3 col-sm-9 col-xs-12'>
                                      <input type='number' class='form-control text-right' step='0.01' id='PriceHour' name='PriceHour' min='0.01' >
                                    </div>
                                  </div>
                                </fieldset>
                                <fieldset>
                                  <div class='form-group'>
                                    <label class='control-label col-md-3 col-sm-3 col-xs-12'>Info</label>
                                    <div class='col-md-9 col-sm-9 col-xs-12'>
                                      <input type='text' class='form-control'  id='Caracteristicas' name='Caracteristicas'></textarea>
                                    </div>
                                  </div>
                                </fieldset>
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

function listarTableRoom(){
  // Mostar en la tabla la lista de cuartos en uso
  
   var rooms = []; var jsonString = "";
  $.ajax({
          url: "<?php echo base_url('Room/listRoom'); ?>",
          type: "get",
          success: function (response) {
              var i = 0;
             for(i;i< response.length; i++){
              rooms.push({ "N" :  response[i].N,
                           "RoomType" :  response[i].RoomType,
                           "PriceDay" : response[i].PriceDay, 
                           "PriceHour":  response[i].PriceHour,
                           "Hotel" : response[i].Hotel,
                           "Edit" : "<a href='#' onclick=\" edit(" + response[i].ID_Room + "," +
                                                                      response[i].N + "," + 
                                                                      response[i].ID_RoomType + "," + 
                                                                      response[i].PriceDay + "," + 
                                                                      response[i].PriceHour + "," +  
                                                                      response[i].ID_Hotel + ",'"+
                                                                      response[i].Caracteristicas+"' ) \" <span class='fa fa-pencil' ></span></a>",
                           "Delete": "<a href='#'  onclick=\" delRoom("+ response[i].ID_Room + ") \" <span class='fa fa-trash' ></span></a>" });
              }

              $( ".datatable-room" ).DataTable({
                "data" : rooms,
                "columns": [
                { "data": "N" },
                { "data": "RoomType" },
                { "data": "PriceDay" },
                { "data": "PriceHour" },
                { "data": "Hotel" },
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

function clearNewRoom(){
  $('#PriceDay').val("");
  $('#PriceHour').val("");
  $('#N').val("");
  $('#ID_Hotel').val(0);
  $('#ID_RoomType').val(0);
  $('#ID_Room').val("");
  $('#Caracteristicas').val("");
  $('#titulo').text("Nueva Habitación");
}

$(document).ready(function(){
  
  listarTableRoom();
  $('#titulo').text("Nueva Habitación");

});


function edit(ID_Room,N,ID_RoomType,PriceDay,PriceHour,ID_Hotel,Caracteristicas){
  
  $('#titulo').text("Editar Habitación");
  $('#ID_Room').val(ID_Room);
  $('#N').val(N);
  $('#PriceDay').val(PriceDay);
  $('#PriceHour').val(PriceHour);
  $('#ID_Hotel').val(ID_Hotel);
  $('#ID_RoomType').val(ID_RoomType);
  $('#Caracteristicas').val(Caracteristicas);
  $('#newroom').modal('show');
}

function delRoom(ID_Room){
  $.ajax({
          url: "<?php echo base_url('Room/deleteRoom'); ?>" + '/' + ID_Room ,
          type: "post",
          success: function (response) {
              if(response){
                var dataTable = $('.datatable-room').DataTable();
                dataTable.destroy(); 
                listarTableRoom();
                mensaje("Correcto!", "Se eliminó la habitación correctamente","success");
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });
}

$('#cerrar').click(function(){
  clearNewRoom();
});

$('#save').click(function(){
    var rent = $('#Room').serialize();
    $.ajax({
          url: "<?php echo base_url('Room/updateRoom'); ?>",
          type: "post",
          data: rent ,
          success: function (response) {
              if(response){
              
                var dataTable = $('.datatable-room').DataTable();
                dataTable.destroy(); 
                listarTableRoom();
                $('#newroom').modal('hide');
                if(!$('#Room #ID_Room').val()){
                  mensaje("Correcto!", "Se registró la habitación correctamente","success");
                }else{
                  mensaje("Correcto!", "Se actualizó el habitación correctamente","success");
                }


                clearNewRoom();
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });
});
</script>

             
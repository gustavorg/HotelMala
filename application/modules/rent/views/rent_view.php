
			<!--		<div id='preloader' class='panel-body loader-demo' style='left: 0px;top: 143px;right: 0px;padding: 5% !important;
          	z-index: 995;	position: absolute;text-align: -webkit-center;display:none;'>
            <img src="<?php echo base_url('resources/img/preloader.gif'); ?>" width="70px" height="70px">
          </div> -->
<div class="" id="sinpreloader">
            <div class='row'>
              <div class="col-md-6 text-left">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Lista de Habitaciones</button>
              </div>
              <div class="col-md-6 text-right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" v-on="click: clear">Nuevo Alquiler</button>                               
              </div>
            </div>

            <div class="clearfix"></div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class='table-responsive'>
                    <table id="datatable-rent" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead style='background:white;'>
                        <tr>
                          <th>Apellidos y Nombres</th>
                          <th>DNI</th>
                          <th>Habitación</th>
                          <th>Tipo</th>
                          <th>Dias / Horas</th>
                          <th>Pago</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
          </div>

                        <div class="modal fade bs-example-modal-sm" id='newRent'  tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Nuevo Alquiler</h4>
                              </div>
                              <div class="modal-body" >
                              <form id='Rent' >
                              <fieldset>
                                 <div class="form-group">
                                   <label for="DNI" class="control-label col-md-3 col-sm-3 col-xs-12">DNI</label>
                                   <div class="col-md-7 col-sm-6 col-xs-12">
                                     <input id="DNI" class="form-control col-md-7 col-xs-12" type="text" id="DNI"  name="DNI"  maxlength="8">
                                   </div>
                                   <div class="col-md-2">
                                     <button type='button' style='background-color: transparent;border-width: inherit;' id="ValidateDNI"><em class="fa fa-eye" ></em></button>
                                   </div>
                                 </div>
                               </fieldset> 
                             <div id="BloquearsinDNI">                                
                               <fieldset>
                                 <div class="form-group">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Apellidos</label>
                                     <div class="col-md-9 col-sm-6 col-xs-12 text-right">
                                       <input type="text" id='lastname' name="lastname"  required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                                     </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Nombres</label>
                                   <div class="col-md-9 col-sm-6 col-xs-12">
                                     <input type="text"  id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Cuarto</label>
                                   <div class='col-md-9 col-sm-9 col-xs-12'>
                                     <select class='form-control' id='ID_Room' name='ID_Room'  >
                                       <option value='0' >--Seleccione--</option>
                                     </select>
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <div class="text-center">
                                 <label class="radio-inline">
                                   <input type="radio" name="Temporal" value=0 checked>Días
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="Temporal" value=1>Horas
                                 </label>
                                 </div>
                               </fieldset>                                  
                               <fieldset>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Inicio</label>
                                   <div class="col-md-9 col-sm-6 col-xs-12">
                                    <input type="date"  value="<?php echo date("Y-m-d");?>" class="form-control col-md-7 col-xs-12"  name="DateFrom" >
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Fin</label>
                                   <div class="col-md-9 col-sm-6 col-xs-12">
                                   <input type="date" value="<?php echo date("Y-m-d");?>" class="form-control col-md-7 col-xs-12"  name="DateTo" >
                                  </div>
                                 </div>
                               </fieldset>
                               <fieldset id="RentToHours" style="display:none">
                                 <div class="form-group">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Horas</label>
                                     <div class="col-md-5 col-sm-6 col-xs-6 text-right">
                                       <input type="number" min="0" id='nHoras' name="nHoras"  class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                                     </div>
                                 </div>
                               </fieldset>

                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-warning" data-dismiss="modal"  >Close</button>
                             <button type='button' id="save"  class="btn btn-success"  >Guardar</button>
                           </div>
                              <div class="alert alert-danger alert-dismissible fade in" id="errorDNI" style="display:none;" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Error!</strong>El DNI no tiene datos.
                                  </div>
                            </form>

                            </div>
                          </div>

                        </div>

                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Lista de Habitaciones</h4>
                              </div>
                              <div class="modal-body">
                                 <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apellidos</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12 text-right">
                                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombres</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">DNI</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" data-parsley-id="9">
                                      </div>
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Guardar</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>



<script src="<?php echo base_url('resources/js/RENIEC.js'); ?>"></script>
<script>
// autor ... http://personal-de-jall.webcindario.com
// contacto ... ja_lopezl@yahoo.es
// estas dos variables se pueden modificar para
// adaptarlas a sus necesidades
//fecha de referencia del contador: fin del año 2008
var futuro = new Date(2019, 12, 31, 23, 60);
//actualiza el contador cada 4 segundos ( = 4000 milisegundos)
var actualiza = 1000;
// función que calcula y escribe el tiempo en días, horas, minutos y segundos
// que faltan para la variable futuro
/*function faltan() {
    var ahora = new Date();
    var faltan = futuro - ahora;
    // si todavís no es futuro
    if (faltan > 0) {
        var segundos = Math.round(faltan / 1000);
        var minutos = Math.floor(segundos / 60);
        var segundos_s = segundos % 60;
        var horas = Math.floor(minutos / 60);
        var minutos_s = minutos % 60;
        var dias = Math.floor(horas / 24);
        var horas_s = horas % 24;
        // escribe los resultados
        (segundos_s < 10) ? segundos_s = "0" + segundos_s : segundos_s = segundos_s;
        (minutos_s < 10) ? minutos_s = "0" + minutos_s : minutos_s = minutos_s;
        (horas_s < 10) ? horas_s = "0" + horas_s : horas_s = horas_s;
        (dias < 10) ? dias = "0" + dias : dias = dias;
        var resultado = dias + " dias : " + horas_s + " horas : " + minutos_s + " minutos : " + segundos_s + " segundos";
        document.getElementById("restante").innerHTML = resultado;
        //actualiza el contador
        setTimeout("faltan()", actualiza);
    }
    // estamos en el futuro
    else {
        document.formulario.reloj.value = "00 dias : 00 horas : 00 minutos : 00 segundos";
    }
}
faltan(); 
*/


  $('input[name=Temporal]').click(function(){
                  if($(this).is(':checked')  && $(this).val() == 1){
                    $('#RentToHours').css("display","block");
                  }else{
                    $('#RentToHours').css("display","none");
                  }
  });

 /* Get from elements values */

function listarTableRent(){
  // Mostar en la tabla la lista de cuartos en uso
  
   var rents = []; var jsonString = "";
  $.ajax({
          url: "<?php echo base_url('Rent/listRoomBusy'); ?>",
          type: "get",
          success: function (response) {
              var i = 0;
             for(i;i< response.length; i++){
              rents.push({ "Nom" :  response[i].Apellidos +' '+response[i].Nombre,
                           "DNI" :  response[i].DNI,
                           "ID_Room" : response[i].ID_Room, 
                           "RoomType":  response[i].RoomType,
                           "DateFrom": response[i].DateFrom,
                           "ID_Rent" : response[i].ID_Rent });
              }

              $( "#datatable-rent" ).DataTable({
                "data" : rents,
                "columns": [
                { "data": "Nom" },
                { "data": "DNI" },
                { "data": "ID_Room" },
                { "data": "RoomType" },
                { "data": "DateFrom" },
                { "data": "ID_Rent" }
              ],
              "language": {
                    "lengthMenu": "Vista _MENU_ alquileres",
                    "zeroRecords": "No existe alquiler registrado con esos caracteres",
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
  
  listarTableRent();
  // Mostar lista de Cuartos Habilitados
  $.ajax({
          url: "<?php echo base_url('Rent/listRoomAvailables'); ?>",
          type: "get",
          success: function (response) {
              var i = 0;var options = "";
              options = options + "<option value=0>-- Seleccione --</option>";
             for(i;i<= response.length - 1; i++){
                options = options + "<option value="+response[i].ID_Room+">"+ response[i].ID_Room +"</option>";
              }
            $('#ID_Room').html(options);
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });
});


  $('#save').click(function(){
    var rent = $('#Rent').serialize();
    $.ajax({
          url: "<?php echo base_url('Rent/saveRent'); ?>",
          type: "post",
          data: rent ,
          success: function (response) {
              if(response){
                $('#newRent').modal('hide');
                listarTableRent();
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
      });
  })
</script>

             
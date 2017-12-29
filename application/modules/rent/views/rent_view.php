
<style>

.disabled {
  pointer-events:none !important; 
  opacity:0.2 !important;        
}
</style>
<div id='loader' >
            <div class='row'>
            <div class="clearfix">
            <div id="reloj" />
              <div class="col-md-6 text-left">
                  <button type="button" class="btn btn-success" onclick="viewListRooms()" >Lista de Habitaciones</button>
              </div>
              <div class="col-md-6 text-right" >
                  <button type="button" class="btn btn-primary" onclick="newRent()" >Nuevo Alquiler</button>                               
              </div>
            </div>
            <br />
                  <div class="x_content">
                    <div class='table-responsive'>
                    <table class="table table-hover" id="table_rent" style='background-color:white;'>
                      <thead>
                        <tr>
                          <th>Apellidos y Nombres</th>
                          <th>DNI</th>
                          <th>Hab. - Tipo</th>
                          <th>Precio</th>
                          <th style="width:140px;text-align:center"><span class='fa fa-clock-o'></span></th>
                          <th style="width:20px"></th>
                          <th style="width:20px"></th>
                          <th style="width:20px"></th>
                        </tr>
                      </thead>
                      <tbody id="Rents">

                      </tbody>
                    </table>
                    <!--
                    <table class="table dt-responsive nowrap datatable-rent" cellspacing="0" width="100%">
                      <thead style='background:white;'>
                        <tr>
                          <th  style='width:80px;text-align:centerss'><span class='fa fa-user'></span> Apellidos - Nombres</th>
                          <th style='width:50px;text-align:center'>DNI</th>
                          <th style='width:30px;text-align:center'>Hab.</th>
                          <th style='width:30px;text-align:center'>Tipo</th>
                          <th style='width:30px;text-align:center'><span class='fa fa-calendar'></span> Desde</th>
                          <th style='width:30px;text-align:center'><span class='fa fa-calendar'></span> Hasta</th>
                          <th style='width:30px;text-align:center'></th>
                          <th style='width:20px'>Pago</th>
                          <th style='width:10px'></th>
                          <th style='width:10px'></th>
                        </tr>
                      </thead>
                      <tbody style='background-color:white'>
                      </tbody>
                    </table> -->
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
                                   <div class="col-md-9 col-sm-6 col-xs-12">
                                     <input id="DNI" class="form-control col-md-7 col-xs-12 text-right" type="text" id="DNI"  name="DNI"  maxlength="8">
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
                                 <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Celular</label>
                                   <div class="col-md-9 col-sm-6 col-xs-12">
                                     <input type="number"  id="Phone" name="Phone" required="required" class="form-control col-md-7 col-xs-12 text-right" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Tipos</label>
                                   <div class='col-md-9 col-sm-9 col-xs-12'>
                                     <select class='form-control' id='ID_RoomType' name='ID_RoomType'  >
                                       <option value='0' >--Seleccione--</option>
                                     </select>
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset id='blockRoom'>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Cuarto</label>
                                   <div class='col-md-9 col-sm-9 col-xs-12'>
                                     <select class='form-control' id='ID_Room' name='ID_Room' >
                                       <option value='0' >--Seleccione--</option>
                                     </select>
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <div class="text-center">
                                 <label class="radio-inline">
                                   <input type="radio" name="Temporal" value=0 >Días
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="Temporal" value=1 checked>Horas
                                 </label>
                                 </div>
                               </fieldset> 
                               <div id="RentToDays">                                 
                               <fieldset>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Inicio</label>
                                   <div class="col-md-9 col-sm-6 col-xs-12">
                                    <input type="date"  value="<?php echo date("Y-m-d");?>" min="<?php echo date("Y-m-d");?>" class="form-control col-md-7 col-xs-12"  name="DateFrom" >
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Fin</label>
                                   <div class="col-md-9 col-sm-6 col-xs-12">
                                   <input type="date"  value="<?php echo date("Y-m-d",strtotime("+2 days"));?>" min="<?php echo date("Y-m-d",strtotime("+2 days"));?>" class="form-control col-md-7 col-xs-12"  name="DateTo" >
                                  </div>
                                 </div>
                               </fieldset>
                               </div>
                               <fieldset id="RentToHours" style="display:none">
                                 <div class="form-group">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Horas</label>
                                     <div class="col-md-5 col-sm-6 col-xs-6 text-right">
                                     <select  id='nHoras' name="nHours" class="form-control" >
                                      <option>--</option>
                                      <option value="1" >1</option>
                                      <option value="2" >2</option>
                                      <?php 
                                        for($i = 12;$i<= 48;$i=$i+12){
                                          echo "<option value='".$i."' >".$i."</option>";
                                        }
                                      
                                      ?>
                                   </select>
                                    </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Modo Pago</label>
                                 <div class="col-md-9 col-sm-6 col-xs-6">
                                  <label class="radio-inline">
                                    <input type="radio" name="ID_PaymentType" value=0 checked>Efectivo
                                  </label>
                                  <label class="radio-inline">
                                    <input type="radio" name="ID_PaymentType" value=1>VISA
                                  </label>
                                 </div>
                               </fieldset>
                               <fieldset>
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Servicio Comida</label>
                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                  <label class="radio-inline">
                                    <input type="checkbox" name="ServiceFood" value=1 >
                                  </label>
                                 </div>
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Precio</label>
                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                  <label id="MontoaCobrar"></label>
                                 </div>
                               </fieldset>
                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-warning" data-dismiss="modal"  >Cerrar</button>
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

                        <div class="modal fade bs-example-modal-sm" id="ViewlistRooms" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Lista de Habitaciones</h4>
                              </div>
                              <div class="modal-body">
                                <span id="listRooms" ></span>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>




                      <div class="modal fade bs-example-modal-sm" id="modalDetailsRent" tabindex="-1" role="dialog" aria-hidden="true" >
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel2">Detalle del Alquiler : <label id="titleDetails"></label></h4>
                            </div>
                            <div class="modal-body">

                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Descripción</th>
                                      <th>Precio</th>
                                    </tr>
                                  </thead>
                                  <tbody id='DetailsRent'>
                                  </tbody>
                                </table>
                                <label id='totalprice'></label>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>

                          </div>
                        </div>
                      </div>



                      <div class="modal fade bs-example-modal-sm" id="modaladdDetailsRent" tabindex="-1" role="dialog" aria-hidden="true" >
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel3">Nuevo Consumo : <label id="titleaddDetails"></label></h4>
                            </div>
                            <div class="modal-body">
                            <form id='RentDetail' >
                              <input type='hidden' name='ID_Rent' id='ID_Rentadd' >
                                <div class="col-xs-5">
                                  <!-- required for floating -->
                                  <!-- Nav tabs -->
                                  <ul class="nav nav-tabs tabs-left">
                                    <li class="active"><a href="#alquiler" data-toggle="tab" aria-expanded="false">Alquiler</a>
                                    </li>
                                    <li class=""><a href="#otros" data-toggle="tab" aria-expanded="true">Otros</a>
                                    </li>
                                  </ul>
                                </div>

                                <div class="col-xs-7">
                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="alquiler">
                                      <p class="lead">Home tab</p>
                                      <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                                        synth. Cosby sweater eu banh mi, qui irure terr.</p>
                                    </div>
                                    <div class="tab-pane" id="otros">
                                      <fieldset>
                                        <div class="form-group">
                                          <label for="Info" class="control-label col-md-3 col-sm-3 col-xs-12">Info</label>
                                          <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12 text-left" type="text" id='Info' name="Info" required>
                                          </div>
                                        </div>
                                      </fieldset>                               
                                      <fieldset>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Pre.</label>
                                            <div class="col-md-9 col-sm-6 col-xs-12 text-right">
                                              <input type="number" step='0.01' id='Price' name="Price"  class="form-control col-md-7 col-xs-12 text-right" required>
                                            </div>
                                        </div>
                                      </fieldset>
                                    </div>
                                  </div>
                                </div>

     <!--
                              -->
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                              <button type="button" id='newRentDetail' class="btn btn-primary" >Añadir</button>
                            </div>

                          </div>
                        </div>
                      </div>




<script>


  $('input[name=Temporal]').click(function(){
    if($(this).is(':checked')  && $(this).val() == 1){
                    $('#RentToHours').css("display","block");
                    $('#RentToDays').css("display","none");
                  }else{
                    $('#RentToHours').css("display","none");
                    $('#RentToDays').css("display","block");
                  }
  });


  $(document).ready(function(){
  
    $("#loader").append("<img src='<?php echo base_url('resources/img/Cargando.gif'); ?>' id='gif' width='80px' height='80px' style='position:absolute;right:590px;top: 230px;'  />");
    document.documentElement.classList.add('disabled');
    listarTableRent();

    listarRoom();
    
    $('#RentToHours').css("display","block");
    $('#RentToDays').css("display","none");

});


function countdown(ID_Rent,DateToReal,Busy){
  //  var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

  var countDownDate = new Date(DateToReal).getTime();
   
    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
     var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    
        // If the count down is finished, write some text 
        if (distance < 0 || Busy != 1) {
          clearInterval(x); 
          if(Busy != 1){
            $('#rent'+ID_Rent).css("background-color","#616161");
            $('#rent'+ID_Rent).css("color","#e0e0e0");
            $('#rent'+ID_Rent +" td a").css("color","white");
            document.getElementById("time"+ID_Rent).innerHTML = "";
          }else{
            $('#rent'+ID_Rent).css("background-color","#ef5350 ");
            $('#rent'+ID_Rent).css("color","white");
            $('#rent'+ID_Rent +" td a").css("color","white");
            document.getElementById("time"+ID_Rent).innerHTML = "FINALIZADO";
          }
        }else{
              document.getElementById("time"+ID_Rent).innerHTML = days + "d. " + hours + "h:" + minutes + "m:" + seconds + "s";
        }
        $('html').removeClass( "disabled" );
        document.getElementsByTagName('html')[0].style.opacity = 1;
        $('#gif').remove();
    }, 1000);
}


function listarTableRent(){
  // Mostar en la tabla la lista de cuartos en uso
  
   var rents = []; var jsonString = "";
  $.ajax({
          url: "<?php echo base_url('rent/listRoomBusy'); ?>",
          type: "get",
          success: function (response) {
 
            if(response != ""){
              var i = 0;
             var rents = "";
             for(i;i< response.length; i++){
                // Format de fechas
                var DateFrom = response[i].DateFrom;
                var DateTo = response[i].DateTo;
                var d = DateFrom.split("-");
                DateFrom = d[2] + "/" + d[1] + "/" + d[0];

                var dd = DateTo.split("-");
                DateTo = dd[2] + "/" + dd[1] + "/" + dd[0];

                var ocultar = "";
                if(response[i].Busy == "0"){
                  ocultar = " style='display:none' ";
                }
              rents = rents + "<tr id='rent"+response[i].ID_Rent+"' ><td>"+response[i].Apellidos +' '+response[i].Nombre+"</td><td>"+response[i].DNI+"</td><td>"+response[i].N+" - " +response[i].RoomType +"</td><td>s/"+ response[i].Price+"</td><td class='text-center' id='time"+response[i].ID_Rent+"'>"+countdown(response[i].ID_Rent,response[i].DateToReal,response[i].Busy)+"</td><td ><a href='#' style='text-decoration:none' onclick=\" viewConsume("+ response[i].ID_Rent + ") \" <span class='fa fa-edit' ></span></a></td><td "+ ocultar +" ><a href='#' style='text-decoration:none' onclick=\" addConsume("+ response[i].ID_Rent + ") \" <span class='fa fa-plus' ></span></a></td><td "+ ocultar +" ><a href='#' id='rentEnd"+response[i].ID_Rent+"' style='text-decoration:none'  onclick=\" endRent("+response[i].ID_Rent+","+ response[i].ID_Room + ") \" <span class='fa fa-check-square-o' ></span></a></td></tr>"; 
             
             }

             $('#Rents').html(rents);
          }else{
            $('html').removeClass( "disabled" );
            document.getElementsByTagName('html')[0].style.opacity = 1;
            $('#gif').remove();
          }
        }
  });

}

function listarRoom(){
  
    $.ajax({
            url: "<?php echo base_url('room/listRoom'); ?>",
            type: "get",
            success: function (response) {
                var i = 0;
              var rooms = ""; var type = "";
              for(i;i< response.length; i++){
                
                if(type != response[i].RoomType){
                  rooms = rooms + "<h2>" + response[i].RoomType + "</h2>";
                }

                var busy = "danger";
                if(response[i].ID_StateType == 1){
                  busy = "default";
                }

                rooms = rooms + "<span class='label label-"+busy+"' style='padding: 5px;'>"+response[i].N+"</span> ";
                type =  response[i].RoomType;
              }

              $('#listRooms').html(rooms);
            }
    });
}



function clearNewRent(){
  $('#DNI').val("");
  $('#lastname').val("");
  $('#firstname').val("");
  $('#ID_Room').val(0);
  $('#DateFrom').val("<?php echo date("Y-m-d");?>");
  $('#DateTo').val("<?php echo date("Y-m-d");?>");
}


  $('#save').click(function(){
    var rent = $('#Rent').serialize();
    $.ajax({
          url: "<?php echo base_url('rent/saveRent'); ?>",
          type: "post",
          data: rent ,
          success: function (response) {
              if(response){
                $('#newRent').modal('hide');
                var dataTable = $('.datatable-rent').DataTable();
                dataTable.destroy(); 
                listarTableRent();
                clearNewRent();
                listarRoom();
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });
  });

  $('#DNI').change(function(){
    var DNI = $('#DNI').val();
    $.ajax({
          url: "<?php echo base_url('customer/getNom'); ?>" + '/' + DNI ,
          type: "post",
          success: function (response) {
              if(response){
                $('#lastname').val(response[0].Apellidos);
                $('#firstname').val(response[0].Nombre);
              }
          }
      });
  });

  function newRent(){
    $('#newRent').modal("show");
    $('#blockRoom').hide();

    // Mostar lista de Tipo de Cuarto
    $.ajax({
            url: "<?php echo base_url('room/listRoomTypes/1'); ?>"  ,
            type: "get",
            success: function (response) {
              if(response){
                var i = 0;var options = "";
                options = options + "<option value=0>-- Seleccione --</option>";
              for(i;i<= response.length - 1; i++){
                  options = options + "<option value="+response[i].ID_RoomType+">"+ response[i].RoomType +"</option>";
                }
                $('#ID_RoomType').html(options);
               
              }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
    });

  }

  $('#ID_RoomType').change(function(){
    // Mostar lista de Cuartos Habilitados
    if($('#ID_RoomType').val() != 0){

    $.ajax({
            url: "<?php echo base_url('rent/listRoomAvailables'); ?>" + "/" + $('#ID_RoomType').val() ,
            type: "get",
            success: function (response) {
              if(response){
                var i = 0;var options = "";
                options = options + "<option value=0>-- Seleccione --</option>";
              for(i;i<= response.length - 1; i++){
                  options = options + "<option value="+response[i].ID_Room+">"+ response[i].N +"</option>";
                }
                $('#ID_Room').html(options);
                $('#blockRoom').show();
              }else{
                $('#blockRoom').hide();
                mensaje("Atención!","No hay Habitaciones disponibles para este tipo de Habitación","error");
              }
              
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
    });
     
    }else{
      $('#blockRoom').hide();
    }
  });

  function endRent(ID_Rent,ID_Room){
    swal({
      title: 'Esta seguro de dar por finalizado el alquiler?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
      if (result.value) {
        swal(
          'Por favor!',
          'Limpie la habitación',
          'success'
        )
          
        $.ajax({
              url: "<?php echo base_url('rent/updateRentRoom'); ?>" + "/" + ID_Rent + "/" + ID_Room  ,
              type: "get",
              success: function (response) {
                if(response){
                  window.location.href="<?php echo base_url("rent"); ?>";
                }
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
              }
      });

      }
    })
  }



  function addConsume(ID_Rent){
    $('#titleaddDetails').text(ID_Rent);
    $('#modaladdDetailsRent input').val("");
    $('#ID_Rentadd').val(ID_Rent);
    $('#modaladdDetailsRent').modal("show");
  }

  $('#newRentDetail').click(function(){
    var rent = $('#RentDetail').serialize();
    $.ajax({
          url: "<?php echo base_url('rent/saveRentDetail'); ?>",
          type: "post",
          data: rent ,
          success: function (response) {
              if(response){
                var dataTable = $('.datatable-rent').DataTable();
                dataTable.destroy(); 
                listarTableRent();
                clearNewRent();
                listarRoom();
                $('#modaladdDetailsRent').modal('hide');
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });
  });

  function viewConsume(ID_Rent){
    $('#titleDetails').text(ID_Rent);
    $.ajax({
            url: "<?php echo base_url('rent/listRentDetails'); ?>" + "/" + ID_Rent,
            type: "get",
            success: function (response) {
              if(response){
                detailsrent = ""; totalprice= 0;
                for(var i=0;i< response.length; i++){
                  detailsrent =  detailsrent + "<tr>";
                  detailsrent = detailsrent + "<td>"+response[i].Info+"</td><td>"+response[i].Price+"</td>";
                  detailsrent =  detailsrent + "</tr>";

                  totalprice = totalprice + parseFloat(response[i].Price);
                }
                $('#totalprice').text("Precio Total : " + totalprice);
                $('#DetailsRent').html(detailsrent);
              }
              
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
    });
    $('#modalDetailsRent').modal("show");
  }


  function viewListRooms(){
    $('#ViewlistRooms').modal("show");
  }

</script>

             
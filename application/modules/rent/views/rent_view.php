
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
                  <?php 
                    if($_SESSION['ID_UserType']==1){
                      echo "
                      <button type='button' class='btn btn-success' style='background-color:#ffb300 !important' onclick='viewListRooms(1)' >Lista de Habitaciones - Aura</button>
                      <button type='button' class='btn btn-success' style='background-color:#ffb300 !important' onclick='viewListRooms(2)' >Lista de Habitaciones - Cris</button>

                      
                      ";
                    }else{
                      echo "<button type='button' class='btn btn-success' style='background-color:#ffb300 !important' onclick='viewListRooms()' >Lista de Habitaciones</button>
                      ";
                    }
                  ?>
              </div>
              <div class="col-md-6 text-right" >
                 <!-- <button type="button" class="btn btn-info" id="exportar" style='background-color:#ffb300 !important' >PDF</button>-->
                  <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#modalFiltro" style='background-color:#ffb300 !important'  >Filtrar</button>                               
                  <button type="button" class="btn btn-primary" style='background-color:#ffb300 !important' onclick="newRent()" >Nuevo Alquiler</button>                               
              </div>
            </div>
            <br />
                  <div id="editor"></div>
                  <div class="x_content" id="content">
                    <div class='table-responsive' >
                      <table class="table table-hover" width="100%"  id="table_rent" style='background-color:white;'>
                        <thead>
                          <tr>
                            <th style='width:10px' ></th>
                            <th>Datos del Usuario</th>
                            <th>Tipo Doc.</th>
                            <th>Documento</th>
                            <th><?php if($_SESSION['ID_UserType']==1) echo "Hotel - " ?>Hab. - Tipo</th>
                            <th>Precio</th>
                            <th>Creado por</th>
                            <th style="width:140px;text-align:center"><span class='fa fa-clock-o'></span></th>
                            <th style="width:20px"></th>
                            <th style="width:20px"></th>
                            <th style="width:20px"></th>
                          </tr>
                        </thead>
                        <tbody id="Rents">

                        </tbody>
                      </table>
                    </div>
                </div>

                <div class="modal fade bs-example-modal-lg" id='newRent'   tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Nuevo Alquiler</h4>
                              </div>
                              <div class="modal-body" >
                              <form id='Rent' >
                                <div class="row">
                                  <div class="col-lg-4">
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="Documento" class="control-label col-md-3 col-sm-3 col-xs-12">Doc.</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <label class="radio-inline"><input type="radio" name="DocumentType" value=0 checked>DNI</label>
                                            <label class="radio-inline"><input type="radio" name="DocumentType" value=1 >RUC</label>
                                        </div>
                                      </div>
                                    </fieldset>
                                    <div id="BloqueDNI" >
                                        <fieldset>
                                          <div class="form-group">
                                            <label for="DNI" class="control-label col-md-3 col-sm-3 col-xs-12">DNI</label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                              <input id="DNI" class="form-control col-md-7 col-xs-12 text-right" type="number" id="DNI"  name="DNI"  maxlength="8">
                                            </div>
                                          </div>
                                        </fieldset>                              
                                        <fieldset>
                                          <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Apellidos</label>
                                              <div class="col-md-9 col-sm-6 col-xs-12 text-right">
                                                <input type="text" id='lastname' name="lastname"   class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                                              </div>
                                          </div>
                                        </fieldset>
                                        <fieldset>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Nombres</label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                              <input type="text"  id="firstname" name="firstname"  class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                            </div>
                                          </div>
                                        </fieldset>
                                      </div>
                                      <div id="BloqueRUC" style="display:none" >
                                          <fieldset>
                                            <div class="form-group">
                                              <label for="RUC" class="control-label col-md-3 col-sm-3 col-xs-12">RUC</label>
                                              <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input id="RUC" class="form-control col-md-7 col-xs-12 text-right" type="number" id="RUC"  name="RUC"  maxlength="8">
                                              </div>
                                            </div>
                                          </fieldset> 
                                          <fieldset>
                                            <div class="form-group" >
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Nombre</label>
                                              <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input type="text"  id="NameCompany" name="NameCompany" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                              </div>
                                            </div>
                                          </fieldset>
                                    </div>
                                  <fieldset>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Celular</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="number"  id="Phone" name="Phone"  class="form-control col-md-7 col-xs-12 text-right" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                      </div>
                                    </div>
                                  </fieldset>
                               </div>
                               <div class="col-lg-4">
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
                                   <input type="radio" name="Temporal" value=0 checked>Días
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="Temporal" value=1 >Horas
                                 </label>
                                 </div>
                               </fieldset> 
                                                              
                               <fieldset>
                                 <div class='form-group'>
                                    <div id="RentToDays">  
                                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>Días</label>
                                      <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="number"  value="1" min="1" class="form-control text-right" id='Days' name="Days" >
                                        <input type="hidden" id='DateTo'  name="DateTo" >
                                      </div>
                                    </div>
                                    <div id="RentToHours" style="display:none">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Horas</label>
                                      <div class="col-md-4 col-sm-6 col-xs-6 text-right">
                                        <select  id='nHours' name="nHours" class="form-control" >
                                          <option value="1" >1</option>
                                          <option value="2" >2</option>
                                        </select>
                                      </div>
                                    </div>
                                   <label class='control-label col-md-2 col-sm-3 col-xs-12 text-right'><em class='fa fa-cutlery'></em></label>
                                   <div class="col-md-1 col-sm-6 col-xs-12">
                                      <input type="checkbox" name="Food"   value=1 >
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <label class="control-label col-md-4 col-sm-3 col-xs-12" for="lastname">Precio Sug.</label>
                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                  <label id="Price"></label>
                                  <input type='hidden' name='PriceRent'  id='PriceRent'  > 
                                 </div>
                                 <label class='control-label col-md-3 col-sm-3 col-xs-12 text-right'>Feriado</label>
                                   <div class="col-md-1 col-sm-6 col-xs-12">
                                      <input type="checkbox" name="Feriado" id="Feriado"   value=1 >
                                   </div>
                               </fieldset>
                               </div>
                               <div class="col-lg-4">
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
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" >Creado por</label>
                                 <div class="col-md-9 col-sm-6 col-xs-12">
                                  <input type='text' name='EmployeeCreate' class="form-control col-md-7 col-xs-12 parsley-success" id='EmployeeCreate' required > 
                                 </div>
                               </fieldset>
                               
                               <fieldset>
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" >Precio Real</label>
                                 <div class="col-md-9 col-sm-6 col-xs-6">
                                  <input type='number' step="0.01" name='PriceRentReal' id="PriceRentReal" class="form-control col-md-7 col-xs-12 text-right" > 
                                 </div>
                               </fieldset>
                               <fieldset id='blockRequest' style='display:none'>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Pregunta</label>
                                   <div class='col-md-9 col-sm-9 col-xs-12'>
                                     <select class='form-control' id='ID_Request' name='ID_Request' >
                                       <option value='0' >--Seleccione--</option>
                                     </select>
                                   </div>
                                 </div>
                               </fieldset>
                             </div>
                           </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal"  >Cerrar</button>
                              <button type='button' id="save"  class="btn btn-success"  >Guardar</button>
                            </div>
                            </form>
                              </div>
                            </div>
                          </div>

                        </div>


<!--
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
                                  <label for="Documento" class="control-label col-md-3 col-sm-3 col-xs-12">Doc.</label>
                                  <div class="col-md-9 col-sm-6 col-xs-12">
                                      <label class="radio-inline"><input type="radio" name="DocumentType" value=0 checked>DNI</label>
                                      <label class="radio-inline"><input type="radio" name="DocumentType" value=1 >RUC</label>
                                  </div>
                                </div>
                               </fieldset>
                               <div id="BloqueDNI" >
                                  <fieldset>
                                    <div class="form-group">
                                      <label for="DNI" class="control-label col-md-3 col-sm-3 col-xs-12">DNI</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input id="DNI" class="form-control col-md-7 col-xs-12 text-right" type="number" id="DNI"  name="DNI"  maxlength="8">
                                      </div>
                                    </div>
                                  </fieldset>                              
                                  <fieldset>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Apellidos</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12 text-right">
                                          <input type="text" id='lastname' name="lastname"   class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                                        </div>
                                    </div>
                                  </fieldset>
                                  <fieldset>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Nombres</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="text"  id="firstname" name="firstname"  class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                      </div>
                                    </div>
                                  </fieldset>
                                </div>
                                <div id="BloqueRUC" style="display:none" >
                                    <fieldset>
                                      <div class="form-group">
                                        <label for="RUC" class="control-label col-md-3 col-sm-3 col-xs-12">RUC</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                          <input id="RUC" class="form-control col-md-7 col-xs-12 text-right" type="number" id="RUC"  name="RUC"  maxlength="8">
                                        </div>
                                      </div>
                                    </fieldset> 
                                    <fieldset>
                                      <div class="form-group" >
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Nombre</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                          <input type="text"  id="NameCompany" name="NameCompany" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                        </div>
                                      </div>
                                    </fieldset>
                              </div>
                               <fieldset>
                                 <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Celular</label>
                                   <div class="col-md-9 col-sm-6 col-xs-12">
                                     <input type="number"  id="Phone" name="Phone"  class="form-control col-md-7 col-xs-12 text-right" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                   </div>
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" >Creado por</label>
                                 <div class="col-md-9 col-sm-6 col-xs-12">
                                  <input type='text' name='EmployeeCreate' class="form-control col-md-7 col-xs-12 parsley-success" id='EmployeeCreate' required > 
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
                                   <input type="radio" name="Temporal" value=0 checked>Días
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="Temporal" value=1 >Horas
                                 </label>
                                 </div>
                               </fieldset> 
                                                              
                               <fieldset>
                                 <div class='form-group'>
                                    <div id="RentToDays">  
                                      <label class='control-label col-md-3 col-sm-3 col-xs-12'>Días</label>
                                      <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="number"  value="1" min="1" class="form-control text-right" id='Days' name="Days" >
                                        <input type="hidden" id='DateTo'  name="DateTo" >
                                      </div>
                                    </div>
                                    <div id="RentToHours" style="display:none">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Horas</label>
                                      <div class="col-md-4 col-sm-6 col-xs-6 text-right">
                                        <select  id='nHours' name="nHours" class="form-control" >
                                          <option value="1" >1</option>
                                          <option value="2" >2</option>
                                        </select>
                                      </div>
                                    </div>
                                   <label class='control-label col-md-2 col-sm-3 col-xs-12 text-right'><em class='fa fa-cutlery'></em></label>
                                   <div class="col-md-1 col-sm-6 col-xs-12">
                                      <input type="checkbox" name="Food"   value=1 >
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
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Precio Sugerido</label>
                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                  <label id="Price"></label>
                                  <input type='hidden' name='PriceRent'  id='PriceRent'  > 
                                 </div>
                               </fieldset>
                               <fieldset>
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" >Precio Real</label>
                                 <div class="col-md-9 col-sm-6 col-xs-6">
                                  <input type='number' step="0.01" name='PriceRentReal' id="PriceRentReal" class="form-control col-md-7 col-xs-12 text-right" > 
                                 </div>
                               </fieldset>
                               <fieldset id='blockRequest' style='display:none'>
                                 <div class='form-group'>
                                   <label class='control-label col-md-3 col-sm-3 col-xs-12'>Pregunta</label>
                                   <div class='col-md-9 col-sm-9 col-xs-12'>
                                     <select class='form-control' id='ID_Request' name='ID_Request' >
                                       <option value='0' >--Seleccione--</option>
                                     </select>
                                   </div>
                                 </div>
                               </fieldset>
                             
                           </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal"  >Cerrar</button>
                              <button type='button' id="save"  class="btn btn-success"  >Guardar</button>
                            </div>
                            </form>

                            </div>
                          </div>

                        </div>
-->
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

                      <div class="modal fade bs-example-modal-sm" id="modalFiltro" tabindex="-1" role="dialog" aria-hidden="true" >
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">

                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                            <h4 class="modal-title">Filtro</h4>
                            </div>
                            <div class="modal-body">
                              <form id='FormFiltro' >
                                <?php 
                                  if($_SESSION['ID_UserType'] == 1){
                                    echo "
                                    <fieldset>
                                      <div class='form-group'>
                                          <label class='control-label col-md-3 col-sm-3 col-xs-12'>Hotel</label>
                                          <div class='col-md-9 col-sm-6 col-xs-12'>
                                              <label class='radio-inline'><input type='radio' name='ID_Hotel' checked value= >Todos</label>
                                              <label class='radio-inline'><input type='radio' name='ID_Hotel' value=1 >Aura</label>
                                              <label class='radio-inline'><input type='radio' name='ID_Hotel' value=2 >Cris</label>
                                          </div>
                                      </div>
                                    </fieldset>
                                    ";

                                  }
                                
                                ?>
                                <fieldset>
                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Doc.</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                          <label class='radio-inline'><input type='radio' name='DocumentType' checked value= >Todos</label>
                                          <label class="radio-inline"><input type="radio" name="DocumentType" value=0 >DNI</label>
                                          <label class="radio-inline"><input type="radio" name="DocumentType" value=1 >RUC</label>
                                      </div>
                                  </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Doc.</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="number"  name="Document" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                      </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Desde</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="date" name="DateFrom"  class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                      </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Hasta</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="date"  name="DateTo"  class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                      </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="EmployeeCreate">Creado por</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="text"  name="EmployeeCreate" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                      </div>
                                    </div>
                                </fieldset>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                              <button type="button" class="btn btn-success"  id='filtrar' >Aplicar</button>
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
                            <form id='RentDetail'>
                              <div class="modal-body">
                                <input type='hidden' name='ID_Rent' id='ID_Rentadd'>
                                <input type='hidden'  id='ID_RoomAdd'>
                                <div class="x_content">
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#alquiler" id="addAlquiler" role="tab" data-toggle="tab" aria-expanded="true">Alquiler</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="addOtro" data-toggle="tab" aria-expanded="false">Otros</a>
                                        </li>
                                      </ul>
                                    
                                      <div id="myTabContent" class="tab-content">
                                       
                                        <div role="tabpanel" class="tab-pane fade active in" id="alquiler" aria-labelledby="home-tab">
                                                                  
                                          <fieldset>
                                            <div class='form-group'>
                                                <div id="RentToDays2">  
                                                  <label class='control-label col-md-3 col-sm-3 col-xs-12'>Días</label>
                                                  <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <input type="number"  min="1" class="form-control text-right" id="Days2" name="Days" >
                                                    <input type="hidden" id='DateTo2'  name="DateTo" >
                                                  </div>
                                                  <label class='control-label col-md-3 col-sm-3 col-xs-12 text-right'>Feriado</label>
                                                  <div class="col-md-1 col-sm-6 col-xs-12">
                                                      <input type="checkbox" name="Feriado2" id="Feriado2"   value=1 >
                                                  </div>
                                                </div>
                                            </div>
                                          </fieldset>
                                          <fieldset>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Precio Sugerido</label>
                                            <div class="col-md-3 col-sm-6 col-xs-6">
                                              <label id="Price2"></label>
                                              <input type='hidden' name='PriceRent'  id='PriceRent2'  > 
                                            </div>
                                          </fieldset>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
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
                                                  <input type="number" step='0.01' id='PriceOtro' name="PriceOtro"  class="form-control col-md-7 col-xs-12 text-right" required>
                                                </div>
                                            </div>
                                          </fieldset>
                                        </div>
                                      </div>
                                      <br>
                                     </div>
                                      <fieldset>
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Modo Pago</label>
                                        <div class="col-md-9 col-sm-6 col-xs-6">
                                          <label class="radio-inline">
                                            <input type="radio" name="ID_PaymentType2" value=0 checked>Efectivo
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="ID_PaymentType2" value=1>VISA
                                          </label>
                                        </div>
                                      </fieldset>
                                    
                                </div>
                              </div>
                              <div class="modal-footer">
                                      <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                                      <button type="button" id='newRentDetail' class="btn btn-success" >Añadir</button>
                              </div>
                            </form>
                          </div>
                        </div> 
                      </div>


<script>


  $('input[name=Temporal]').click(function(){
                if($(this).is(':checked')  && $(this).val() == 1){
                    $('#RentToHours').css("display","block");
                    $('#RentToDays').css("display","none");
                    $( this ).attr( 'checked', 'checked' );
                  }else{
                    $('#RentToHours').css("display","none");
                    $('#RentToDays').css("display","block");
                    $( this ).attr( 'checked', 'checked' );
                  }
  });

  $('input[name=Temporal2]').click(function(){
                if($(this).is(':checked')  && $(this).val() == 1){
                  $('#RentToHours2').css("display","block");
                  $('#RentToDays2').css("display","none");
                  $( this ).attr( 'checked', 'checked' );
                }else{
                  $('#RentToHours2').css("display","none");
                  $('#RentToDays2').css("display","block");
                  $( this ).attr( 'checked', 'checked' );
                }
  });

  $('input[name=DocumentType]').click(function(){
                if($(this).is(':checked')  && $(this).val() == 1){
                  $('#BloqueRUC').css("display","block");
                    $('#BloqueDNI').css("display","none");                  
                    $( this ).attr( 'checked', 'checked' );
                  }else{

                    $('#BloqueRUC').css("display","none");
                    $('#BloqueDNI').css("display","block");
                    $( this ).attr( 'checked', 'checked' );
                  }
  });


  $(document).ready(function(){
  
    $("#loader").append("<img src='<?php echo base_url('resources/img/Cargando.gif'); ?>' id='gif' width='80px' height='80px' style='position:absolute;right:590px;top: 230px;'  />");
    document.documentElement.classList.add('disabled');

    listarTableRent();

    listarRoom();

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
                var DateTo = response[i].DateTo;
                var d = DateTo.split("-");

                DateTo = d[2] + "/" + d[1] + "/" + d[0];

                var ocultar = "";
                if(response[i].Busy == "0"){
                  ocultar = " style='display:none' ";
                }

                var TipoDocumento = response[i].DocumentType;
                if(TipoDocumento == "1"){ TipoDocumento = "RUC"; }else{ TipoDocumento = "DNI";  }

                var food = "";
                if(response[i].Food == "1"){
                  food = "<em class='fa fa-cutlery'></em>";
                }

                var Hotel = "";
                <?php if($_SESSION['ID_UserType'] == 1){
                  echo " Hotel = response[i].Hotel + ' - ';";
                } ?>

              rents = rents + "<tr id='rent"+response[i].ID_Rent+"' ><td>"+food+"</td><td>"+response[i].Name+"</td><td>"+TipoDocumento+"</td><td>"+response[i].Document+"</td><td>"+Hotel+response[i].N+" - " +response[i].RoomType +"</td><td>s/"+ response[i].Price+"</td><td>"+ response[i].CreateEmployee+"</td><td class='text-center' id='time"+response[i].ID_Rent+"'>"+countdown(response[i].ID_Rent,response[i].DateTo,response[i].Busy)+"</td><td ><a href='#' style='text-decoration:none' onclick=\" viewConsume("+ response[i].ID_Rent + ","+response[i].ID_Room+") \" <span class='fa fa-edit' ></span></a></td><td "+ ocultar +" ><a href='#' style='text-decoration:none' onclick=\" addConsume("+response[i].ID_Rent+","+ response[i].ID_Room + ",'"+response[i].DateTo+"') \" <span class='fa fa-plus' ></span></a></td><td "+ ocultar +" ><a href='#' id='rentEnd"+response[i].ID_Rent+"' style='text-decoration:none'  onclick=\" endRent("+response[i].ID_Rent+","+ response[i].ID_Room + ") \" <span class='fa fa-check-square-o' ></span></a></td></tr>"; 
             
             }

             $('#Rents').html(rents);
          }else{
            
            $('html').removeClass( "disabled" );
            document.getElementsByTagName('html')[0].style.opacity = 1;
            $('#gif').remove();
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
          $('html').removeClass( "disabled" );
            document.getElementsByTagName('html')[0].style.opacity = 1;
            $('#gif').remove();
      }
  });

}

function listarRoom(ID_Hotel){

    $.ajax({
            url: "<?php echo base_url('room/listRoom'); ?>" + "/" + ID_Hotel,
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
  $('#Rent input').val("");
  $('#Rent select').val(0);
  $('#Days').val(1);
  $('#nHours').val(1);
  $('#Price').hide();
  $('#PriceRentReal').val(0);

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
                mensaje("Correcto!", "Se registró el alquiler correctamente","success");
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });
  });

  $('#DNI,#RUC').change(function(){
    var DNI = $('#DNI').val();
    var RUC = $('#RUC').val();
    var tipo = $("#newRent input[name='DocumentType']:checked").val();
    var documento = "";
    if(tipo == "1"){
      documento = RUC;
    }else{
      documento = DNI;
    }

    $.ajax({
          url: "<?php echo base_url('customer/getNom'); ?>" + '/' + documento  ,
          type: "post",
          success: function (response) {
              if(response != ""){
                var tipo = $("#newRent input[name='DocumentType']:checked").val();
                if(tipo == "1"){
                  $('#NameCompany').val(response[0].Name);
                }else{
                  var n = response[0].Name;
                   n =  n.split(" ");
                  $('#lastname').val(n[1]);
                  $('#firstname').val(n[0]);
                }
                $('#blockRequest').hide();
              }else{
                $('#blockRequest').show();
              }
          }
      });
  });

  function newRent(){
    $('#newRent').modal("show");
    $('#blockRoom').hide();

    // Mostar lista de Tipo de Cuarto
    $.ajax({
            url: "<?php echo base_url('room/listRoomTypes/'.$_SESSION['ID_Hotel']); ?>",
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


        // Lista Preguntas
        $.ajax({
            url: "<?php echo base_url('customer/listRequestCustomer'); ?>"  ,
            type: "get",
            success: function (response) {
              if(response){
                var i = 0;var options = "";
                options = options + "<option value=0>-- Seleccione --</option>";
              for(i;i<= response.length - 1; i++){
                  options = options + "<option value="+response[i].ID_Request+">"+ response[i].Request +"</option>";
                }
                $('#ID_Request').html(options);
               
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
                  <?php if(!isset($_SESSION['ID_Hotel'])){ echo " var add = ' - ' + response[i].Hotel;"; }else{ echo " var add = ''; "; }  ?>
                  options = options + "<option value="+response[i].ID_Room+">"+ response[i].N + add +"</option>";
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



  function addConsume(ID_Rent,ID_Room,DateTo){
    $('#titleaddDetails').text(ID_Rent);
    $('#modaladdDetailsRent input').val("");
    $('#ID_RoomAdd').val(ID_Room);
    $('#ID_Rentadd').val(ID_Rent);
    $('#DateTo2').val(DateTo);
    $('#Price2').hide();
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
                window.location.href="<?php echo base_url("rent"); ?>";
               // $('#modaladdDetailsRent').modal('hide');
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


  function viewListRooms(ID_Hotel){
    listarRoom(ID_Hotel);

    $('#ViewlistRooms').modal("show");
  }

$('#Days2').click(function(){

 var ID_Room = $('#ID_RoomAdd').val();  
 var DateToRent = $('#DateTo2').val();

 $.ajax({
            url: "<?php echo base_url('room/listRoom/'.$_SESSION['ID_Hotel']); ?>",
            type: "get",
            success: function (response) {
                var i = 0;
   
                var Days = $('#Days2').val();
              for(i;i< response.length; i++){

                if(response[i].ID_Room == ID_Room){
                  var Price = 0.00; var PriceBase = 0.00;
                    var date = new Date(DateToRent); // Fecha de la Renta
                    var hours = date.getHours();
                   
                    var feriado = $("#newRent input[name='Feriado2']:checked").val();
                    if(feriado){
                        PriceBase = response[i].PriceDayHoliday;
                    }else{

                        if (date.getDay() == 6 || date.getDay() == 0){
                          PriceBase = response[i].PriceDayWeekend;
                        }else{
                          PriceBase = response[i].PriceDay;
                        }
                    }

                        Price = parseInt(Days) * PriceBase;
                       date = date.setDate(date.getDate() + parseInt(Days));
                       date = dateFormat(date, "yyyy-mm-dd");
                      //  day.replace("/", "-");
                        if(hours >= 0 && hours < 12){
                            $('#DateTo2').val(date+" 09:00:00"); 
                        }else{
                            $('#DateTo2').val(date+" 12:00:00"); 
                        } 

                    }
                 
             }
               if(Price != ""){
                    $('#Price2').text(" S/"+Price);
                    $('#PriceRent2').val(Price);  
                    $('#Price2').show();
               }
              }   
    });

});
$('#Feriado2').change(function(){
  $('#Days2').trigger("click");
});


$('#Feriado').change(function(){
  $('#ID_Room').trigger("click");
});

  $('#ID_Room,#Days,#nHours,input[name=Temporal]').click(function(){
 
   var ID_Room = $('#ID_Room').val();

    $.ajax({
            url: "<?php echo base_url('room/listRoom/'.$_SESSION['ID_Hotel']); ?>",
            type: "get",
            success: function (response) {
                var i = 0;
              
             
              for(i;i< response.length; i++){

                if(response[i].ID_Room == ID_Room){


                  var Price = 0.00; var PriceBase = 0.00;
                  var tipo = $("#newRent input[name='Temporal']:checked").val();
                  var date = new Date(); // Now
                    var hours = date.getHours();
                    var Days = $('#Days').val();
                    // condicion saber si es feriado
                    var feriado = $("#newRent input[name='Feriado']:checked").val();
                    if(feriado){
                        PriceBase = response[i].PriceDayHoliday;
                    }else{

                        if (date.getDay() == 6 || date.getDay() == 0){
                          PriceBase = response[i].PriceDayWeekend;
                        }else{
                          PriceBase = response[i].PriceDay;
                        }
                    }
                        

             
                  if(tipo == 1){
                 
                    var Hours = $('#nHours').val();
                     Price = PriceBase - 5;
                      date = date.setHours(date.getHours() + Hours);
                      date = dateFormat(date, "yyyy-mm-dd hh:mm:ss");
                      $('#DateTo').val(date);

                    }else{

                      Price = parseInt(Days) * PriceBase;
                       date = date.setDate(date.getDate() + parseInt(Days));
                       date = dateFormat(date, "yyyy-mm-dd");
                      //  day.replace("/", "-");
                        if(hours >= 0 && hours < 12){
                            $('#DateTo').val(date+" 09:00:00"); 
                        }else{
                            $('#DateTo').val(date+" 12:00:00"); 
                        } 


                    }
            
                    $('#Price').text(" S/"+Price);
                    $('#PriceRent').val(Price);
                    $('#Price').show();
                }
              }
            }
    });

  });

$('#addOtro').click(function(){
  $('#Days2').val("");
  $('#Price2').hide();
  $('#PriceRent2').val("");
  $('#DateTo2').val("");
});

$('#addAlquiler').click(function(){
  $('#Info').val("");
  $('#PriceOtro').val("");
});





$('#filtrar').click(function(){
  var filtro = $('#FormFiltro').serialize();
    $.ajax({
          url: "<?php echo base_url('rent/filtro'); ?>",
          type: "post",
          data: filtro ,
          success: function (response) {
     
                    if(response != ""){
                      var dataTable = $('.datatable-rent').DataTable();
                      dataTable.destroy(); 

                      if(response != ""){
                    var i = 0;
                  var rents = "";

                  for(i;i< response.length; i++){
                      // Format de fechas
                      var DateTo = response[i].DateTo;
                      var d = DateTo.split("-");

                      DateTo = d[2] + "/" + d[1] + "/" + d[0];

                      var ocultar = "";
                      if(response[i].Busy == "0"){
                        ocultar = " style='display:none' ";
                      }

                      var TipoDocumento = response[i].DocumentType;
                      if(TipoDocumento == "1"){ TipoDocumento = "RUC"; }else{ TipoDocumento = "DNI";  }

                      var food = "";
                      if(response[i].Food == "1"){
                        food = "<em class='fa fa-cutlery'></em>";
                      }

                      var Hotel = "";
                      <?php if($_SESSION['ID_UserType'] == 1){
                        echo " Hotel = response[i].Hotel + ' - ';";
                      } ?>

                    rents = rents + "<tr id='rent"+response[i].ID_Rent+"' ><td>"+food+"</td><td>"+response[i].Name+"</td><td>"+TipoDocumento+"</td><td>"+response[i].Document+"</td><td>"+Hotel+response[i].N+" - " +response[i].RoomType +"</td><td>s/"+ response[i].Price+"</td><td>"+ response[i].CreateEmployee+"</td><td class='text-center' id='time"+response[i].ID_Rent+"'>"+countdown(response[i].ID_Rent,response[i].DateTo,response[i].Busy)+"</td><td ><a href='#' style='text-decoration:none' onclick=\" viewConsume("+ response[i].ID_Rent + ","+response[i].ID_Room+") \" <span class='fa fa-edit' ></span></a></td><td "+ ocultar +" ><a href='#' style='text-decoration:none' onclick=\" addConsume("+response[i].ID_Rent+","+ response[i].ID_Room + ",'"+response[i].DateTo+"') \" <span class='fa fa-plus' ></span></a></td><td "+ ocultar +" ><a href='#' id='rentEnd"+response[i].ID_Rent+"' style='text-decoration:none'  onclick=\" endRent("+response[i].ID_Rent+","+ response[i].ID_Room + ") \" <span class='fa fa-check-square-o' ></span></a></td></tr>"; 
                  
                  }

                  $('#Rents').html(rents);
                  $('#modalFiltro').modal("hide");

                }else{
                  
                  $('html').removeClass( "disabled" );
                  document.getElementsByTagName('html')[0].style.opacity = 1;
                  $('#gif').remove();
                }

                      clearNewRent();
                      listarRoom();

              }else{
                $('#Rents').html("");
                $('#modalFiltro').modal("hide");
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
  });
});


// Exportacion a PDF


$('#exportar').click(function () {   


    html2canvas(document.getElementById("content")).then(function(canvas) {
                var img = canvas.toDataURL('image/png');
                var doc = new jsPDF();
                doc.addImage(img, 'JPEG', 20, 20);
                doc.save("Alquileres.pdf");
            });

});


</script>

             
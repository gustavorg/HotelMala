
<div class="">
            <div class='row'>
              <div class="col-md-6 text-left">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Lista de Habitaciones</button>
              </div>
              <div class="col-md-6 text-right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Nuevo Alquiler</button>                               
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
                    <table id="datatable-buttons" class="table table-hover">
                      <thead style='background:white;'>
                        <tr>
                          <th>Apellidos y Nombres</th>
                          <th class='text-right'>DNI</th>
                          <th>Habitación</th>
                          <th>Tipo</th>
                          <th>Dias / Horas</th>
                          <th class='text-right'>Pago</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                    </div>

   

          </div>

                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Nuevo Alquiler</h4>
                              </div>
                              <div class="modal-body" id='Rent'>
                                 <form @submit.prevent="createRent" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Apellidos</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12 text-right">
                                          <input type="text" v-model="new_rent.lastname" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="5"><ul class="parsley-errors-list" id="parsley-id-5"></ul>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Nombres</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input type="text" v-model="new_rent.firstname"  id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12 parsley-success" data-parsley-id="7"><ul class="parsley-errors-list" id="parsley-id-7"></ul>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="DNI" class="control-label col-md-3 col-sm-3 col-xs-12">DNI</label>
                                      <div class="col-md-9 col-sm-6 col-xs-12">
                                        <input id="DNI"  v-model="new_rent.DNI"  class="form-control col-md-7 col-xs-12" type="text" name="DNI" data-parsley-id="9">
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
faltan(); */

new Vue({
            el:'#Rent',
            data:{
                new_Rent:{
                    lastname:'',
                    firstname:'',
                    DNI: ''
                }
            },
            methods:{
              createRent:function(){
                this.createRent.push({
                  description: this.new_task,
                  pending: true,
                  editing: false
              });
                 this.new_Rent = '';
              }
            },
            http: {
                emulateJSON: true,
                emulateHTTP: true
            }
        })

</script>


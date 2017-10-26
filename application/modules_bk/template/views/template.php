
<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('head');  ?>

    <body class="nav-md" >
    <div class="container body">
        <div class="main_container">
          <?php
            $this->load->view('menu');   
            $this->load->view($content_view); 
            $this->load->view('footer'); 
            ?>
            </div>
        </div>
      </div> 
        
        <?php $this->load->view('scripts');  ?>


      <script>
          new Vue({
              el: '#menu',
              data: {
                  class: 'Vue.js'
              },
              // define methods under the `methods` object
              methods: {
                  inicioEmpleado: function (event) {    
                      window.location = "http://localhost:81/Sistemas/ProyectoHotel/Inicio" ;
                  },
                  registroEmpleado: function (event) {
                      window.location = "http://localhost:81/Sistemas/ProyectoHotel/Registro" ;
                      
                  }
              }
          });
          new Vue({
              el: '#menuhorizontal',

            methods:{
                logout:function(event){
                    // POST /someUrl
                    this.$http.post('http://localhost:81/Sistemas/ProyectoHotel/Login/logout').then(function(response){
                   
                       
                         window.location = "http://localhost:81/Sistemas/ProyectoHotel" ;
                       

                    }.bind(this))
                }
            },
            http: {
                emulateJSON: true,
                emulateHTTP: true
            }
          })

      </script> 
    </body>
</html>

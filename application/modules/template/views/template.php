<!DOCTYPE html>
<html lang="en">

    <?php   $this->load->view('general/head');
            $this->load->view('general/scripts');  ?>

    <body class="nav-md" style='background-color:#F7F7F7 !important;' >
    <div class="container body">
        <div class="main_container">
          <?php
            $this->load->view('general/menu');   
            $this->load->view($content_view); 
            $this->load->view('general/footer'); 
            ?>
            </div>
        </div>
      </div> 
    
      <script>
          new Vue({
              el: '#menu',
              data: {
                  class: 'Vue.js'
              },

	      beforeCreated: function(){
		    this.inicioEmpleado();
            this.registroEmpleado();
	      },     
              // define methods under the `methods` object
            methods: {
                  inicioEmpleado: function (event) {    
                      window.location = '<?php echo base_url(); ?>' ;
                  },
                  registroEmpleado: function (event) {
                      window.location = '<?php echo base_url("Rent"); ?>' ;
                      
                  },
                logout:function(event){
                        // POST /someUrl
                        this.$http.post("<?php echo base_url('Login/logout'); ?>").then(function(response){
                    
                        
                            window.location = '<?php echo base_url(); ?>' ;
                        

                        }.bind(this))
                }
            },
            http: {
                emulateJSON: true,
                emulateHTTP: true
            },
          })

      </script> 
    </body>
</html>

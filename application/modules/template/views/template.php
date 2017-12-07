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
    </body>
</html>

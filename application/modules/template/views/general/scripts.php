      <script src="resources/vendors/jquery/dist/jquery.min.js"></script>
      <script src="resources/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Custom Theme Scripts -->
      <script src="resources/js/custom.min.js"></script>
      <script src="resources/js/alertify.min.js"></script>
      <script src="resources/js/pnotify.custom.min.js"></script>
      
      <!-- FastClick -->
      <script src="resources/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="resources/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="resources/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
      <script src="resources/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="resources/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="resources/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="resources/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
      <script src="resources/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="resources/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <script src="resources/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="resources/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="resources/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
      <script src="resources/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="resources/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
      <script src="resources/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
      <script src="resources/vendors/jszip/dist/jszip.min.js"></script>
      <script src="resources/vendors/pdfmake/build/pdfmake.min.js"></script>
      <script src="resources/vendors/pdfmake/build/vfs_fonts.js"></script>
      <script src="resources/vendors/moment/min/moment.min.js"></script>
      <script src="resources/vendors/raphael/raphael.min.js"></script>
      <script src="resources/vendors/morris.js/morris.min.js"></script>
      <script src="resources/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
      <script src="resources/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="resources/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="resources/vendors/Flot/jquery.flot.js"></script>
    <script src="resources/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="resources/vendors/Flot/jquery.flot.time.js"></script>
    <script src="resources/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="resources/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="resources/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="resources/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="resources/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="resources/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="resources/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="resources/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="resources/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- Chart.js -->
    <script src="resources/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="resources/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="resources/vendors/switchery/dist/switchery.min.js"></script>

    

    


<script>





	$(document).ready(function() {

      $('#<?php echo $_SESSION["menu"];?>').addClass('active');

/*    $('.maestra').dataTable({
    stateSave: true,
        'paging':   true,  
        'ordering': true,   
        'responsive': true,
				'info': false,
        oLanguage: {
            sSearch:      'Buscar:',
            sLengthMenu:  'N° _MENU_ ',
            info:         '',
            zeroRecords:  'Nothing found - sorry',
            infoEmpty:    'No records available',
        },
				
				dom: '<\'html5buttons\'B>lTfgitp',
        buttons:
				[
				 		{extend: 'copy',  className: 'btn-sm', text: '<span title=\'Copiar\'><i  class=\'fa fa-files-o\'></i></span>' },
            {extend: 'excel', className: 'btn-sm', text: '<span title=\'Excel\'><i class=\'fa fa-file-excel-o\'></i></span>'},
            {extend: 'pdf',   className: 'btn-sm', text: '<span title=\'PDF\'><i class=\'fa fa-file-pdf-o\'></i></span>'},
            {extend: 'print', className: 'btn-sm', text: '<span title=\'Imprimir\'><i class=\'fa fa-print\'></i></span>'  }	
				
        ]
    	});*/
		})	


 // Mensajes de crear, editar y eliminar
    function mensaje(titulo,mensaje,tipo){
        new PNotify({
            title: titulo,
            text: mensaje,
            type: tipo,
            styling: 'bootstrap3'
      });
    }


</script>



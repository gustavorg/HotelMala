<div class="row tile_count">

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Hoy - Aura</span>
    <div class="count">s/<?= $HoyAura ?></div>
  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Hoy - Cris</span>
    <div class="count">s/<?= $HoyCris ?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Total Hoy</span>
    <div class="count green">s/<?= $HoyTotal ?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Semanal - Aura</span>
    <div class="count">s/<?= $SemanalAura ?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Semanal - Cris</span>
    <div class="count">s/<?= $SemanalCris ?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Total Semanal</span>
    <div class="count green">s/<?= $SemanalTotal ?></div>
  </div>

</div>

<div class="row tile_count" style='margin-top: -20px;'>

<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Mensual - Aura</span>
  <div class="count">s/<?= $MensualAura ?></div>
</div>

<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Mensual - Cris</span>
  <div class="count">s/<?= $MensualCris ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Mensual Hoy</span>
  <div class="count green">s/<?= $MensualTotal ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Anual - Aura</span>
  <div class="count">s/<?= $AnualAura ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Anual - Cris</span>
  <div class="count">s/<?= $AnualCris ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Anual Total </span>
  <div class="count green">s/<?= $AnualTotal ?></div>
</div>
</div>

<div class="row">
<?php $year1 = date("Y");
      $year2 = date('Y', strtotime('-1 years')); ?> 
<div class="col-md-9 col-sm-12 col-xs-12">
  <div class="dashboard_graph">

    <div class="row x_title">
        <h3>Ingresos en el Año Aura <em class='fa fa-stop' style='color:red'></em> - Cris <em class='fa fa-stop' style='color:#00a79d'></em>  <?php echo $year1; ?></h3>
    </div>
      <div class="demo-container" style="height:160px">
        <div class="ct-chartYear" ></div>	
      </div>

    <div class="row x_title"> 
      <h3>Comparación de Ingresos Aura  <?php echo $year2." <em class='fa fa-stop' style='color:blue'></em> - ".$year1." <em class='fa fa-stop' style='color:rgba(0, 255, 51, 0.842)'></em>"; ?></h3>
    </div>

      <div class="demo-container" style="height:190px">
        <div class="ct-chartComparation1" ></div>	
      </div>

      <div class="row x_title"> 
      <h3>Comparación de Ingresos Cris  <?php echo $year2." <em class='fa fa-stop' style='color:blue'></em> - ".$year1." <em class='fa fa-stop' style='color:rgba(0, 255, 51, 0.842)'></em>"; ?></h3>
    </div>

      <div class="demo-container" style="height:190px">
        <div class="ct-chartComparation2" ></div>	
      </div>
  </div>

</div>

    <div class="col-md-3 col-sm-12 col-xs-12">
    <div>
                        <div class="x_title">
                          <h2>Top 5 Clientes</h2>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                        <?php 
                          reset($list_customers);

                          foreach($list_customers as $row){
                          echo "<li class='media event'>
                            <div class='media-body'>
                              <a class='pull-left border-aero profile_thumb' style='width: 43px;height: 43px;'>
                                <i class='fa fa-user aero' style='font-size: 22px;'></i>
                              </a>
                              <a class='title' href='#'>".$row->Name."</a>
                              <p style='margin-top: 0px;font-size: 11px;'><em class='fa fa-money'></em> ".$row->Gasto."</p>
                              <p style='margin-top: 0px;font-size: 11px;'><em class='fa fa-male'></em> ".$row->Visita."</p>
                            </div>
                          </li>";
                          }
                        ?>
                        </ul>
                      </div>

                      <div class="demo-container" style="height:190px">
                        <div class="ct-chart-pie" ></div>	
                      </div>
    </div>
</div>



<script>

// Año Actual


var options = {
  seriesBarDistance: 15
};

var responsiveOptions = [
  ['screen and (min-width: 641px) and (max-width: 1024px)', {
    seriesBarDistance: 10,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value;
      }
    }
  }],
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0];
      }
    }
  }]
];

new Chartist.Bar('.ct-chartYear', {
                                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic'],
                                      series: [
                                      <?php echo $ingresosAura; ?>,
                                      <?php echo $ingresosCris; ?>
                                    ]
                                  },{
                                    seriesBarDistance: 20,
                                    axisX: {
                                        showGrid: false
                                    },
                                plugins: [
                                    Chartist.plugins.tooltip({
                                        valeTransform: function() {
                                            return value + 'Offensive Yardage';
                                        }
                                    })
                                ]
                                  
                                }, options, responsiveOptions);



// Comparacion Años Aura

var chart = new Chartist.Line('.ct-chartComparation1', {
  labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic'],
  series: [<?php echo $ingresosAuraComparacion; ?>]
}, {
  low: 0,
  showArea: true,
  showPoint: false,
  fullWidth: true
});

chart.on('draw', function(data) {
  if(data.type === 'line' || data.type === 'area') {
    data.element.animate({
      d: {
        begin: 2000 * data.index,
        dur: 2000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        to: data.path.clone().stringify(),
        easing: Chartist.Svg.Easing.easeOutQuint
      }
    });
  }
});

// Comparacion Años Cris

var chart = new Chartist.Line('.ct-chartComparation2', {
  labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic'],
  series: [<?php echo $ingresosCrisComparacion; ?>]
}, {
  low: 0,
  showArea: true,
  showPoint: false,
  fullWidth: true
});

chart.on('draw', function(data) {
  if(data.type === 'line' || data.type === 'area') {
    data.element.animate({
      d: {
        begin: 2000 * data.index,
        dur: 2000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        to: data.path.clone().stringify(),
        easing: Chartist.Svg.Easing.easeOutQuint
      }
    });
  }
});



</script>
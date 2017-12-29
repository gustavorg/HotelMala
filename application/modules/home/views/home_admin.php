<div class="row tile_count">

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Hoy - Aura</span>
    <div class="count">2500</div>
    <span class="count_bottom"><i class="green">4% </i> Ayer </span>
  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Hoy - Cris</span>
    <div class="count">123.50</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> Ayer </span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Total Hoy</span>
    <div class="count green">2,500</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Ayer </span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Semanal - Aura</span>
    <div class="count">4,567</div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Semana Ps.</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Semanal - Cris</span>
    <div class="count">2,315</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i>Semana Ps.</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> Total Semanal</span>
    <div class="count">7,325</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Semana Ps. </span>
  </div>

</div>

<div class="row tile_count" style='margin-top: -20px;'>

<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Mensual - Aura</span>
  <div class="count">2500</div>
  <span class="count_bottom"><i class="green">4% </i> Mes Pasado </span>
</div>

<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Mensual - Cris</span>
  <div class="count">123.50</div>
  <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i>  Mes Pasado </span>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Mensual Hoy</span>
  <div class="count green">2,500</div>
  <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i>  Mes Pasado</span>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Medio Año - Aura</span>
  <div class="count">4,567</div>
  <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Medio Año Ps. </span>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Medio Año - Cris</span>
  <div class="count">2,315</div>
  <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Medio Año P. </span>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-money"></i> Anual Total </span>
  <div class="count">7,325</div>
  <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Año Pasado </span>
</div>
</div>

<div class="row">
<?php $year1 = date("Y");
      $year2 = date('Y', strtotime('-1 years')); ?> 
<div class="col-md-9 col-sm-12 col-xs-12">
  <div class="dashboard_graph">

    <div class="row x_title">
        <h3>Ingresos en el Año Aura - Cris <?php echo $year1; ?></h3>
    </div>
      <div class="demo-container" style="height:160px">
        <div class="ct-chartYear" ></div>	
      </div>

    <div class="row x_title"> 
      <h3>Comparación de Ingresos Aura - Cris <?php echo $year2."-".$year1; ?></h3>
    </div>

      <div class="demo-container" style="height:190px">
        <div class="ct-chartComparation" ></div>	
      </div>
  </div>

</div>

    <div class="col-md-3 col-sm-12 col-xs-12">
    <div>
                        <div class="x_title">
                          <h2>Top 5 Clientes</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                              </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                          <li class="media event">
                            <div class="media-body">
                              <a class="pull-left border-aero profile_thumb" style='width: 43px;height: 43px;'>
                                <i class="fa fa-user aero" style='font-size: 22px;'></i>
                              </a>
                              <a class="title" href="#">Kevin Lopez</a>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-money"></em> s/ 500.00</p>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-male"></em> 10 </p>
                            </div>
                          </li>
                          <li class="media event">
                            <div class="media-body">
                              <a class="pull-left border-aero profile_thumb" style='width: 43px;height: 43px;'>
                                <i class="fa fa-user aero" style='font-size: 22px;'></i>
                              </a>
                              <a class="title" href="#">Mauricio Quispe</a>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-money"></em> s/ 350.00</p>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-male"></em> 5 </p>
                            </div>
                          </li>
                          <li class="media event">
                            <div class="media-body">
                              <a class="pull-left border-aero profile_thumb" style='width: 43px;height: 43px;'>
                                <i class="fa fa-user aero" style='font-size: 22px;'></i>
                              </a>
                              <a class="title" href="#">Maria Gutierrez</a>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-money"></em> s/ 240.00</p>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-male"></em> 12 </p>
                            </div>
                          </li>
                          <li class="media event">
                            <div class="media-body">
                              <a class="pull-left border-aero profile_thumb" style='width: 43px;height: 43px;'>
                                <i class="fa fa-user aero" style='font-size: 22px;'></i>
                              </a>
                              <a class="title" href="#">Paolo Guerrero</a>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-money"></em> s/ 134.00</p>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-male"></em> 4 </p>
                            </div>
                          </li>
                          <li class="media event">
                            <div class="media-body">
                              <a class="pull-left border-aero profile_thumb" style='width: 43px;height: 43px;'>
                                <i class="fa fa-user aero" style='font-size: 22px;'></i>
                              </a>
                              <a class="title" href="#">Keyla Vergara</a>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-money"></em> s/ 100.00</p>
                              <p style="margin-top: 0px;font-size: 11px;"><em class="fa fa-male"></em> 1 </p>
                            </div>
                          </li>
                        </ul>
                      </div>
    </div>
</div>



<script>

// Año Actual

var data = {
  labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic'],
    series: [
    [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
    [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
  ]
};

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

new Chartist.Bar('.ct-chartYear', data, options, responsiveOptions);

// Comparacion Años

  var chart = new Chartist.Line('.ct-chartComparation', {
    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
    series: [
      [5, 5, 10, 8, 7, 5, 4, null, null, null, 10, 10, 7, 8, 6, 9],
      [10, 15, null, 12, null, 10, 12, 15, null, null, 12, null, 14, null, null, null],
    ]
  }, {
    fullWidth: true,
    chartPadding: {
      right: 10
    },
    lineSmooth: Chartist.Interpolation.cardinal({
      fillHoles: true,
    }),
    low: 0
  });


</script>
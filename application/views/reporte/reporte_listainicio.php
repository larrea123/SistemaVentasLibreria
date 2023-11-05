<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-dashboard"></i> DASHBOARD</h3>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- GRAFICOS CHAR -->
            <div class="row">
              <!-- Cantidad Empleados -->
              <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-info shadow h-100">
                      <div class="card-header bg-info font-weight-bold text-light">
                        <h2>CANTIDAD CLIENTES</h2>
                      </div>
                      <div class="card-body">
                          
                          <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-users text-info"> Total Clientes: <?php echo $this->reporte_model->cantidadCliente(); ?></h3></div>
                      </div>
                  </div>
              </div>

              <!-- Cantidad Ventas -->
              <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-dark shadow h-100">
                      <div class="card-header bg-dark font-weight-bold text-light">
                        <h2>CANTIDAD VENTAS</h2>
                      </div>
                      <div class="card-body">    
                          <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-dollar text-dark"> Total Ventas: <?php echo $this->reporte_model->cantidadVenta(); ?></h3></div>
                      </div>
                  </div>
              </div>

              <!-- Cantidad Productos 
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-info shadow h-100">
                      <div class="card-header bg-success font-weight-bold text-light">
                        <h2>CANTIDAD PRODUCTOS DISPONIBLES</h2>
                      </div>
                      <div class="card-body">    
                          <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-cubes text-success"> Total Productos: <?php echo $this->reporte_model->cantidadProducto(); ?></h3></div>
                      </div>
                  </div>
              </div>-->

              <!-- Cantidad Modelos -->
              <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-success shadow h-100">
                      <div class="card-header bg-success font-weight-bold text-light">
                        <h2>CANTIDAD CATEGORIAS</h2>
                      </div>
                      <div class="card-body">    
                          <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-cubes text-success"> Total Categorias: <?php echo $this->reporte_model->cantidadCategoria(); ?></h3></div>
                      </div>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="x_panel border-dark">
                  <div class="x_title  border-dark">
                      <h5 class="font-weight-bold text-dark" >PRODUCTOS DISPONIBLES EN GENERAL</h5>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content border-dark">
                      <canvas id="myChart" width="350" height="200"></canvas>
                  </div>
                  </div>
              </div>
              <div class="col-md-6 col-sm-6  ">
                  <div class="x_panel border-dark">
                  <div class="x_title border-dark">
                      <h5 class="font-weight-bold text-dark" >PRODUCTOS CON MAYOR ROTACION</h5>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content  border-dark">
                      <canvas id="myChartss" width="350" height="200"></canvas>
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
<!-- /page content -->

<script>
      //var grafico= ['pie', 'polarArea', 'line', 'doughnut'];
      //var random = Math.floor(Math.random() * grafico.length);
      //var paraMes=[];
      var paraNumero=[];
      var paraNombre=[];
      var bgColor0 = [];
    //$("#btnBuscar").click(function(){
    $.post("<?php echo base_url();?>index.php/Reporte/getMeses",
        function(data){
          var obj= JSON.parse(data);
        
          $.each(obj, function(i,item){
            var r= Math.random() * 255;
            r= Math.round(r);
            var g= Math.random() * 255;
            g= Math.round(g);
            var b= Math.random() * 255;
            b= Math.round(b);
            //paraMes.push(item.Monto);
            paraNumero.push(item.cant);
            paraNombre.push(item.nom);
            bgColor0.push('rgba('+r+','+g+','+b+', 1)');
          });
      
          //var paraColor = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
           // var paraNum = [12, 19, 3, 5, 2, 3];
            var ctx = $("#myChart");
              var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: {
                      labels: paraNombre, //paraColor,
                      datasets: [{
                          label: paraNombre,
                          data: paraNumero ,
                          backgroundColor: bgColor0,
                          borderColor: ['rgba(255, 255, 255, 1)'],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
            });
    });
    //});

</script>

<script>
      //var grafico= ['pie', 'polarArea', 'line', 'doughnut'];
      //var random = Math.floor(Math.random() * grafico.length);
      //var paraMes=[];
      var paraNumeros=[];
      var paraNombres=[];
      var bgColor = [];
    //$("#btnBuscar").click(function(){
    $.post("<?php echo base_url();?>index.php/Reporte/getPV",
        function(data){
          var obje= JSON.parse(data);
        
          $.each(obje, function(i,item){
            var r= Math.random() * 255;
            r= Math.round(r);
            var g= Math.random() * 255;
            g= Math.round(g);
            var b= Math.random() * 255;
            b= Math.round(b);
            //paraMes.push(item.Monto);
            paraNumeros.push(item.canti);
            paraNombres.push(item.nomb);
            bgColor.push('rgba('+r+','+g+','+b+', 1)');
          });
      
          //var paraColor = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
           // var paraNum = [12, 19, 3, 5, 2, 3];
            var ctx1 = $("#myChartss");
              var myChartss = new Chart(ctx1, {
                  type: 'doughnut',
                  data: {
                      labels: paraNombres, //paraColor,
                      datasets: [{
                          label: paraNombres,
                          data: paraNumeros ,
                          backgroundColor: bgColor,
                          borderColor: ['rgba(255, 255, 255, 1)'],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
            });
    });
    //});

</script>
<script>
      //var grafico= ['pie', 'polarArea', 'line', 'doughnut'];
      //var random = Math.floor(Math.random() * grafico.length);
      //var paraMes=[];
      var paraNumeroS=[];
      var paraNombreS=[];
      var bgColor1 = [];
    //$("#btnBuscar").click(function(){
    $.post("<?php echo base_url();?>index.php/Dashboard/getPVS",
        function(data){
          var objeti= JSON.parse(data);
        
          $.each(objeti, function(i,item){
            var r= Math.random() * 255;
            r= Math.round(r);
            var g= Math.random() * 255;
            g= Math.round(g);
            var b= Math.random() * 255;
            b= Math.round(b);
            //paraMes.push(item.Monto);
            paraNumeroS.push(item.CanS);
            paraNombreS.push(item.NomS);
            bgColor1.push('rgba('+r+','+g+','+b+', 1)');
          });
      
          //var paraColor = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
           // var paraNum = [12, 19, 3, 5, 2, 3];
            var ctx2 = $("#myChartSucursal");
              var myChartss = new Chart(ctx2, {
                  type: 'polarArea',
                  data: {
                      labels: paraNombreS, //paraColor,
                      datasets: [{
                          label: paraNombreS,
                          data: paraNumeroS,
                          backgroundColor: bgColor1,
                          borderColor: ['rgba(255, 255, 255, 1)'],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
            });
    });
    //});

</script>
<script>
      //var grafico= ['pie', 'polarArea', 'line', 'doughnut'];
      //var random = Math.floor(Math.random() * grafico.length);
      //var paraMes=[];
      var paraNumeroSC=[];
      var paraNombreSC=[];
      var bgColor1C = [];
    //$("#btnBuscar").click(function(){
    $.post("<?php echo base_url();?>index.php/Dashboard/getPVC",
        function(data){
          var objetiC= JSON.parse(data);
        
          $.each(objetiC, function(i,item){
            var r= Math.random() * 255;
            r= Math.round(r);
            var g= Math.random() * 255;
            g= Math.round(g);
            var b= Math.random() * 255;
            b= Math.round(b);
            //paraMes.push(item.Monto);
            paraNumeroSC.push(item.CanSC);
            paraNombreSC.push(item.NomSC);
            bgColor1C.push('rgba('+r+','+g+','+b+', 1)');
          });
      
          //var paraColor = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
           // var paraNum = [12, 19, 3, 5, 2, 3];
            var ctx2C = $("#myChartCliente");
              var myChartssC = new Chart(ctx2C, {
                  type: 'pie',
                  data: {
                      labels: paraNombreSC, //paraColor,
                      datasets: [{
                          label: paraNombreSC,
                          data: paraNumeroSC,
                          backgroundColor: bgColor1C,
                          borderColor: ['rgba(255, 255, 255, 1)'],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
            });
    });
    //});

</script>

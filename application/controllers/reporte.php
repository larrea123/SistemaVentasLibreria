<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

    public function index()
	{

        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->proveedor_model->listaproveedores();
            $data['proveedor']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('reporte/reporte_lista',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');

        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->proveedor_model->listaproveedores();
                $data['proveedor']=$lista;
                
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('reporte/reporte_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
    
            }
            else
            {
                //El usuario no esta logueado
                redirect('usuarios/panel','refresh');
            } 

        } 	
	}
    public function index2()
	{

        if($this->session->userdata('rol')=='admin')
        {
            
            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('reporte/reporte_listainicio');
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');

        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('reporte/reporte_listainicio');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
    
            }
            else
            {
                //El usuario no esta logueado
                redirect('producto/index','refresh');
            } 

        } 
	}

//------------------------------------------------------REPORTES---------------------------------------------------------------------------------------------------
    //**********/ REPORTE GENERAL DE VENTAS*********
    public function general()
    {
        $lista = $this->reporte_model->ventashistorial();
        $data['fecha'] = $lista;

        $lista = $this->reporte_model->reporteTotal();
        $data['total'] = $lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_general',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    // REPORTE GENERAL DE VENTAS POR FECHAS
    public function general_filtro()
    {
        $Inicio=$_POST['inicio'];
        $data['inicio']=$Inicio;
        $Fin=$_POST['fin'];
        $data['fin']=$Fin;
        $fecha= $this->reporte_model->ventaFechas($Inicio,$Fin);
        $data['fecha']=$fecha;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_general_filtro',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    // ****************************REPORTE PRODUCTOS MAS VENDIDOS ********************
    public function producto()
    {
        $lista = $this->reporte_model->reporteProducto();
        $data['infoProductoVendido']= $lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_producto',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    // REPORTE PRODUCTOS MAS VENDIDOS INGRESANDO CANTIDAD
    public function productoFinal()
    {
        $Inicio=$_POST['inicio'];
        $data['inicio']=$Inicio;
        $Fin=$_POST['fin'];
        $data['fin']=$Fin;
        $fecha= $this->reporte_model->reporteProductoFinal($Inicio,$Fin);
        $data['fecha']=$fecha;
        /*$cantidad=$_POST['cantidad'];
        $data['cantidad']=$cantidad;
        $producto= $this->reporte_model->reporteProductoFinal($cantidad,$Inicio,$Fin);
        $data['infoProductoVendido']=$producto;*/

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_producto_cantidad',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    // *************************REPORTE PRODUCTOS CON MAYOR ROTACION*************
    public function productoRotacion()
    {
        $lista = $this->reporte_model->reporteProductoRotacion();
        $data['infoProductoVendido']= $lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_producto_rotacion',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    // REPORTE PRODUCTOS CON MAYOR ROTACION INGRESANDO CANTIDAD
    public function productoRotacionFinal()
    {
        /*$cantidad=$_POST['cantidad'];
        $data['cantidad']=$cantidad;
        $producto= $this->reporte_model->reporteProductoRotacion1($cantidad);
        $data['infoProductoVendido']=$producto;*/
        $Inicio=$_POST['inicio'];
        $data['inicio']=$Inicio;
        $Fin=$_POST['fin'];
        $data['fin']=$Fin;
        $fecha= $this->reporte_model->reporteProductoRotacion1($Inicio,$Fin);
        $data['fecha']=$fecha;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_producto_rotacion_cantidad',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    //++++++++++++++++++++ REPORTE CLIENTES CON MAYOR COMPRAS +++++++++++++++
    public function clienteProducto()
    {
        $lista = $this->reporte_model->clienteproducto();
        $data['cliente'] = $lista;

        $idusuario=$this->session->userdata('idusuario');
        $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
        /*$lista = $this->reporte_model->reporteTotal();
        $data['total'] = $lista;*/

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_cliente_producto',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    // REPORTE CLIENTES CON MAYOR COMPRAS POR FECHAS
    public function clienteProductoFiltro()
    {
        $Inicio=$_POST['inicio'];
        $data['inicio']=$Inicio;
        $Fin=$_POST['fin'];
        $data['fin']=$Fin;
        $fecha= $this->reporte_model->clienteproductoFechas($Inicio,$Fin);
        $data['fecha']=$fecha;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_cliente_producto_filtro',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }
    //+++++++++++ REPORTE CATEGORIAS +++++++++++++++
    public function categorias()
    {
        $lista = $this->reporte_model->reporteCategorias();
        $data['categoria'] = $lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_categoria',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    //+++++++++++ REPORTE MARCAS +++++++++++++++
    public function marcas()
    {
        $lista = $this->reporte_model->reporteMarcas();
        $data['marca'] = $lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_marca',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    //+++++++++++ REPORTE PROVEEDORES +++++++++++++++
    public function proveedores()
    {
        $lista = $this->reporte_model->reporteProveedores();
        $data['proveedor'] = $lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_proveedor',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }


    //+++++++++++ REPORTE PRODUCTO POR PROVEEDORES +++++++++++++++
    public function productoProveedor()
    {
        $idProveedor=$_POST['idProveedor'];
        $data['idProveedor']=$idProveedor;
        $lista = $this->reporte_model->reporteProductoProveedor($idProveedor);
        $data['infoProveedorGeneral']= $lista;
        //$lista = $this->reporte_model->reporteProveedores();
        //$data['proveedor'] = $lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('reporte/reporte_producto_proveedor',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

//------------------------------------------------------DASHBOARD---------------------------------------------------------------------------------------------------
    //DASHBOARD
    public function getMeses()
    {
       $result = $this->reporte_model->getMes();
       echo json_encode($result);
    }

    public function getPV()
    {
       $result = $this->reporte_model->getProductosVendidos();
       echo json_encode($result);
    }

//------------------------------------------------------PDF---------------------------------------------------------------------------------------------------
    // PDF -> REPORTE GENERAL DE VENTAS
    public function listapdf()
    {

        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        /* 
        AddPage:
                L Orientacion Horizontal
                P Orientacion Vertical
        Size: tamaño hoja
                A3,A4,A5,Letter,Legal
        */
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte General"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,10,'REPORTE GENERAL DE VENTAS',0,1,'C',1);
        //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
        $this->pdf->Ln();
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);
        
        //$actividad = $this->reporte_model->listaventa($_POST['idventa']);
        //$actividad = $actividad->result();
       /* $actividad = $this->reporte_model->ventashistorial();
        $actividad = $actividad->result();
        foreach ($actividad as $rows) {
            $usuario =$rows->login;
        }*/
        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);
            
        //ANCHO/ALTO/TEXTO/BORDE/ORDEN DE LA SIGUIENTE CELDA/ALINEACION=C=CENTER,R=RIGHT,L=LEFT/FILL 0=NO,1=SI/

        //ORDEN DE LA SIGUIENTE CELDA
        //SI ES 0 = DERECHA
        //SI ES 1 = SIGUIENTE LINEA
        //SI ES 2 = DEBAJO

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Detalle Venta", 1, 1, 'C', 1);
        $this->pdf->SetTextColor(0, 0, 0); 
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(65, 8, utf8_decode('Detalle de Producto'), 1, 0, 'C', 0);
        $this->pdf->Cell(20, 8, utf8_decode('Fecha'), 1, 0, 'C', 0);
        $this->pdf->Cell(30, 8, utf8_decode('P/U (Bs.)'), 1, 0, 'C', 0);
        $this->pdf->Cell(20, 8, utf8_decode('Cantidad'), 1, 0, 'C', 0);
        $this->pdf->Cell(30, 8, utf8_decode('Subtotal (Bs.)'), 1, 1, 'C', 0);

        $lista=$this->reporte_model->detalle1();
        $lista=$lista->result();
        //$actividad = $this->reporte_model->listaventa();
        //$actividad = $actividad->result();
        $num = 1;
        foreach($lista as $row){

            $descripcion = $row->nombrem.' - '.$row->nombre;
            $fecha = $row->fechaRegistro;
            $precio = $row->precioVenta;
            $cantidad = $row->cantidad;
            $total = $row->precioUnitario;

            $this->pdf->SetFont('Arial', '', 8);
            $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(65, 5, utf8_decode($descripcion), 1, 0, 'L', false);
            $this->pdf->Cell(20, 5, utf8_decode(formatearSoloFecha($fecha)), 1, 0, 'C', false);
            $this->pdf->Cell(30, 5, utf8_decode($precio), 1, 0, 'C', false);
            $this->pdf->Cell(20, 5, utf8_decode($cantidad), 1, 0, 'C', false);
            $this->pdf->Cell(30, 5, utf8_decode($total), 1, 0, 'C', false);
            $this->pdf->Ln();

            $num++;
        }
        
        $this->pdf->Ln(10);
        $actividad = $this->reporte_model->reporteTotal();
        $actividad = $actividad->result();
        foreach ($actividad as $rows) {
            $total1 = $rows->total;
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($total1), 0, 1, 'R', 0);
        }
            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($total1), 0, 1, 'L', 0);
        $this->pdf->Output("reporteGeneral.pdf","I");
    }

    // PDF -> REPORTE GENERAL DE VENTAS POR FECHAS
    public function reporteFechasPdf()
	{       
        /*print_r($inicio);
        print_r($fin);
        exit;*/
        if(strlen($_POST['inicio'])>0 and strlen($_POST['fin'])>0){
            
            $inicio=$_POST['inicio'];
            $fin=$_POST['fin'];
            $verInicio = date('Y/m/d', strtotime($inicio));
            $verFin = date('Y/m/d', strtotime($fin));
        }else{
            $inicio = '1111-01-01';
            $fin = '9999-12-30';

            $verInicio = '_/_/_';
            $verFin = '_/_/_';
        }


        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte Ventas"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,5,'REPORTE DE VENTAS',0,1,'C',1);
        $this->pdf->Cell(0,5,'Desde: '.formatearSoloFecha($verInicio).' hasta: '.formatearSoloFecha($verFin),0,1,'C',1);
        $this->pdf->Ln();
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);

        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Detalle Venta", 1, 1, 'C', 1);
        $this->pdf->SetFillColor(242, 243, 244);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 8, 'No.', 'LTRB', 0, 'C', 1);
        $this->pdf->Cell(65, 8, utf8_decode('Detalle de Producto'), 1, 0, 'C', 1);
        $this->pdf->Cell(20, 8, utf8_decode('Fecha'), 1, 0, 'C', 1);
        $this->pdf->Cell(30, 8, utf8_decode('P/U (Bs.)'), 1, 0, 'C', 1);
        $this->pdf->Cell(20, 8, utf8_decode('Cant.'), 1, 0, 'C', 1);
        $this->pdf->Cell(30, 8, utf8_decode('Subtotal (Bs.)'), 1, 1, 'C', 1);

        $lista=$this->reporte_model->ventaFechas($verInicio, $verFin);
        $lista=$lista->result();
        $num = 1;
        foreach($lista as $row){

            $descripcion = $row->nombrem.' - '.$row->nombre;
            $precio = $row->precioVenta;
            $cantidad = $row->cantidad;
            $total = $row->precioUnitario;
            $fecha = $row->fechaRegistro;

            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->SetFont('Arial', '', 8);
            $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(65, 5, utf8_decode($descripcion), 1, 0, 'L', false);
            $this->pdf->Cell(20, 5, utf8_decode( formatearSoloFecha($fecha)), 1, 0, 'C', false);
            $this->pdf->Cell(30, 5, utf8_decode($precio), 1, 0, 'C', false);
            $this->pdf->Cell(20, 5, utf8_decode($cantidad), 1, 0, 'C', false);
            $this->pdf->Cell(30, 5, utf8_decode($total), 1, 0, 'C', false);
            $this->pdf->Ln();

            $num++;
        }
        
        $this->pdf->Ln(10);
        $actividad = $this->reporte_model->reporteTotalFechas($verInicio,$verFin);
        $actividad = $actividad->result();
        foreach ($actividad as $rows) {
            $total1 = $rows->total;
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($total1), 0, 1, 'R', 0);
        }
            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($total1), 0, 1, 'L', 0);
        $this->pdf->Output("reporteGeneral.pdf","I");
        

    }
        //REPORTE GENERAL PRODUCTOS CON MAYOR ROTACION
    public function reporteProductosPdf()
	{
        if(strlen($_POST['inicio'])>0 and strlen($_POST['fin'])>0){
            
            $inicio=$_POST['inicio'];
            $fin=$_POST['fin'];
            $verInicio = date('Y/m/d', strtotime($inicio));
            $verFin = date('Y/m/d', strtotime($fin));
        }else{
            $inicio = '1111-01-01';
            $fin = '9999-12-30';

            $verInicio = '_/_/_';
            $verFin = '_/_/_';
        }

        //$cantidad=$_POST['cantidad'];

        $actividad = $this->reporte_model->ventashistorial();
        $actividad = $actividad->result();

        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte Productos"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,5,'REPORTE GENERAL PRODUCTOS CON MAYOR ROTACION',0,1,'C',1);
        $this->pdf->Cell(0,5,'Desde: '.formatearSoloFecha($verInicio).' hasta: '.formatearSoloFecha($verFin),0,1,'C',1);
        $this->pdf->Ln(5);
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);

        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Detalle Venta", 1, 1, 'C', 1);
        $this->pdf->SetFillColor(242, 243, 244);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(20, 8, 'No.', 'LTRB', 0, 'C', 1);
        $this->pdf->Cell(94, 8, utf8_decode('Detalle de Producto'), 1, 0, 'C', 1);
        //$this->pdf->Cell(30, 8, utf8_decode('P/U (Bs.)'), 1, 0, 'C', 1);
        $this->pdf->Cell(22, 8, utf8_decode('Cant.'), 1, 0, 'C', 1);
        $this->pdf->Cell(39, 8, utf8_decode('Total (Bs.)'), 1, 1, 'C', 1);

        $lista=$this->reporte_model->reporteProductoFinal($verInicio, $verFin);
        $lista=$lista->result();
        $num = 1;
        $suma= 0;
        foreach($lista as $row){

            $descripcion = $row->nombrec;
            //$precio1 = $row->precioVenta;
            $cantidad = $row->cantidad;
            $total1 = $row->total;

            $suma= $suma + $total1;

            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->SetFont('Arial', '', 8);
            $this->pdf->Cell(20, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(94, 5, utf8_decode($descripcion), 1, 0, 'C', false);
            //$this->pdf->Cell(30, 5, utf8_decode($precio1), 1, 0, 'C', false);
            $this->pdf->Cell(22, 5, utf8_decode($cantidad), 1, 0, 'C', false);
            $this->pdf->Cell(39, 5, utf8_decode($total1), 1, 0, 'C', false);
            $this->pdf->Ln();
            $num++;
        }   

        $this->pdf->Ln(10);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($suma), 0, 1, 'R', 0); 

            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($suma), 0, 1, 'L', 0);
        $this->pdf->Output("reporteGeneral.pdf","I");
	}

    //REPORTE GENERAL PRODUCTOS MAS VENDIDOS
    public function reporteProductosRotacionPdf()
	{
        if(strlen($_POST['inicio'])>0 and strlen($_POST['fin'])>0){
            
            $inicio=$_POST['inicio'];
            $fin=$_POST['fin'];
            $verInicio = date('Y/m/d', strtotime($inicio));
            $verFin = date('Y/m/d', strtotime($fin));
        }else{
            $inicio = '1111-01-01';
            $fin = '9999-12-30';

            $verInicio = '_/_/_';
            $verFin = '_/_/_';
        }
        
        //$cantidad=$_POST['cantidad'];

        $actividad = $this->reporte_model->ventashistorial();
        $actividad = $actividad->result();

        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte Productos"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,5,'REPORTE GENERAL PRODUCTOS MAS VENDIDOS',0,1,'C',1);
        $this->pdf->Cell(0,5,'Desde: '.formatearSoloFecha($verInicio).' hasta: '.formatearSoloFecha($verFin),0,1,'C',1);
        $this->pdf->Ln(5);
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);

        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Detalle Venta", 1, 1, 'C', 1);
        $this->pdf->SetFillColor(242, 243, 244);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(20, 8, 'No.', 'LTRB', 0, 'C', 1);
        $this->pdf->Cell(94, 8, utf8_decode('Detalle de Producto'), 1, 0, 'C', 1);
        //$this->pdf->Cell(30, 8, utf8_decode('P/U (Bs.)'), 1, 0, 'C', 1);
        $this->pdf->Cell(22, 8, utf8_decode('Cant.'), 1, 0, 'C', 1);
        $this->pdf->Cell(39, 8, utf8_decode('Total (Bs.)'), 1, 1, 'C', 1);

        $lista=$this->reporte_model->reporteProductoRotacion1($verInicio, $verFin);
        $lista=$lista->result();
        $num = 1;
        $suma= 0;
        foreach($lista as $row){

            $descripcion = $row->nombrec;
            //$precio1 = $row->precioVenta;
            $cantidad = $row->cantidad;
            //$total = $precio1 * $cantidad;
            $total = $row->precioD;

            $suma= $suma + $total;

            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->SetFont('Arial', '', 8);
            $this->pdf->Cell(20, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(94, 5, utf8_decode($descripcion), 1, 0, 'C', false);
            //$this->pdf->Cell(30, 5, utf8_decode($precio1), 1, 0, 'C', false);
            $this->pdf->Cell(22, 5, utf8_decode($cantidad), 1, 0, 'C', false);
            $this->pdf->Cell(39, 5, utf8_decode($total), 1, 0, 'C', false);
            $this->pdf->Ln();
            $num++;
        }   

        $this->pdf->Ln(10);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($suma), 0, 1, 'R', 0); 

            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($suma), 0, 1, 'L', 0);
        $this->pdf->Output("reporteGeneral.pdf","I");
	}

    //--------------------------------------------- PDF -> REPORTE CLIENTES CON MAYOR COMPRAS--------------------------------------------------------------------------------
    public function clienteProductoPdf()
    {

        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        /* 
        AddPage:
                L Orientacion Horizontal
                P Orientacion Vertical
        Size: tamaño hoja
                A3,A4,A5,Letter,Legal
        */
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte Clientes Con Mayores Compras"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,10,'REPORTE CLIENTES CON MAYORES COMPRAS',0,1,'C',1);
        //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
        $this->pdf->Ln();
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);
        
        //$actividad = $this->reporte_model->listaventa($_POST['idventa']);
        //$actividad = $actividad->result();
        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);
            
        //ANCHO/ALTO/TEXTO/BORDE/ORDEN DE LA SIGUIENTE CELDA/ALINEACION=C=CENTER,R=RIGHT,L=LEFT/FILL 0=NO,1=SI/

        //ORDEN DE LA SIGUIENTE CELDA
        //SI ES 0 = DERECHA
        //SI ES 1 = SIGUIENTE LINEA
        //SI ES 2 = DEBAJO

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Lista De Clientes", 1, 1, 'C', 1);
        $this->pdf->SetTextColor(0, 0, 0); 
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(45, 8, utf8_decode('Razon Social'), 1, 0, 'C', 0);
        $this->pdf->Cell(28, 8, utf8_decode('CI/NIT'), 1, 0, 'C', 0);
        $this->pdf->Cell(22, 8, utf8_decode('Telefono'), 1, 0, 'C', 0);
        $this->pdf->Cell(40, 8, utf8_decode('Ventas Realizadas'), 1, 0, 'C', 0);
        $this->pdf->Cell(30, 8, utf8_decode('Importe (Bs.)'), 1, 1, 'C', 0);

        $lista=$this->reporte_model->clienteproducto();
        $lista=$lista->result();
        //$actividad = $this->reporte_model->listaventa();
        //$actividad = $actividad->result();
        $num = 1;
        $suma= 0;
        foreach($lista as $row){

            $descripcion = $row->razonSocial;
            $ci = $row->ciNit;
            $celular = $row->telefono;
            $cantidad = $row->cantidad;
            $total = $row->totalSum;

            $suma= $suma + $total;

            $this->pdf->SetFont('Arial', '', 8);
            $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(45, 5, utf8_decode($descripcion), 1, 0, 'L', false);
            $this->pdf->Cell(28, 5, utf8_decode($ci), 1, 0, 'C', false);
            $this->pdf->Cell(22, 5, utf8_decode($celular), 1, 0, 'C', false);
            $this->pdf->Cell(40, 5, utf8_decode($cantidad), 1, 0, 'C', false);
            $this->pdf->Cell(30, 5, utf8_decode($total), 1, 0, 'C', false);
            $this->pdf->Ln();

            $num++;
        }
        
        $this->pdf->Ln(10);
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($suma), 0, 1, 'R', 0);
        
            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($suma), 0, 1, 'L', 0);
        $this->pdf->Output("reporteClienteProducto.pdf","I");
    }

    //*********/ PDF -> REPORTE CLIENTES CON MAYOR COMPRAS POR FECHas**************
    public function clienteProductoFechasPdf()
    {       
        /*print_r($inicio);
        print_r($fin);
        exit;*/
        if(strlen($_POST['inicio'])>0 and strlen($_POST['fin'])>0){
            
            $inicio=$_POST['inicio'];
            $fin=$_POST['fin'];
            $verInicio = date('Y/m/d', strtotime($inicio));
            $verFin = date('Y/m/d', strtotime($fin));
        }else{
            $inicio = '1111-01-01';
            $fin = '9999-12-30';

            $verInicio = '_/_/_';
            $verFin = '_/_/_';
        }


        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte Clientes Con Mayores Compras"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,5,'REPORTE CLIENTES CON MAYORES COMPRAS',0,1,'C',1);
        $this->pdf->Cell(0,5,'Desde: '.formatearSoloFecha($verInicio).' hasta: '.formatearSoloFecha($verFin),0,1,'C',1);
        $this->pdf->Ln();
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);

        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Lista De Clientes", 1, 1, 'C', 1);
        $this->pdf->SetFillColor(242, 243, 244);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(45, 8, utf8_decode('Razon Social'), 1, 0, 'C', 0);
        $this->pdf->Cell(28, 8, utf8_decode('CI/NIT'), 1, 0, 'C', 0);
        $this->pdf->Cell(22, 8, utf8_decode('Telefono'), 1, 0, 'C', 0);
        $this->pdf->Cell(40, 8, utf8_decode('Ventas Realizadas'), 1, 0, 'C', 0);
        $this->pdf->Cell(30, 8, utf8_decode('Importe (Bs.)'), 1, 1, 'C', 0);

        $lista=$this->reporte_model->clienteproductoFechas($verInicio, $verFin);
        $lista=$lista->result();
        $num = 1;
        $suma= 0;
        foreach($lista as $row){

            $descripcion = $row->razonSocial;
            $ci = $row->ciNit;
            $celular = $row->telefono;
            $cantidad = $row->cantidad;
            $total = $row->totalSum;
            $fecha = $row->fechaRegistro;

            $suma= $suma + $total;

            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->SetFont('Arial', '', 8);
            $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(45, 5, utf8_decode($descripcion), 1, 0, 'L', false);
            $this->pdf->Cell(28, 5, utf8_decode($ci), 1, 0, 'C', false);
            $this->pdf->Cell(22, 5, utf8_decode($celular), 1, 0, 'C', false);
            $this->pdf->Cell(40, 5, utf8_decode($cantidad), 1, 0, 'C', false);
            $this->pdf->Cell(30, 5, utf8_decode($total), 1, 0, 'C', false);
            $this->pdf->Ln();

            $num++;
        }
        
        $this->pdf->Ln(10);
        /*$actividad = $this->reporte_model->reporteTotalFechas($verInicio,$verFin);
        $actividad = $actividad->result();
        foreach ($actividad as $rows) {
            $total1 = $rows->total;*/
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($suma), 0, 1, 'R', 0);
        
            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($suma), 0, 1, 'L', 0);
        $this->pdf->Output("reporteGeneral.pdf","I");

    }
    //--------------------------------------------- PDF -> REPORTE CATEGORIAS--------------------------------------------------------------------------------
    public function categoriasPdf()
    {

        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        /* 
        AddPage:
                L Orientacion Horizontal
                P Orientacion Vertical
        Size: tamaño hoja
                A3,A4,A5,Letter,Legal
        */
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte de Categorias"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,10,'REPORTE CATEGORIAS',0,1,'C',1);
        //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
        $this->pdf->Ln();
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);
        
        //$actividad = $this->reporte_model->listaventa($_POST['idventa']);
        //$actividad = $actividad->result();
        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);
            
        //ANCHO/ALTO/TEXTO/BORDE/ORDEN DE LA SIGUIENTE CELDA/ALINEACION=C=CENTER,R=RIGHT,L=LEFT/FILL 0=NO,1=SI/

        //ORDEN DE LA SIGUIENTE CELDA
        //SI ES 0 = DERECHA
        //SI ES 1 = SIGUIENTE LINEA
        //SI ES 2 = DEBAJO

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Lista De Categorias", 1, 1, 'C', 1);
        $this->pdf->SetTextColor(0, 0, 0); 
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(15, 8, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(55, 8, utf8_decode('Nombre Categoria'), 1, 0, 'C', 0);
        $this->pdf->Cell(40, 8, utf8_decode('Fecha de Registro'), 1, 0, 'C', 0);
        $this->pdf->Cell(65, 8, utf8_decode('Nombre Usuario'), 1, 1, 'C', 0);

        $lista=$this->reporte_model->reporteCategorias();
        $lista=$lista->result();
        //$actividad = $this->reporte_model->listaventa();
        //$actividad = $actividad->result();
        $num = 1;
        foreach($lista as $row){

            $descripcion = $row->nombre;
            $fecha = $row->fechaRegistro;
            $NombreUsuario = $row->nombres.' '.$row->primerApellido.' '.$row->segundoApellido;


            $this->pdf->SetFont('Arial', '', 8);
            $this->pdf->Cell(15, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(55, 5, utf8_decode($descripcion), 1, 0, 'C', false);
            $this->pdf->Cell(40, 5, utf8_decode( formatearSoloFecha($fecha)), 1, 0, 'C', false);
            $this->pdf->Cell(65, 5, utf8_decode($NombreUsuario), 1, 0, 'C', false);
            $this->pdf->Ln();

            $num++;
        }
        
        $this->pdf->Ln(10);
        
        /*$this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($suma), 0, 1, 'R', 0);
        
            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($suma), 0, 1, 'L', 0);*/
        $this->pdf->Output("reporteCategorias.pdf","I");
    }

    //--------------------------------------------- PDF -> REPORTE MARCAS--------------------------------------------------------------------------------
    public function marcasPdf()
    {

        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        /* 
        AddPage:
                L Orientacion Horizontal
                P Orientacion Vertical
        Size: tamaño hoja
                A3,A4,A5,Letter,Legal
        */
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte de Marcas"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,10,'REPORTE MARCAS',0,1,'C',1);
        //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
        $this->pdf->Ln();
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);
        
        //$actividad = $this->reporte_model->listaventa($_POST['idventa']);
        //$actividad = $actividad->result();
        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);
            
        //ANCHO/ALTO/TEXTO/BORDE/ORDEN DE LA SIGUIENTE CELDA/ALINEACION=C=CENTER,R=RIGHT,L=LEFT/FILL 0=NO,1=SI/

        //ORDEN DE LA SIGUIENTE CELDA
        //SI ES 0 = DERECHA
        //SI ES 1 = SIGUIENTE LINEA
        //SI ES 2 = DEBAJO

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Lista de Marcas", 1, 1, 'C', 1);
        $this->pdf->SetTextColor(0, 0, 0); 
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(15, 8, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(55, 8, utf8_decode('Nombre Marca'), 1, 0, 'C', 0);
        $this->pdf->Cell(40, 8, utf8_decode('Fecha de Registro'), 1, 0, 'C', 0);
        $this->pdf->Cell(65, 8, utf8_decode('Nombre Usuario'), 1, 1, 'C', 0);

        $lista=$this->reporte_model->reporteMarcas();
        $lista=$lista->result();
        //$actividad = $this->reporte_model->listaventa();
        //$actividad = $actividad->result();
        $num = 1;
        foreach($lista as $row){

            $descripcion = $row->nombre;
            $fecha = $row->fechaRegistro;
            $NombreUsuario = $row->nombres.' '.$row->primerApellido.' '.$row->segundoApellido;

            $this->pdf->SetFont('Arial', '', 8);
            $this->pdf->Cell(15, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(55, 5, utf8_decode($descripcion), 1, 0, 'C', false);
            $this->pdf->Cell(40, 5, utf8_decode( formatearSoloFecha($fecha)), 1, 0, 'C', false);
            $this->pdf->Cell(65, 5, utf8_decode($NombreUsuario), 1, 0, 'C', false);
            $this->pdf->Ln();

            $num++;
        }
        
        $this->pdf->Ln(10);
        
        /*$this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($suma), 0, 1, 'R', 0);
        
            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($suma), 0, 1, 'L', 0);*/
        $this->pdf->Output("reporteMarcas.pdf","I");
    }

    //--------------------------------------------- PDF -> REPORTE PROVEEDORES--------------------------------------------------------------------------------
    public function proveedoresPdf()
    {
        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        /* 
        AddPage:
                L Orientacion Horizontal
                P Orientacion Vertical
        Size: tamaño hoja
                A3,A4,A5,Letter,Legal
        */
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte de Proveedores"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,10,'REPORTE PROVEEDORES',0,1,'C',1);
        //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
        $this->pdf->Ln();
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);
        
        //$actividad = $this->reporte_model->listaventa($_POST['idventa']);
        //$actividad = $actividad->result();
        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);
            
        //ANCHO/ALTO/TEXTO/BORDE/ORDEN DE LA SIGUIENTE CELDA/ALINEACION=C=CENTER,R=RIGHT,L=LEFT/FILL 0=NO,1=SI/

        //ORDEN DE LA SIGUIENTE CELDA
        //SI ES 0 = DERECHA
        //SI ES 1 = SIGUIENTE LINEA
        //SI ES 2 = DEBAJO

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Lista de Proveedores", 1, 1, 'C', 1);
        $this->pdf->SetTextColor(0, 0, 0); 
        $this->pdf->SetFont('Arial', 'B', 6);
        //$this->pdf->Cell(15, 8, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(37, 5, utf8_decode('NOMBRE PROVEEDORES'),'LTRB',0,'L',0);
        $this->pdf->Cell(14,5,utf8_decode('NIT'),1, 0, 'L', 0);
        $this->pdf->Cell(40,5,utf8_decode('DIRECCION'),'LTRB',0,'L',0);
        $this->pdf->Cell(15,5,utf8_decode('TELEFONO'),'TBLR',0,'L',0);
        //$this->pdf->Cell(25,5,utf8_decode('Correo'),'TBLR',0,'L',1);
        $this->pdf->Cell(22, 5, utf8_decode('FECHA REGISTRO'),'TBLR',0,'L',0);
        $this->pdf->Cell(47, 5, utf8_decode('NOMBRE USUARIO'), 1, 1, 'L', 0);

        $lista=$this->reporte_model->reporteProveedores();
        $lista=$lista->result();
        //$actividad = $this->reporte_model->listaventa();
        //$actividad = $actividad->result();
        //$num = 1;
        foreach($lista as $row){

            $descripcion = $row->razonSocial;
            $cedulaidentidad=$row->nit;
            $direccion=$row->direccion;
            $telefono=$row->telefono;
            //$correos=$row->correo;
            $fecha = $row->fechaRegistro;
            $NombreUsuario = $row->nombres.' '.$row->primerApellido.' '.$row->segundoApellido;

            $this->pdf->SetFont('Arial', '', 6);
            //this->pdf->Cell(15, 5, $num, 1, 0, 'C', 0);

            $this->pdf->Cell(37,5,utf8_decode($descripcion),'TBLR',0,'L',0);
            $this->pdf->Cell(14,5,utf8_decode($cedulaidentidad),'TBLR',0,'L',0);
            $this->pdf->Cell(40,5,utf8_decode($direccion),'TBLR',0,'L',0);
            $this->pdf->Cell(15,5,utf8_decode($telefono),'TBLR',0,'L',0);
            //$this->pdf->Cell(25,5,utf8_decode($correos),'TBLR',0,'L',0);
            $this->pdf->Cell(22,5,utf8_decode(formatearSoloFecha($fecha)),'TBLR',0,'L',0);
            $this->pdf->Cell(47,5,utf8_decode($NombreUsuario),'TBLR',0,'L',0);
            $this->pdf->Ln();

            //$num++;
        }
        
        $this->pdf->Ln(10);
        
        /*$this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($suma), 0, 1, 'R', 0);
        
            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($suma), 0, 1, 'L', 0);*/
        $this->pdf->Output("reporteProveedores.pdf","I");
    }

        //--------------------------------------------- PDF -> REPORTE PRODUCTO PROVEEDORES--------------------------------------------------------------------------------
    public function productoProveedoresPdf()
    {
        $idProveedor=$_POST['idProveedor'];

        $lista=$this->reporte_model->reporteProductoProveedor($idProveedor);
        $lista=$lista->result();
        
        foreach($lista as $rows){
        $proveedor1=$rows->razonSocial;
        }

        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');
        /* 
        AddPage:
                L Orientacion Horizontal
                P Orientacion Vertical
        Size: tamaño hoja
                A3,A4,A5,Letter,Legal
        */
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte de Productos por Proveedores"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(50,25,56); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,10,'REPORTE PRODUCTOS POR PROVEEDORES: '.$proveedor1,0,1,'C',1);
        //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
        $this->pdf->Ln();
        $this->pdf->Image("uploads/membrete1.png", 147, 21, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Ln(8);
        
        //$actividad = $this->reporte_model->listaventa($_POST['idventa']);
        //$actividad = $actividad->result();
        $nombres = $this->session->userdata('nombres');
        $apellido = $this->session->userdata('primerApellido');
        $apellido2 = $this->session->userdata('segundoApellido');
        $nombreUsuario = $nombres.' '.$apellido.' '.$apellido2;
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode($nombreUsuario), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode('Calle Jordan Nro.152'), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("d/m/Y"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(30, 5, utf8_decode(utf8_decode(date("H:i:s"))), 0, 1, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);
            
        //ANCHO/ALTO/TEXTO/BORDE/ORDEN DE LA SIGUIENTE CELDA/ALINEACION=C=CENTER,R=RIGHT,L=LEFT/FILL 0=NO,1=SI/

        //ORDEN DE LA SIGUIENTE CELDA
        //SI ES 0 = DERECHA
        //SI ES 1 = SIGUIENTE LINEA
        //SI ES 2 = DEBAJO

        $this->pdf->Ln(15);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->SetFillColor(86,61,106);
        $this->pdf->SetTextColor(255, 255, 255);
        $this->pdf->Cell(175, 10, "Lista de Productos por Proveedores", 1, 1, 'C', 1);
        $this->pdf->SetTextColor(0, 0, 0); 
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(10, 5, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(23, 5, utf8_decode('MARCA'),1, 0, 'C', 0);
        $this->pdf->Cell(44,5,utf8_decode('PRODUCTO'),1, 0, 'C', 0);
        $this->pdf->Cell(23,5,utf8_decode('CATEGORIA'),1, 0, 'C', 0);
        $this->pdf->Cell(15,5,utf8_decode('STOCK'),1, 0, 'C', 0);
        $this->pdf->Cell(30, 5, utf8_decode('PRECIO COMPRA'),1, 0, 'C', 0);
        $this->pdf->Cell(30, 5, utf8_decode('PRECIO VENTA'), 1, 1, 'C', 0);

        //$lista=$this->reporte_model->reporteProveedores();
        //$lista=$lista->result();
        //$actividad = $this->reporte_model->listaventa();
        //$actividad = $actividad->result();
        //$num = 1;
       // $this->pdf->SetFont('Arial','',8);// el FONT para la parte de abajo del documento
        $num = 1;//nos creamos un correlativo 
        foreach($lista as $row){

            $marca = $row->nombrem;
            $producto=$row->nombrep;
            $categoria=$row->nombrec;
            $stock=$row->stock;
            $precioc = $row->precioCompra;
            $preciov = $row->precioVenta;



            $this->pdf->SetFont('Arial', '', 7);
            $this->pdf->Cell(10,5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(23,5,utf8_decode($marca), 1, 0, 'C', false);
            $this->pdf->Cell(44,5,utf8_decode($producto), 1, 0, 'C', false);
            $this->pdf->Cell(23,5,utf8_decode($categoria), 1, 0, 'C', false);
            $this->pdf->Cell(15,5,utf8_decode($stock), 1, 0, 'C', false);
            $this->pdf->Cell(30,5,utf8_decode($precioc), 1, 0, 'C', false);
            $this->pdf->Cell(30,5,utf8_decode($preciov), 1, 0, 'C', false);
            $this->pdf->Ln();

            $num++;
        }
        
        $this->pdf->Ln(10);
        
        /*$this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(25, 7, utf8_decode($suma), 0, 1, 'R', 0);
        
            
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(40, 7, convertir($suma), 0, 1, 'L', 0);*/
        $this->pdf->Output("reporteProductosProveedores.pdf","I");
    }

}   
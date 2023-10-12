<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Venta extends CI_Controller
{

    public function index()
    {

        if ($this->session->userdata('tipo') == 'admin') {
            $lista = $this->venta_model->listaventa();
            $data['venta'] = $lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('venta/venta_lista_read', $data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');

            /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        } else {
            $idsucursal=$this->session->userdata('idSucursal');
            $lista = $this->venta_model->listaventaSucursal($idsucursal);
            $data['venta'] = $lista;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelellavendedor');
            $this->load->view('inc/topbargentelella');
            $this->load->view('venta/vendedor/venta_lista_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
    }
    public function index2()
    {
        //NO ACTIVO - NO SE USA PARA NADA
        if ($this->session->userdata('tipo') == 'vendedor') {
            $lista = $this->reporte_model->detalle();
            $data['venta'] = $lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('venta/venta_lista_read', $data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');

            /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        } else {
            redirect('usuario/panel', 'refresh');
        }
    }
    public function vistaAgregarVenta()
    {
        if ($this->session->userdata('tipo') == 'admin') {

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('venta/venta_agregar');
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
                $this->load->view('venta/venta_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('venta/venta_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
    }
    public function vistaActualizar()
    {
        $idVenta = $this->input->post('idVenta');

        $data['venta'] = $this->venta_model->recuperarVenta($idVenta);

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('venta/venta_formulario_update', $data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }


    public function buscar()
    {
        $search_data = $this->input->post('producto');

        $query = $this->venta_model->buscarProducto($search_data);
        $datos = json_encode($query->result());
        if (!empty($query->result())) {


            foreach ($query->result() as $row) {
                echo "<li class='list-group-item'><a href='javascript:void(0)' data-producto='producto'>$row->nombre</a></li>";
            }
        } else {
            echo "<li> <em> No se encuentra... </em> </li>";
        }
    }

    public function productList()
    {  
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->venta_model->getProducts($postData);
        echo json_encode($data);

    }

    public function marcaList()
    {

        // POST data
        $producto = $this->input->post('producto');

        // Get data
        $data = $this->venta_model->getMarcas($producto);

        echo json_encode($data);
    }

    public function clientList()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->venta_model->getClients($postData);

        echo json_encode($data);
    }


    public function insertVenta()
    {

        $data['idCliente'] = $_POST['idCli'];
        $data['idUsuario'] =  $_SESSION['idusuario'];
        $data['estado'] = 1;

        // $data['idVenta'] = $_POST['idCliente'];
        $data['idProducto'] = $_POST['idProducto'];
        $data['cantidad'] =  $_POST['cantidad'];

        $data['precioTotal'] = $_POST['totalPrecio'];

        if ($this->venta_model->registrar($data)) {
            redirect('venta/index', 'refresh');
        };


        // print_r($data);
        // // $this->producto_model->agregarproductos($data);
        // // redirect('producto/index', 'refresh');
    }


    public function modificarVenta()
    {
        $data['precioTotal'] = $_POST['totalPrecio'];
        $data['idCliente'] = $_POST['idclient'];
        $data['idUsuario'] =  $_SESSION['idusuario'];
        $id =  $_POST['idVenta'];
        $data['estado'] = 1;
        $data['idProducto'] = $_POST['idProducto'];
        $data['cantidad'] =  $_POST['cantidad'];


        if ($this->venta_model->actualizar($id, $data)) {
            redirect('venta/index', 'refresh');
        };


        // print_r($data);
        // // $this->producto_model->agregarproductos($data);
        // // redirect('producto/index', 'refresh');
    }

    public function insertVenta2()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->venta_model->registrar($postData);

        echo json_encode($data);
    }
    public function deshabilitarbd($idventa)
    {
        $data['estado'] = '0';
        $this->venta_model->modificarventa($idventa, $data);
        redirect('venta/index', 'refresh');
    }
    //--------------------------------------------------------------------------------------------------//
    public function reportepdf()
    {

       // if ($this->session->userdata('tipo') == 'admin') {

            $req = $this->venta_model->reporteventa($_POST['idventa']);
            $req = $req->result(); //convertir a array bidemencional

            //$this->pdf = new Pdf();
            //$this->pdf->addPage('P', 'A5');
            $this->pdf=new Pdf('P', 'mm', 'letter');
            $this->pdf->AddPage();
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Comprobante Venta"); //título en el encabezado

            $this->pdf->SetLeftMargin(20); //margen izquierdo
            $this->pdf->SetRightMargin(20); //margen derecho
            $this->pdf->SetFillColor(210, 210, 210); //color de fondo
            $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
            $this->pdf->Cell(0,10,'COMPROBANTE DE VENTA',0,1,'C',1);
            //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
            $this->pdf->Ln(5);
            $this->pdf->Image("uploads/membrete1.png", 150, 23, 50, 50, 'PNG');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln(5);

            $actividad = $this->venta_model->reporteventa($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario =$rows->login;
                $fecha =$rows->fechaRegistro;
                $nombreSucursal =$rows->nombreSucursal;
                $direccionSucursal =$rows->direccion;
            }
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode($usuario), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode('Sucursal:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode($nombreSucursal), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode($direccionSucursal), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode(formatearSoloFecha($fecha)), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode(formatearSoloHora($fecha)), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);

   
            $this->pdf->Ln(15);           
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->SetFillColor(0, 0, 0);
            $this->pdf->SetTextColor(255, 255, 255);
            $this->pdf->Cell(170, 8, "Datos del cliente", 0, 1, 'C', 1);
            //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
            //$this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->Ln(3);
            $this->pdf->SetTextColor(0, 0, 0); 
            $this->pdf->SetFont('Arial', 'B', 11);
            $actividad = $this->venta_model->reporteventa($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rowa) {
                $act = $rowa->nombres.' '.$rowa->primerApellido;
            }
            $this->pdf->Cell(50, 7, utf8_decode('Nombre/Razon Social:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->venta_model->reporteventa($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $ci =($rows->cedulaIdentidad);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('C.I./NIT:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($ci), 0, 1, 'L', 0);

            $this->pdf->Ln(5);
            $this->pdf->Ln(3);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->SetTextColor(255, 255, 255);
            $this->pdf->Cell(170, 10, "Detalle Venta", 1, 1, 'C', 1);
            $this->pdf->SetTextColor(0, 0, 0); 
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
            $this->pdf->Cell(80, 8, utf8_decode('Detalle de Producto'), 1, 0, 'C', 0);
            $this->pdf->Cell(30, 8, utf8_decode('P/U (Bs.)'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('Cantidad'), 1, 0, 'C', 0);
            $this->pdf->Cell(30, 8, utf8_decode('Subtotal (Bs.)'), 1, 1, 'C', 0);


            $actividad = $this->venta_model->reporteventa($_POST['idventa']);
            $actividad = $actividad->result();
            $num = 1;
            foreach ($req as $row) {

                $descripcion = $row->nombreMarca.' - '.$row->nombreModelo.' - '.$row->color;
                $precio = $row->precio;
                $cantidad = $row->cantidad;
                $total = $row->precioVenta;

                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
                $this->pdf->Cell(80, 5, utf8_decode($descripcion), 1, 0, 'L', false);
                $this->pdf->Cell(30, 5, utf8_decode($precio), 1, 0, 'C', false);
                $this->pdf->Cell(20, 5, utf8_decode($cantidad), 1, 0, 'C', false);
                $this->pdf->Cell(30, 5, utf8_decode($total), 1, 0, 'C', false);
                $this->pdf->Ln();

                $num++;
            }


            $this->pdf->Ln(10);
            $actividad = $this->reporte_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $total1 = $row->total;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(25, 7, utf8_decode($total1), 0, 1, 'R', 0);
            
                
            $this->pdf->Ln(5);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(40, 7, convertir($total1), 0, 1, 'L', 0);

           /* $this->pdf->Ln(80);
            $this->pdf->Cell(50,7,utf8_decode('Fecha de impresion:'),0,0,'L',0);
            $this->pdf->SetFont('Arial','',11);
            $this->pdf->Cell(0,7,utf8_decode(date("d/m/Y")),0,1,'L',0);*/

            $this->pdf->Output("DetalleVenta.pdf", "I");
        /*} else {
            redirect('venta/index', 'refresh');
        }*/
    }
    public function reportePdfCopia()
    {

        //if ($this->session->userdata('tipo') == 'admin') {

            $req = $this->reporte_model->detalle($_POST['idventa']);
            $req = $req->result(); //convertir a array bidemencional

            //$this->pdf = new Pdf();
            //$this->pdf->addPage('P', 'A5');
            $this->pdf=new Pdf('P', 'mm', 'letter');
            $this->pdf->AddPage();
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Comprobante Venta Copia"); //título en el encabezado

            $this->pdf->SetLeftMargin(20); //margen izquierdo
            $this->pdf->SetRightMargin(20); //margen derecho
            $this->pdf->SetFillColor(210, 210, 210); //color de fondo
            $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
            $this->pdf->Cell(0,10,'COMPROBANTE DE VENTA (COPIA)',0,1,'C',1);
            //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
            $this->pdf->Ln();
            $this->pdf->Image("uploads/membrete1.png", 150, 23, 50, 50, 'PNG');
            $this->pdf->SetFont('Arial', 'B', 10);
                      
            $actividad = $this->reporte_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario =$rows->login;
                $fecha =$rows->fechaRegistro;
                $nombreSucursal =$rows->nombreSucursal;
                $direccionSucursal =$rows->direccion;
            }

            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode('Usuario:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode($usuario), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode('Sucursal:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode($nombreSucursal), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode('Direccion:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode($direccionSucursal), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Fecha: ')), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode(formatearSoloFecha($fecha)), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('Hora: ')), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 9);
            $this->pdf->Cell(30, 5, utf8_decode(formatearSoloHora($fecha)), 0, 1, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(20, 5, utf8_decode(utf8_decode('COCHABAMBA - BOLIVIA')), 0, 0, 'L', 0);

   
            $this->pdf->Ln(15);           
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->SetFillColor(0, 0, 0);
            $this->pdf->SetTextColor(255, 255, 255);
            $this->pdf->Cell(170, 8, "Datos del cliente", 0, 1, 'C', 1);
            //$this->pdf->Cell(0,5,'DE VENTA',0,1,'C',1);
            //$this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->Ln(3);
            $this->pdf->SetTextColor(0, 0, 0); 
            $this->pdf->SetFont('Arial', 'B', 11);
            $actividad = $this->reporte_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rowa) {
                $act = $rowa->nombres.' '.$rowa->primerApellido;
            }
            $this->pdf->Cell(50, 7, utf8_decode('Nombre/Razon Social:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->reporte_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $ci =($rows->cedulaIdentidad);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('C.I./NIT:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($ci), 0, 1, 'L', 0);

            $this->pdf->Ln(5);
            $this->pdf->Ln(3);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->SetTextColor(255, 255, 255);
            $this->pdf->Cell(170, 10, "Detalle Venta", 1, 1, 'C', 1);
            $this->pdf->SetTextColor(0, 0, 0); 
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
            $this->pdf->Cell(80, 8, utf8_decode('Detalle de Producto'), 1, 0, 'C', 0);
            $this->pdf->Cell(30, 8, utf8_decode('P/U (Bs.)'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('Cantidad'), 1, 0, 'C', 0);
            $this->pdf->Cell(30, 8, utf8_decode('Subtotal (Bs.)'), 1, 1, 'C', 0);


            $actividad = $this->reporte_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            $num = 1;
            foreach ($req as $row) {

                $descripcion = $row->nombreMarca.' - '.$row->nombreModelo.' - '.$row->color;
                $precio = $row->precio;
                $cantidad = $row->cantidad;
                $total = $row->precioVenta;

                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
                $this->pdf->Cell(80, 5, utf8_decode($descripcion), 1, 0, 'L', false);
                $this->pdf->Cell(30, 5, utf8_decode($precio), 1, 0, 'C', false);
                $this->pdf->Cell(20, 5, utf8_decode($cantidad), 1, 0, 'C', false);
                $this->pdf->Cell(30, 5, utf8_decode($total), 1, 0, 'C', false);
                $this->pdf->Ln();

                $num++;
            }


            $this->pdf->Ln(10);
            $actividad = $this->reporte_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $total1 = $row->total;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(140, 7, utf8_decode('TOTAL (Bs.):'), 0, 0, 'R', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(25, 7, utf8_decode($total1), 0, 1, 'R', 0);
            
                
            $this->pdf->Ln(5);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(40, 7, convertir($total1), 0, 1, 'L', 0);

           /* $this->pdf->Ln(80);
            $this->pdf->Cell(50,7,utf8_decode('Fecha de impresion:'),0,0,'L',0);
            $this->pdf->SetFont('Arial','',11);
            $this->pdf->Cell(0,7,utf8_decode(date("d/m/Y")),0,1,'L',0);*/

            $this->pdf->Output("DetalleVentaCopia.pdf", "I");
        /*} else {
            redirect('venta/index', 'refresh');
        }*/
    }
}

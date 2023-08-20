<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->producto_model->listaproductos();
            $data['producto']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('producto/producto_lista',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');	
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->producto_model->listaproductos();
                $data['producto']=$lista;
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('producto/contador/producto_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');	
            }
            else
            {
                $lista=$this->producto_model->listaproductos();
                $data['producto']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('producto/vendedor/producto_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            
        }
	}

	public function subirfoto()
	{
        if($this->session->userdata('login'))
        {
            $data['idProducto']=$_POST['idproducto'];

            $this->load->view('inclte/cabecera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('subirform',$data);
            $this->load->view('inclte/pie');
        }
        else
        {
            redirect('usuario/index/2','refresh');
        }
	}
    
    public function subir()
	{
        $idproducto=$_POST['idProducto'];
        $nombrearchivo=$idproducto.".png";

        $config['upload_path']='./uploads/usuarios/';

        $config['file_name']=$nombrearchivo;

        $direccion="./uploads/usuarios/".$nombrearchivo;

        if(file_exists($direccion))
        {
            unlink($direccion);
        }
        $config['allowed_types']='jpg|png';
        $this->load->library('upload',$config);
        
        if(!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors();
        }
        else{
            $data['foto']=$nombrearchivo;
            $this->producto_model->modificarproducto($idproducto,$data);
            $this->upload->data();

        }

        redirect('producto/indexlte','refresh');
	}

    public function agregar()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;
            $lista=$this->proveedor_model->listaproveedores();
            $data['proveedor']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('producto/producto_agregar',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->marca_model->listamarcas();
                $data['marca']=$lista;
                $lista=$this->categoria_model->listacategorias();
                $data['categoria']=$lista;
                $lista=$this->proveedor_model->listaproveedores();
                $data['proveedor']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('producto/contador/producto_agregar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $lista=$this->marca_model->listamarcas();
                $data['marca']=$lista;
                $lista=$this->categoria_model->listacategorias();
                $data['categoria']=$lista;
                $lista=$this->proveedor_model->listaproveedores();
                $data['proveedor']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('producto/vendedor/producto_agregar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function agregarbd()
	{
        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['codigo']=$_POST['Codigo'];
        $data['nombreProducto']=strtoupper($_POST['Nombreproducto']);
        $data['cantidad']=$_POST['Cantidad'];
        $data['precioCompra']=$_POST['Preciocompra'];
        $data['precioVenta']=$_POST['Precioventa'];
        $data['cantidad']=$_POST['Cantidad'];                  
        $data['idMarca']=$_POST['idMarca'];
        $data['idCategoria']=$_POST['idCategoria'];
        $data['idProveedor']=$_POST['idProveedor'];


        $this->producto_model->agregarproducto($data);
        redirect('producto/index','refresh');
	}

    public function eliminarbd()
    {
        $idproducto=$_POST['idproducto'];
        $this->producto_model->eliminarproducto($idproducto);
        redirect('producto/indexlte','refresh');
    }

    public function modificar()
    {
        if($this->session->userdata('rol')=='admin')
        {  
            $idproducto=$_POST['idproducto'];
            $data['infoproducto']=$this->producto_model->recuperarproducto($idproducto);
                  
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;
            $lista=$this->proveedor_model->listaproveedores();
            $data['proveedor']=$lista;
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('producto/producto_modificar',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');	
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $idproducto=$_POST['idproducto'];
                $data['infoproducto']=$this->producto_model->recuperarproducto($idproducto);

                $lista=$this->marca_model->listamarcas();
                $data['marca']=$lista;
                $lista=$this->proveedor_model->listaproveedores();
                $data['proveedor']=$lista;
                $lista=$this->categoria_model->listacategorias();
                $data['categoria']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('producto/contador/producto_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');	
            }
            else
            {
                $idproducto=$_POST['idproducto'];
                $data['infoproducto']=$this->producto_model->recuperarproducto($idproducto);

                $lista=$this->marca_model->listamarcas();
                $data['marca']=$lista;
                $lista=$this->proveedor_model->listaproveedores();
                $data['proveedor']=$lista;
                $lista=$this->categoria_model->listacategorias();
                $data['categoria']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('producto/vendedor/producto_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
    }

    public function modificarbd()
    {
        $idproducto=$_POST['idproducto'];

        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['codigo']=$_POST['Codigo'];
        $data['nombreProducto']=strtoupper($_POST['Nombreproducto']);
        $data['cantidad']=$_POST['Cantidad'];
        $data['precioCompra']=$_POST['Preciocompra'];
        $data['precioVenta']=$_POST['Precioventa'];                 
        $data['idMarca']=$_POST['idMarca'];
        $data['idCategoria']=$_POST['idCategoria'];
        $data['idProveedor']=$_POST['idProveedor'];
        $data['fechaActualizacion']=date('Y-m-d H:i:s');

        $this->producto_model->modificarproducto($idproducto,$data);
        redirect('producto/index','refresh');
    }
    public function deshabilitarbd() 
    {
        $idproducto=$_POST['idproducto'];
        $data['estado']='0';

        $this->producto_model->modificarproducto($idproducto,$data);
        redirect('producto/index','refresh');
    }

    public function habilitarbd() 
    {
        $idproducto=$_POST['idproducto'];
        $data['estado']='1';

        $this->producto_model->modificarproducto($idproducto,$data);
        redirect('producto/deshabilitados','refresh');
    }

    public function deshabilitados()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->producto_model->listaproductosdeshabilitados();
            $data['producto']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('producto/producto_lista_deshabilitados',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->producto_model->listaproductosdeshabilitados();
                $data['producto']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('producto/contador/producto_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $lista=$this->producto_model->listaproductosdeshabilitados();
                $data['producto']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('producto/vendedor/producto_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

	public function indexlte()
	{
        if($this->session->userdata('login'))
        {
            $lista=$this->producto_model->listaproductos();
            $data['producto']=$lista;
    
            $fechaprueba=formatearFecha('2023-06-02 16:00:08');
            $data['fechatest']=$fechaprueba;
    
            $this->load->view('inclte/cabecera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('producto_listalte',$data);
            $this->load->view('inclte/pie');	
        }
        else
        {
            redirect('usuario/index/2','refresh');
        }
	}

    public function vendedorlte()
    {
        if($this->session->userdata('login'))
        {
            $lista=$this->producto_model->listaproductos();
            $data['producto']=$lista;

            $this->load->view('inclte/cabecera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('producto_vendedorlte',$data);
            $this->load->view('inclte/pie');	
        }
        else
        {
            redirect('usuario/index/2','refresh');
        }
    }
}
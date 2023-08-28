<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->proveedor_model->listaproveedores();
            $data['proveedor']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('proveedor/proveedor_lista',$data);
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
                $this->load->view('proveedor/contador/proveedor_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                if($this->session->userdata('rol')=='vendedor')
                {
                    $lista=$this->proveedor_model->listaproveedores();
                    $data['proveedor']=$lista;

                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral_vendedor');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('proveedor/vendedor/proveedor_lista',$data);
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
            }
        }                
	}

    public function agregar()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('proveedor/proveedor_agregar');
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
                $this->load->view('proveedor/contador/proveedor_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral');
                $this->load->view('inc/menusuperior');
                $this->load->view('proveedor/vendedor/proveedor_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function agregarbd()
	{
        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['razonSocial']=strtoupper($_POST['RazonSocial']);
        $data['ciNit']=$_POST['CiNit'];
        $data['telefono']=$_POST['Telefono'];

        $this->proveedor_model->agregarproveedor($data);
        redirect('proveedor/index','refresh');
	}

    public function eliminarbd()
    {
        $idproveedor=$_POST['idproveedor'];
        $this->proveedor_model->eliminarproveedor($idproveedor);
        redirect('proveedor/index','refresh');
    }

    public function modificar()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $idproveedor=$_POST['idproveedor'];
            $data['infoproveedor']=$this->proveedor_model->recuperarproveedor($idproveedor);

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('proveedor/proveedor_modificar',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $idproveedor=$_POST['idproveedor'];
                $data['infoproveedor']=$this->proveedor_model->recuperarproveedor($idproveedor);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('proveedor/contador/proveedor_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $idproveedor=$_POST['idproveedor'];
                $data['infoproveedor']=$this->proveedor_model->recuperarproveedor($idproveedor);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('proveedor/vendedor/proveedor_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        } 
    }

    public function modificarbd()
    {
        $idproveedor=$_POST['idproveedor'];

        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['razonSocial']=strtoupper($_POST['RazonSocial']);
        $data['ciNit']=$_POST['CiNit'];
        $data['telefono']=$_POST['Telefono'];
        $data['fechaActualizacion']=date('Y-m-d H:i:s');
        
        $this->proveedor_model->modificarproveedor($idproveedor,$data);
        redirect('proveedor/index','refresh');
    }
    public function deshabilitarbd() 
    {
        $idproveedor=$_POST['idproveedor'];
        $data['estado']='0';

        $this->proveedor_model->modificarproveedor($idproveedor,$data);
        redirect('proveedor/index','refresh');
    }

    public function deshabilitados()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->proveedor_model->listaproveedoresdeshabilitados();
            $data['proveedor']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('proveedor/proveedor_lista_deshabilitados',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->proveedor_model->listaproveedoresdeshabilitados();
                $data['proveedor']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('proveedor/contador/proveedor_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                
                $lista=$this->proveedor_model->listaproveedoresdeshabilitados();
                $data['proveedor']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('proveedor/vendedor/proveedor_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function habilitarbd() 
    {
        $idproveedor=$_POST['idproveedor'];
        $data['estado']='1';

        $this->proveedor_model->modificarproveedor($idproveedor,$data);
        redirect('proveedor/deshabilitados','refresh');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->cliente_model->listaclientes();
            $data['cliente']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('cliente/cliente_lista',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->cliente_model->listaclientes();
                $data['cliente']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/contador/cliente_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                if($this->session->userdata('rol')=='vendedor')
                {
                    $lista=$this->cliente_model->listaclientes();
                    $data['cliente']=$lista;

                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral_vendedor');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('cliente/vendedor/cliente_lista',$data);
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
            $this->load->view('cliente/cliente_agregar');
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
                $this->load->view('cliente/contador/cliente_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/vendedor/cliente_agregar');
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

        $this->cliente_model->agregarcliente($data);
        redirect('cliente/index','refresh');
	}

    public function eliminarbd()
    {
        $idcliente=$_POST['idcliente'];
        $this->cliente_model->eliminarcliente($idcliente);
        redirect('cliente/index','refresh');
    }

    public function modificar()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $idcliente=$_POST['idcliente'];
            $data['infocliente']=$this->cliente_model->recuperarcliente($idcliente);

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('cliente/cliente_modificar',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $idcliente=$_POST['idcliente'];
                $data['infocliente']=$this->cliente_model->recuperarcliente($idcliente);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/contador/cliente_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $idcliente=$_POST['idcliente'];
                $data['infocliente']=$this->cliente_model->recuperarcliente($idcliente);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/vendedor/cliente_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        } 
    }

    public function modificarbd()
    {
        $idcliente=$_POST['idcliente'];

        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['razonSocial']=strtoupper($_POST['RazonSocial']);
        $data['ciNit']=$_POST['CiNit'];
        $data['telefono']=$_POST['Telefono'];
        $data['fechaActualizacion']=date('Y-m-d H:i:s');
        
        $this->cliente_model->modificarcliente($idcliente,$data);
        redirect('cliente/index','refresh');
    }
    public function deshabilitarbd() 
    {
        $idcliente=$_POST['idcliente'];
        $data['estado']='0';

        $this->cliente_model->modificarcliente($idcliente,$data);
        redirect('cliente/index','refresh');
    }

    public function deshabilitados()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->cliente_model->listaclientesdeshabilitados();
            $data['cliente']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('cliente/cliente_lista_deshabilitados',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->cliente_model->listaclientesdeshabilitados();
                $data['cliente']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/contador/cliente_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                
                $lista=$this->cliente_model->listaclientesdeshabilitados();
                $data['cliente']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/vendedor/cliente_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function habilitarbd() 
    {
        $idcliente=$_POST['idcliente'];
        $data['estado']='1';

        $this->cliente_model->modificarcliente($idcliente,$data);
        redirect('cliente/deshabilitados','refresh');
    }
}
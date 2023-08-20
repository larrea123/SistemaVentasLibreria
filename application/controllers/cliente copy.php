<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index()
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

    public function agregar()
	{
        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('cliente/cliente_agregar');
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');

	}

    public function agregarbd()
	{
        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['nombres']=strtoupper($_POST['Nombres']);
        $data['primerApellido']=strtoupper($_POST['PrimerApellido']);
        $data['segundoApellido']=strtoupper($_POST['SegundoApellido']);
        $data['cedulaIdentidad']=$_POST['CedulaIdentidad'];
        $data['telefono']=$_POST['Telefono'];
        $data['direccion']=strtoupper($_POST['Direccion']);

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
        $idcliente=$_POST['idcliente'];
        $data['infocliente']=$this->cliente_model->recuperarcliente($idcliente);

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('cliente/cliente_modificar',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
    }

    public function modificarbd()
    {
        $idcliente=$_POST['idcliente'];

        $data['nombres']=strtoupper($_POST['Nombres']);
        $data['primerApellido']=strtoupper($_POST['PrimerApellido']);
        $data['segundoApellido']=strtoupper($_POST['SegundoApellido']);
        $data['cedulaIdentidad']=$_POST['CedulaIdentidad'];
        $data['telefono']=$_POST['Telefono'];
        $data['direccion']=strtoupper($_POST['Direccion']);
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
        $lista=$this->cliente_model->listaclientesdeshabilitados();
        $data['cliente']=$lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('cliente/cliente_lista_deshabilitados',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
	}

    public function habilitarbd() 
    {
        $idcliente=$_POST['idcliente'];
        $data['estado']='1';

        $this->cliente_model->modificarcliente($idcliente,$data);
        redirect('cliente/deshabilitados','refresh');
    }
}
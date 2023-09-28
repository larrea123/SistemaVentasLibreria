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
            $data['msg'] = $this->uri->segment(3);

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('cliente/cliente_agregar',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $data['msg'] = $this->uri->segment(3);

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/contador/cliente_agregar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $data['msg'] = $this->uri->segment(3);

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/vendedor/cliente_agregar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function agregarbd()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'RazonSocial',
            'Razon del cliente',
            'required|min_length[3]|max_length[30]|alpha_numeric_spaces',
            array('required'=>'Se requiere ingresar la razon social del cliente.',
                    'min_length'=>'La razon social debe tener al menos 3 caracteres.',
                    'max_length'=>'¡La razon social no debe contener más de 30 caracteres!.',
                    'alpha_numeric_spaces'=>'¡La razon social solo debe contener letras!.'
                    )
        );
        $this->form_validation->set_rules(
            'CiNit',
            'Número de Carnet o Nit del cliente',
            'required|min_length[7]|max_length[12]',
            array('required'=>'Se requiere ingresar el C.I. o Nit del cliente.',
                    'min_length'=>'¡Ingrese un número de carnet o Nit válido!.',
                    'max_length'=>'¡El número de carnet o Nit no debe contener más de 12 caracteres!.'
                    )
        );
        $this->form_validation->set_rules(
            'Telefono',
            'Número de Celular del cliente',
            'required|exact_length[8]|is_natural',
            array('required'=>'Se requiere ingresar el Nro. Celular del cliente.',
                    'exact_length'=>'¡Ingrese un número de celular válido!.',
                    'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                    )
        );

        if($this->form_validation->run()==FALSE)
        {
            if($this->session->userdata('rol')=='admin')
            {

                $data['msg'] = $this->uri->segment(3);

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral');
                $this->load->view('inc/menusuperior');
                $this->load->view('cliente/cliente_agregar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                if($this->session->userdata('rol')=='contador')
                {
                    $data['msg'] = $this->uri->segment(3);

                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral_contador');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('cliente/contador/cliente_agregar',$data);
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
                else
                {
                    $data['msg'] = $this->uri->segment(3);

                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('cliente/vendedor/cliente_agregar',$data);
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
            }
        }
        else{
            $carnet = $_POST['CiNit'];
            $validarcarnet = $this->cliente_model->validarcarnet($carnet);
            if ($validarcarnet->num_rows() > 0) {
                redirect('cliente/agregar/2', 'refresh');
            } 
            else {

                $data['idUsuario']=$this->session->userdata('idusuario');
                $data['razonSocial']=strtoupper($_POST['RazonSocial']);
                $data['ciNit']=$_POST['CiNit'];
                $data['telefono']=$_POST['Telefono'];

                $this->cliente_model->agregarcliente($data);
                redirect('cliente/index','refresh');
            }
        }
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
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'RazonSocial',
            'Razon del cliente',
            'required|min_length[3]|max_length[30]|alpha_numeric_spaces',
            array('required'=>'Se requiere ingresar la razon social del cliente.',
                    'min_length'=>'La razon social debe tener al menos 3 caracteres.',
                    'max_length'=>'¡La razon social no debe contener más de 30 caracteres!.',
                    'alpha_numeric_spaces'=>'¡La razon social solo debe contener letras!.'
                    )
        );
        $this->form_validation->set_rules(
            'CiNit',
            'Número de Carnet o Nit del cliente',
            'required|min_length[7]|max_length[12]',
            array('required'=>'Se requiere ingresar el C.I. o Nit del cliente.',
                    'min_length'=>'¡Ingrese un número de carnet o Nit válido!.',
                    'max_length'=>'¡El número de carnet o Nit no debe contener más de 12 caracteres!.'
                    )
        );
        $this->form_validation->set_rules(
            'Telefono',
            'Número de Celular del cliente',
            'required|exact_length[8]|is_natural',
            array('required'=>'Se requiere ingresar el Nro. Celular del cliente.',
                    'exact_length'=>'¡Ingrese un número de celular válido!.',
                    'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                    )
        );

        if($this->form_validation->run()==FALSE)
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
        else{ 
            $idcliente=$_POST['idcliente'];

            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['razonSocial']=strtoupper($_POST['RazonSocial']);
            $data['ciNit']=$_POST['CiNit'];
            $data['telefono']=$_POST['Telefono'];
            $data['fechaActualizacion']=date('Y-m-d H:i:s');
            
            $this->cliente_model->modificarcliente($idcliente,$data);
            redirect('cliente/index','refresh');
        }
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
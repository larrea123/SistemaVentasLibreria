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
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'NombreProveedor',
            'Ingrese el nombre del proveedor',
            'required|min_length[3]|max_length[30]|alpha_numeric_spaces',
            array('required'=>'Se requiere ingresar el nombre del proveedor.',
                    'min_length'=>'el nombre del proveedor debe tener al menos 3 caracteres.',
                    'max_length'=>'¡el nombre del proveedor no debe contener más de 30 caracteres!.',
                    'alpha_numeric_spaces'=>'¡El nombre del proveedor solo debe contener letras!.'
                    )
        );
        $this->form_validation->set_rules(
            'Telefono',
            'Número de Celular del proveedor',
            'required|exact_length[8]|is_natural',
            array('required'=>'Se requiere ingresar el Nro. Celular del proveedor.',
                    'exact_length'=>'¡Ingrese un número de celular válido!.',
                    'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                    )
        );
        $this->form_validation->set_rules(
            'Correo',
            'Correo Electronico',
            'valid_email',
            array('valid_email'=>'¡El Correo Electronico debe ser uno valido!.'
                )
        );
        $this->form_validation->set_rules(
            'Direccion',
            'Dirección del domicilio del proveedor',
            'required|min_length[6]|max_length[100]',
            array('required'=>'Se requiere ingresar la direccion.',
                    'min_length'=>'La direccion debe tener al menos 6 caracteres.',
                    'max_length'=>'¡La direccion no debe contener más de 100 caracteres!.'
                    )
        );
        

        if($this->form_validation->run()==FALSE)
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
        else{    
            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['nombreProveedor']=strtoupper($_POST['NombreProveedor']);
            $data['correo']=strtoupper($_POST['Correo']);
            $data['telefono']=$_POST['Telefono'];
            $data['direccion']=strtoupper($_POST['Direccion']);

            $this->proveedor_model->agregarproveedor($data);
            redirect('proveedor/index','refresh');
        }
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
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'NombreProveedor',
            'Ingrese el nombre del proveedor',
            'required|min_length[3]|max_length[30]|alpha_numeric_spaces',
            array('required'=>'Se requiere ingresar el nombre del proveedor.',
                    'min_length'=>'el nombre del proveedor debe tener al menos 3 caracteres.',
                    'max_length'=>'¡el nombre del proveedor no debe contener más de 30 caracteres!.',
                    'alpha_numeric_spaces'=>'¡El nombre del proveedor solo debe contener letras!.'
                    )
        );
        $this->form_validation->set_rules(
            'Telefono',
            'Número de Celular del proveedor',
            'required|exact_length[8]|is_natural',
            array('required'=>'Se requiere ingresar el Nro. Celular del proveedor.',
                    'exact_length'=>'¡Ingrese un número de celular válido!.',
                    'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                    )
        );
        $this->form_validation->set_rules(
            'Correo',
            'Correo Electronico',
            'valid_email',
            array('valid_email'=>'¡El Correo Electronico debe ser uno valido!.'
                )
        );
        $this->form_validation->set_rules(
            'Direccion',
            'Dirección del domicilio del proveedor',
            'required|min_length[6]|max_length[100]',
            array('required'=>'Se requiere ingresar la direccion.',
                    'min_length'=>'La direccion debe tener al menos 6 caracteres.',
                    'max_length'=>'¡La direccion no debe contener más de 100 caracteres!.'
                    )
        );
        

        if($this->form_validation->run()==FALSE)
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
        else{  
            $idproveedor=$_POST['idproveedor'];

            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['nombreProveedor']=strtoupper($_POST['NombreProveedor']);
            $data['correo']=strtoupper($_POST['Correo']);
            $data['telefono']=$_POST['Telefono'];
            $data['direccion']=strtoupper($_POST['Direccion']);
            $data['fechaActualizacion']=date('Y-m-d H:i:s');
            
            $this->proveedor_model->modificarproveedor($idproveedor,$data);
            redirect('proveedor/index','refresh');
        }
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
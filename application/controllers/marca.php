<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('marca/marca_lista',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->marca_model->listamarcas();
                $data['marca']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('marca/contador/marca_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                if($this->session->userdata('rol')=='vendedor')
                {
                    $lista=$this->marca_model->listamarcas();
                    $data['marca']=$lista;

                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral_vendedor');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('marca/vendedor/marca_lista',$data);
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
            $this->load->view('marca/marca_agregar');
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
                $this->load->view('marca/contador/marca_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('marca/vendedor/marca_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function agregarbd()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'NombreMarca',
            'Ingrese el nombre de la marca',
            'required|min_length[3]|max_length[30]|alpha_numeric_spaces',
            array('required'=>'Se requiere ingresar el nombre de la marca.',
                    'min_length'=>'el nombre de la marca debe tener al menos 3 caracteres.',
                    'max_length'=>'¡el nombre de la marca no debe contener más de 30 caracteres!.',
                    'alpha_numeric_spaces'=>'¡El nombre de la marca solo debe contener letras!.'
                    )
        );

        if($this->form_validation->run()==FALSE)
        {
            if($this->session->userdata('rol')=='admin')
            {
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral');
                $this->load->view('inc/menusuperior');
                $this->load->view('marca/marca_agregar');
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
                    $this->load->view('marca/contador/marca_agregar');
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
                else
                {
                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('marca/vendedor/marca_agregar');
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
            }
        }
        else{

                $data['idUsuario']=$this->session->userdata('idusuario');
                $data['nombreMarca']=strtoupper($_POST['NombreMarca']);

                $this->marca_model->agregarmarca($data);
                redirect('marca/index','refresh');
        }
	}


    public function eliminarbd()
    {
        $idmarca=$_POST['idmarca'];
        $this->marca_model->eliminarmarca($idmarca);
        redirect('marca/index','refresh');
    }

    public function modificar()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $idmarca=$_POST['idmarca'];
            $data['infomarca']=$this->marca_model->recuperarmarca($idmarca);

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('marca/marca_modificar',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $idmarca=$_POST['idmarca'];
                $data['infomarca']=$this->marca_model->recuperarmarca($idmarca);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('marca/contador/marca_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $idmarca=$_POST['idmarca'];
                $data['infomarca']=$this->marca_model->recuperarmarca($idmarca);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('marca/vendedor/marca_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        } 
    }

    public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'NombreMarca',
            'Ingrese el nombre de la marca',
            'required|min_length[3]|max_length[30]|alpha_numeric_spaces',
            array('required'=>'Se requiere ingresar el nombre de la marca.',
                    'min_length'=>'el nombre de la marca debe tener al menos 3 caracteres.',
                    'max_length'=>'¡el nombre de la marca no debe contener más de 30 caracteres!.',
                    'alpha_numeric_spaces'=>'¡El nombre de la marca solo debe contener letras!.'
                    )
        );

        if($this->form_validation->run()==FALSE)
        {
            if($this->session->userdata('rol')=='admin')
            {
                $idmarca=$_POST['idmarca'];
                $data['infomarca']=$this->marca_model->recuperarmarca($idmarca);

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral');
                $this->load->view('inc/menusuperior');
                $this->load->view('marca/marca_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                if($this->session->userdata('rol')=='contador')
                {
                    $idmarca=$_POST['idmarca'];
                    $data['infomarca']=$this->marca_model->recuperarmarca($idmarca);
        
                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral_contador');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('marca/contador/marca_modificar',$data);
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
                else
                {
                    $idmarca=$_POST['idmarca'];
                    $data['infomarca']=$this->marca_model->recuperarmarca($idmarca);
        
                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral_vendedor');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('marca/vendedor/marca_modificar',$data);
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
            }
        }
        else{
                $idmarca=$_POST['idmarca'];

                $data['idUsuario']=$this->session->userdata('idusuario');
                $data['nombreMarca']=strtoupper($_POST['NombreMarca']);
                $data['fechaActualizacion']=date('Y-m-d H:i:s');
                
                $this->marca_model->modificarmarca($idmarca,$data);
                redirect('marca/index','refresh');
        }
    }
    public function deshabilitarbd() 
    {
        $idmarca=$_POST['idmarca'];
        $data['estado']='0';

        $this->marca_model->modificarmarca($idmarca,$data);
        redirect('marca/index','refresh');
    }

    public function deshabilitados()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->marca_model->listamarcasdeshabilitados();
            $data['marca']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('marca/marca_lista_deshabilitados',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->marca_model->listamarcasdeshabilitados();
                $data['marca']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('marca/contador/marca_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                
                $lista=$this->marca_model->listamarcasdeshabilitados();
                $data['marca']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('marca/vendedor/marca_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function habilitarbd() 
    {
        $idmarca=$_POST['idmarca'];
        $data['estado']='1';

        $this->marca_model->modificarmarca($idmarca,$data);
        redirect('marca/deshabilitados','refresh');
    }

}
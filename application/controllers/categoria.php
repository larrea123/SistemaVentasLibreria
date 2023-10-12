<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('categoria/categoria_lista',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->categoria_model->listacategorias();
                $data['categoria']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('categoria/contador/categoria_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                if($this->session->userdata('rol')=='vendedor')
                {
                    $lista=$this->categoria_model->listacategorias();
                    $data['categoria']=$lista;

                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral_vendedor');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('categoria/vendedor/categoria_lista',$data);
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
            $this->load->view('categoria/categoria_agregar');
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
                $this->load->view('categoria/contador/categoria_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('categoria/vendedor/categoria_agregar');
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function agregarbd()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'NombreCategoria',
            'Ingrese el nombre de la categoria',
            'required|min_length[3]|max_length[30]|alpha_numeric_spaces',
            array('required'=>'Se requiere ingresar el nombre de la categoria.',
                    'min_length'=>'el nombre de la categoria debe tener al menos 3 caracteres.',
                    'max_length'=>'¡el nombre de la categoria no debe contener más de 30 caracteres!.',
                    'alpha_numeric_spaces'=>'¡El nombre de la categoria solo debe contener letras!.'
                    )
        );

        if($this->form_validation->run()==FALSE)
        {
            if($this->session->userdata('rol')=='admin')
            {
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral');
                $this->load->view('inc/menusuperior');
                $this->load->view('categoria/categoria_agregar');
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
                    $this->load->view('categoria/contador/categoria_agregar');
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
                else
                {
                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('categoria/vendedor/categoria_agregar');
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
            }
        }
        else{

            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['nombre']=strtoupper($_POST['NombreCategoria']);

            $this->categoria_model->agregarcategoria($data);
            redirect('categoria/index','refresh');
        }
	}

    public function eliminarbd()
    {
        $idcategoria=$_POST['idcategoria'];
        $this->categoria_model->eliminarcategoria($idcategoria);
        redirect('categoria/index','refresh');
    }

    public function modificar()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $idcategoria=$_POST['idcategoria'];
            $data['infocategoria']=$this->categoria_model->recuperarcategoria($idcategoria);

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('categoria/categoria_modificar',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $idcategoria=$_POST['idcategoria'];
                $data['infocategoria']=$this->categoria_model->recuperarcategoria($idcategoria);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('categoria/contador/categoria_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $idcategoria=$_POST['idcategoria'];
                $data['infocategoria']=$this->categoria_model->recuperarcategoria($idcategoria);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('categoria/vendedor/categoria_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        } 
    }

    public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'NombreCategoria',
            'Ingrese el nombre de la categoria',
            'required|min_length[3]|max_length[30]|alpha_numeric_spaces',
            array('required'=>'Se requiere ingresar el nombre de la categoria.',
                    'min_length'=>'el nombre de la categoria debe tener al menos 3 caracteres.',
                    'max_length'=>'¡el nombre de la categoria no debe contener más de 30 caracteres!.',
                    'alpha_numeric_spaces'=>'¡El nombre de la categoria solo debe contener letras!.'
                    )
        );

        if($this->form_validation->run()==FALSE)
        {
            if($this->session->userdata('rol')=='admin')
            {
                $idcategoria=$_POST['idcategoria'];
                $data['infocategoria']=$this->categoria_model->recuperarcategoria($idcategoria);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral');
                $this->load->view('inc/menusuperior');
                $this->load->view('categoria/categoria_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                if($this->session->userdata('rol')=='contador')
                {
                    $idcategoria=$_POST['idcategoria'];
                    $data['infocategoria']=$this->categoria_model->recuperarcategoria($idcategoria);
    
                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral_contador');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('categoria/contador/categoria_modificar',$data);
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
                else
                {
                    $idcategoria=$_POST['idcategoria'];
                    $data['infocategoria']=$this->categoria_model->recuperarcategoria($idcategoria);
    
                    $this->load->view('inc/cabecera');
                    $this->load->view('inc/menulateral');
                    $this->load->view('inc/menusuperior');
                    $this->load->view('categoria/vendedor/categoria_modificar',$data);
                    $this->load->view('inc/creditos');	
                    $this->load->view('inc/pie');
                }
            }
        }
        else{

                $idcategoria=$_POST['idcategoria'];

                $data['idUsuario']=$this->session->userdata('idusuario');
                $data['nombre']=strtoupper($_POST['NombreCategoria']);
                $data['fechaActualizacion']=date('Y-m-d H:i:s');
                
                $this->categoria_model->modificarcategoria($idcategoria,$data);
                redirect('categoria/index','refresh');
        }
    }
    public function deshabilitarbd() 
    {
        $idcategoria=$_POST['idcategoria'];
        $data['estado']='0';

        $this->categoria_model->modificarcategoria($idcategoria,$data);
        redirect('categoria/index','refresh');
    }

    public function deshabilitados()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->categoria_model->listacategoriasdeshabilitados();
            $data['categoria']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('categoria/categoria_lista_deshabilitados',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $lista=$this->categoria_model->listacategoriasdeshabilitados();
                $data['categoria']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('categoria/contador/categoria_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                
                $lista=$this->categoria_model->listacategoriasdeshabilitados();
                $data['categoria']=$lista;

                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('categoria/vendedor/categoria_lista_deshabilitados',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
	}

    public function habilitarbd() 
    {
        $idcategoria=$_POST['idcategoria'];
        $data['estado']='1';

        $this->categoria_model->modificarcategoria($idcategoria,$data);
        redirect('categoria/deshabilitados','refresh');
    }
}
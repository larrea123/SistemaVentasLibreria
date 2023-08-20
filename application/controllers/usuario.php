<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('login'))
        {
            redirect('usuario/panel','refresh');
        }
        else
        {
            $data['msg']=$this->uri->segment(3);
            $this->load->view('login',$data);
        }
	}

    public function validarusuario()
    {
        $login=$_POST['login'];
        $password=md5($_POST['password']);
        
        $consulta=$this->usuario_model->validar($login,$password);

        if ($consulta->num_rows()>0) 
        {
            foreach($consulta->result() as $row)
            {
                $this->session->set_userdata('idusuario',$row->idUsuario);
                $this->session->set_userdata('login',$row->login);
                $this->session->set_userdata('rol',$row->rol);
                redirect('usuario/panel','refresh');
            }
        } 
        else 
        {
            redirect('usuario/index/1','refresh');
        }
        
    }

    public function panel()
    {
        if($this->session->userdata('login'))
        {
            $rol=$this->session->userdata('rol');
            if($rol=='admin')
            {
                redirect('producto/index','refresh');
            }
            else{
                redirect('producto/index','refresh');
            }
            
        }
        else
        {
            redirect('usuario/index/2','refresh');
        }
    }

	public function index2()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->usuario_model->listausuarios();
            $data['usuario']=$lista;

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('usuario/usuario_lista',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $idusuario=$this->session->userdata('idusuario');
                $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('usuario/contador/usuario_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $idusuario=$this->session->userdata('idusuario');
                $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
    
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('usuario/vendedor/usuario_lista',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            
        }
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('usuario/index/3','refresh');
    }

   /* public function indexlte()
	{
        if($this->session->userdata('login'))
        {
            $lista=$this->usuario_model->listausuarios();
            $data['usuario']=$lista;
    
            $this->load->view('inclte/cabecera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('usuario_listalte',$data);
            $this->load->view('inclte/pie');	
        }
        else
        {
            redirect('usuario/index/2','refresh');
        }
	}*/

    public function agregar()
	{
        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('usuario/usuario_agregar');
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');

	}

    public function agregarbd()
	{
        $data['login']=$_POST['Login'];
        $data['password']=md5($_POST['Password']);
        $data['rol']=$_POST['Rol'];
        $data['nombres']=strtoupper($_POST['Nombres']);
        $data['primerApellido']=strtoupper($_POST['PrimerApellido']);
        $data['segundoApellido']=strtoupper($_POST['SegundoApellido']);
        $data['cedulaIdentidad']=$_POST['CedulaIdentidad'];
        $data['telefono']=$_POST['Telefono'];
        $data['direccion']=strtoupper($_POST['Direccion']);

        $this->usuario_model->agregarusuario($data);
        redirect('usuario/index2','refresh');
	}

    public function eliminarbd()
    {
        $idusuario=$_POST['idusuario'];
        $this->usuario_model->eliminarusuario($idusuario);
        redirect('usuario/index','refresh');
    }

    public function modificar()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $idusuario=$_POST['idusuario'];
            $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);

            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('usuario/usuario_modificar',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $idusuario=$_POST['idusuario'];
                $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('usuario/contador/usuario_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $idusuario=$_POST['idusuario'];
                $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
    
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('usuario/vendedor/usuario_modificar',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }

    }

    public function modificarbd()
    {
        $idusuario=$_POST['idusuario'];

        $data['login']=$_POST['Login'];
        $data['password']=md5($_POST['Password']);
        $data['rol']=$_POST['Rol'];
        $data['nombres']=strtoupper($_POST['Nombres']);
        $data['primerApellido']=strtoupper($_POST['PrimerApellido']);
        $data['segundoApellido']=strtoupper($_POST['SegundoApellido']);
        $data['cedulaIdentidad']=$_POST['CedulaIdentidad'];
        $data['telefono']=$_POST['Telefono'];
        $data['direccion']=strtoupper($_POST['Direccion']);
        $data['fechaActualizacion']=date('Y-m-d H:i:s');
        
        $this->usuario_model->modificarusuario($idusuario,$data);
        redirect('usuario/index2','refresh');
    }
    public function deshabilitarbd() 
    {
        $idusuario=$_POST['idusuario'];
        $data['estado']='0';

        $this->usuario_model->modificarusuario($idusuario,$data);
        redirect('usuario/index2','refresh');
    }

    public function deshabilitados()
	{
        $lista=$this->usuario_model->listausuariosdeshabilitados();
        $data['usuario']=$lista;

        $this->load->view('inc/cabecera');
        $this->load->view('inc/menulateral');
        $this->load->view('inc/menusuperior');
        $this->load->view('usuario/usuario_lista_deshabilitados',$data);
        $this->load->view('inc/creditos');	
        $this->load->view('inc/pie');
	}

    public function habilitarbd() 
    {
        $idusuario=$_POST['idusuario'];
        $data['estado']='1';

        $this->usuario_model->modificarusuario($idusuario,$data);
        redirect('usuario/deshabilitados','refresh');
    }

    public function perfil()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $idusuario=$this->session->userdata('idusuario');
            $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
            $this->load->view('inc/cabecera');
            $this->load->view('inc/menulateral');
            $this->load->view('inc/menusuperior');
            $this->load->view('usuario/usuario_perfil',$data);
            $this->load->view('inc/creditos');	
            $this->load->view('inc/pie');
        }
        else
        {
            if($this->session->userdata('rol')=='contador')
            {
                $idusuario=$this->session->userdata('idusuario');
                $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_contador');
                $this->load->view('inc/menusuperior');
                $this->load->view('usuario/usuario_perfil',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
            else
            {
                $idusuario=$this->session->userdata('idusuario');
                $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
                $this->load->view('inc/cabecera');
                $this->load->view('inc/menulateral_vendedor');
                $this->load->view('inc/menusuperior');
                $this->load->view('usuario/usuario_perfil',$data);
                $this->load->view('inc/creditos');	
                $this->load->view('inc/pie');
            }
        }
    }
        
}
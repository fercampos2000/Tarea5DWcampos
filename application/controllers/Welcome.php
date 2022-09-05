<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function __construct() {	
	parent::__construct();
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->model('Persona');
} 
	public function index()
	{
		$datos['alumnos'] = $this->Persona->seleccionar_todo();
		$this->load->view('welcome_message', $datos);
	}

	public function agregar()
{
	$persona['nombre'] = $this->input->post('nombre');
	$persona['apellido'] = $this->input->post('apellido');
	$persona['direccion'] = $this->input->post('direccion');
	$persona['movil'] = $this->input->post('movil');
	$persona['email'] = $this->input->post('email');
	$persona['user'] = $this->input->post('usuario');
	$persona['inactivo'] = $this->input->post('inactivo');
	$persona['DPI'] = $this->input->post('DPI');
	$this->Persona->agregar($persona);
	redirect('welcome');
}

public function eliminar($id_alumno){
	$this->Persona->eliminar($id_alumno);
	redirect('welcome');
}

public function editar($id_alumno) {
	$persona['nombre'] = $this->input->post('nombre');
	$persona['apellido'] = $this->input->post('apellido');
	$persona['direccion'] = $this->input->post('direccion');
	$persona['movil'] = $this->input->post('movil');
	$persona['email'] = $this->input->post('email');
	$persona['user'] = $this->input->post('usuario');
	$persona['inactivo'] = $this->input->post('inactivo');
	$persona['DPI'] = $this->input->post('DPI');

	$this->Persona->actualizar($persona, $id_alumno);
	redirect('welcome');
}//end editar
}




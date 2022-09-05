<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlumnosController extends CI_Controller
{
    /**
     * Controlador Alumnos
     * Descripcion: Ejemplo de mantenimiento 
     */
    public function __construct()
    {
        parent::__construct();

        $model = array('Model_alumnos');
        $this->load->model($model);
    }

    /**
     * Carga vista principal
     */
    function index()
    {
        $this->data['resultados'] = $this->Model_alumnos->getAlmnos();
        $this->data['titulo'] = "Mantenimiento de Alumnos | Este es mi titulo";
        $this->data['vista'] = "alumno/index";
        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Carga vista formulario
     */
    public function form()
    {
        $this->data['titulo'] = "Mantenimiento de Alumnos";
        $this->data['vista'] = "alumno/form";
        $this->data['accion'] = site_url('alumnosController/create');
        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Recibe los datos del formulario para crear un nuevo registro
     * @return [type] [retorna vista con datos cargados en edit]
     */
    public function create()
    {
        if ($_POST) {
            $datos = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'direccion' => $this->input->post('direccion'),
                'movil' => $this->input->post('movil'),
                'email' => $this->input->post('email'),
                'inactivo' => $this->input->post('inactivo'),
                'user' => 1
            );

            if ($this->Model_alumnos->create($datos)) {
                $this->session->set_flashdata('eok', 'Registro creado satisfactoriamente');
            } else {
                $this->session->set_flashdata('eerror', 'Ocurrio un error al intentar crear el registro');
            }
            redirect('alumnosController/form/');
        } else {
            $this->session->set_flashdata('eerror', 'Error al guardar el registro, contacte al administrador');
        }
        redirect('alumnosController');
    }
}

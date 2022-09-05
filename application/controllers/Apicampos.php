<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** access library REST_Controller, remember is library is a REST Server resource*/
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Apicampos extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelapi', 'estudiant');        
    }

    public function index_get()
    {
        $datos = $this->estudiant->getEstudiante();
        $this->response($datos);
    }

    function generCodigo($length){
        $codigo = "";
        $codigoAlfaNum = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $map = strlen($codigoAlfaNum);

        for($i = 0; $i < $length; $i++){
        $codigo .= $codigoAlfaNum[mt_rand(0,$map-1)];
        }

        return $codigo;
    }

     
    public function index_post()
    {
        $nombre = $this->input->post("nombre");
        $correo = $this->input->post("correo");
        $codigo = $this->generCodigo(5);
        $carrera = $this->input->post("carrera");
        $year = $this->input->post("year");
        $correlativo = $this->input->post("correlativo");


        $data = array(
            "nombre" => $nombre,
            "correo" => $correo,
            "codigo" => $codigo,
            "carrera" => $carrera,
            "year" => $year,
            "correlativo" => $correlativo,  
        );


        $comprovacionCarne = $this->estudiant->correlatExistente($correlativo);
        $comprovacionCodigp = $this->estudiant->codExistente($codigo);

        if($comprovacionCarne){
            $res['message'] = 'El carnet ingresado ya existe, por favor ingrese uno nuevo';
        }
        elseif($comprovacionCodigp){
            $res['message'] = 'El codigo ingresado ya existe, por lo tanto se genera uno nuevo';
            $codigoNew = $this->generCodigo(5);
        }
        else{
            $datos = $this->estudiant->guardar($data);
            if($datos){
                $res['status'] = 201;
                $res['message'] = 'datos aguardados correctamente';
            }
            else{
                $res['status'] = 400;
                $res['message'] = 'datos no aguardados correctamente';    
            }
        }

        $this->response($res, 200);
    }
}
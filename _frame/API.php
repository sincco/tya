<?php
/************************************
* Control de API
*************************************
*************************************
Rev:
*************************************
@ivanmiranda: 1.0
************************************/
abstract class API{
	protected $_modelo;
	protected $_usuario;
	protected $_password;
	protected $_origen;
	protected $_metodo;
	protected $_endpoint;
	protected $_params;
#El API se contruye con salida JSON y, a menos que al crear la clase se indique lo contrario
# se valida que el token calculado (en base al host que origina la peticion)
# coincida con el que se entrega como uno de los parametros de entrada
# para poder consumir cualquier operacion
	public function __construct(){
        header("Access-Control-Allow-Headers: Cache-Control, Pragma, Origin, Authorization, Content-Type, X-Requested-With");
        header("Access-Control-Allow-Methods: GET, PUT, POST, DELTE");
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json; charset=utf8");
		$this->_metodo = $_SERVER['REQUEST_METHOD'];
		if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    		$_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
    		$this->_origen = $_SERVER['HTTP_ORIGIN'];
		}
		if(isset($_SERVER["PHP_AUTH_USER"]))
			$this->_usuario = $_SERVER["PHP_AUTH_USER"];
		if(isset($_SERVER["PHP_AUTH_PW"]))
			$this->_password = $_SERVER["PHP_AUTH_PW"];

       $this->parseIncomingParams();
	}

	#Cargar cualquier modelo necesario en nuestras operaciones
	protected function cargaModelo($modelo) {
		$rutaModelo = APP_PATH.'_modelos/'.$modelo.'.php';
		$modelo = $modelo.'Modelo';
		if(is_readable($rutaModelo)) {
			require_once $rutaModelo;
			$objModelo = new $modelo;
			return $objModelo;
		}else {
			return null;
		}
	}

	protected function validaToken() {
		if(!array_key_exists('_token', $this->_params)) {
        	$this->respuesta('', 401);
        }elseif($this->_params['_token'] != $this->_token_calculado) {
        	$this->respuesta('', 401);
        }
        exit();
	}

	protected function respuesta($data, $status = 200) {
		header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
		echo json_encode($data);
	}

    private function _cleanInputs($data) {
        $clean_input = Array();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->_cleanInputs($v);
            }
        } else {
            $clean_input = trim(strip_tags($data));
        }
        return $clean_input;
    }

    private function _requestStatus($code) {
        $status = array(  
            200 => 'OK',
            401 => 'No tienes permiso',
            404 => 'Not Found',   
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        ); 
        return ($status[$code])?$status[$code]:$status[500]; 
    }

    private function _generaToken() {
    	$this->_token_calculado = Framework::Encrypt($this->_origen);
    }


    private function parseIncomingParams() {
        $parameters = array();
 
        // first of all, pull the GET vars
        if (isset($_SERVER['QUERY_STRING'])) {
            parse_str($this->_cleanInputs($_SERVER['QUERY_STRING']), $parameters);
        }
 
        // now how about PUT/POST bodies? These override what we got from GET
        $body = file_get_contents("php://input");
        $content_type = false;
        if(isset($_SERVER['CONTENT_TYPE'])) {
            $content_type = $_SERVER['CONTENT_TYPE'];
        }
        $parameters["content"] = $content_type;
        switch($content_type) {
            case "application/json":
                $parameters["data"] = json_decode($body, TRUE);
                $this->format = "json";
                break;
            case "application/x-www-form-urlencoded":
                parse_str($body, $postvars);
                foreach($postvars as $field => $value) {
                    $parameters[$field] = $this->_cleanInputs($value);
                }
                $this->format = "html";
                break;
            default:
                // we could parse other supported formats here
                break;
        }
        $this->_params = $parameters;
    }
}
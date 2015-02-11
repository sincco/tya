<?php
/************************************
* Control generico en el Framework	*
*************************************
*************************************
Rev:
*************************************
@ivanmiranda: 1.0
@ivanmiranda: 1.0.1
	- Carga automática de modelo por default (del mismo nombre que el controlador)
************************************/
abstract class Controlador{
	protected $_vista;
	protected $_modelo;
#Cualquier instancia tiene el atributo de vista inicilizado
	public function __construct(){
		$this->_vista = new Vista();
	#Si existe un modelo con el mismo nombre del controlador, este carga por default
		$this->_modelo = $this->cargaModelo(str_replace("Controlador", "", get_class($this)));
	}
#Cualquier controlador en la aplicacion debe tener un metodo index
	abstract public function index();
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
}
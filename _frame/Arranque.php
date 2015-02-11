<?php
class Arranque{
	public static function ejecuta(Peticion $peticion, $seguridad = null){
		$controlador = $peticion->getControlador()."Controlador";
		$rutaControlador = APP_PATH.'_controladores/'.$peticion->getControlador().'.php';
		$metodo = $peticion->getMetodo();
		$argumentos = $peticion->getArgumentos();
		if(strtolower(trim($peticion->getControlador())) == "api") {
			require_once $rutaControlador;
			$objControlador = new $controlador;
		#LA forma de invocar metodos de una API se basa según el método HTTP por el que se solicitó
			if(is_callable(array($objControlador, $metodo.$peticion->getMetodoHTTP()))) {
				if(!empty($argumentos)){
					call_user_func_array(array($objControlador, $metodo.$peticion->getMetodoHTTP()), $argumentos);
				} else {
					call_user_func(array($objControlador, $metodo.$peticion->getMetodoHTTP()));
				}
			} else {
				header("HTTP/1.1 404 Metodo {$metodo}{$peticion->getMetodoHTTP()} no encontrado");
			}
		} else {
		#Si el archivo que contiene la clase solicitada es accesible...
			if(is_readable($rutaControlador) and strtolower(trim($peticion->getControlador())) != "api"){
			#Si esta activa la validación de acceso a la APP, se invoca el metodo
				if(SECURITY_ACTIVE) {
				#Si la clase de control de seguridad determina que no hay acceso al Controlador/Metodo, se notifica
					if(!$seguridad->Validar_Acceso($peticion->getControlador(), $peticion->getMetodo())){
						throw new SecurityException($peticion->getControlador()."::".$peticion->getMetodo(), 002);
					}
				}
				if(SECURITY_ACTIVE and isset($_POST['__token'])) {
					if($_POST['__token'] != Framework::TokenSesion()) {
						throw new SecurityException("El formulario se ejecutó desde un origen no válido", 001);
					}
				}
			#Entonces crear una instancia
				require_once $rutaControlador;
				$objControlador = new $controlador;
			#Si el metodo solicitado no es accesible o no existe lanzamos el metodo index
			#(que es obligatorio para cualquier controlador)
				if(!is_callable(array($objControlador, $metodo)))
					$metodo = DEFAULT_CONTROLLER;
			#Sabiendo que metodo hay que invocar, se lanza con los argumentos recibidos
			#(siempre y cuando se reciba alguno)
				if(!empty($argumentos)){
					call_user_func_array(array($objControlador, $metodo), $argumentos);
				} else {
					call_user_func(array($objControlador, $metodo));
				}
			}else{
			#--------------------------
			#Controladores Predefinidos
			#--------------------------
				switch (strtolower(trim($peticion->getControlador()))) {
					case "ejecuta":
						$accion = array_shift($argumentos);
						$respuesta = Framework::Ejecuta($metodo, $accion, $argumentos);
						if(is_array($respuesta))
							print_r($respuesta);
						else
							echo $respuesta;
						break;
					case "grid":
						$accion = array_shift($argumentos);
						HTML::DibujaTabla(Framework::Ejecuta($metodo, $accion, $argumentos));
						break;
					case "json":
						print_r(Framework::JSON($metodo, $argumentos));
						break;
					default:
						$tmp = str_replace("Controlador", "", $controlador);
						throw new FrameworkException("El controlador {$tmp} no existe", 1);
						break;
				}
			}
		}
	}
}
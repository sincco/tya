<?php
#Clase para control de los elementos de seguridad del sistema
class TYA {
	public static function dia_horario_texto($dia) {
		switch ($dia) {
			case '1':
				$respuesta = "Lunes";
				break;
			case '2':
				$respuesta = "Martes";
				break;
			case '3':
				$respuesta = "Miércoles";
				break;
			case '4':
				$respuesta = "Jueves";
				break;
			case '5':
				$respuesta = "Viernes";
				break;
			case '6':
				$respuesta = "Sábado";
				break;
			case '7':
				$respuesta = "Domingo";
				break;
		}
		return $respuesta;
	}
}
<?php
class empleadosModelo extends Modelo {

	public function leer($empleado = '', $empresa = 0) {
		if(strlen($empleado) > 0)
			return $this->_db->query("SELECT empleados.id, CONCAT(empleados.nombres, ' ', empleados.apellidos) nombre
					FROM empleados WHERE empleados.empresa = :empresa AND empleados.empleado = :empleado;", array("empleado"=>$empleado, "empresa"=>$empresa));
		else
			return $this->_db->query("SELECT empleados.id, CONCAT(empleados.nombres, ' ', empleados.apellidos) nombre
					FROM empleados WHERE empleados.empresa = :empresa;", array("empresa"=>$empresa));
	}

}
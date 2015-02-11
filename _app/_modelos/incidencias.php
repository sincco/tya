<?php
class incidenciasModelo extends Modelo {

	public function inserta($id_empleado) {
		return $this->_db->insert("INSERT INTO incidencias SET fecha = NOW(), id_empleado = :id_empleado;", array("id_empleado" => $id_empleado));
	}

}
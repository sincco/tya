<?php
class horariosModelo extends Modelo {

	public function cabeceras() {
		return $this->_db->query("SELECT * FROM horarios;");
	}

	public function dias_horario($id) {
		return $this->_db->query("SELECT * FROM horarios_dias WHERE horario = :id;", array("id"=>$id));
	}

	public function leer($id = '') {
		if(strlen($id) > 0)
			return $this->_db->query("SELECT horarios.id,horarios.descripcion,horarios_dias.dia,horarios_dias.entrada,horarios_dias.salida
					FROM horarios INNER JOIN horarios_dias ON horarios.id = horarios_dias.horario WHERE horarios.id = :id;", array("id"=>$id));
		else
			return $this->_db->query("SELECT horarios.id,horarios.descripcion,horarios_dias.dia,horarios_dias.entrada,horarios_dias.salida
					FROM horarios INNER JOIN horarios_dias ON horarios.id = horarios_dias.horario;");
	}

#Activar automaticamente el armado de JSON
	public function json($id = '') {
		if(strlen($id) > 0)
			return $this->_db->query("SELECT horarios.id,horarios.descripcion,horarios_dias.dia,horarios_dias.entrada,horarios_dias.salida
					FROM horarios INNER JOIN horarios_dias ON horarios.id = horarios_dias.horario WHERE horarios.id = :id;", array("id"=>$id));
		else
			return $this->_db->query("SELECT horarios.id,horarios.descripcion,horarios_dias.dia,horarios_dias.entrada,horarios_dias.salida
					FROM horarios INNER JOIN horarios_dias ON horarios.id = horarios_dias.horario;");
	}
}
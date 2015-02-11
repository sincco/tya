<?php
class horariosControlador extends Controlador{	
	public function index() {
		$objHorarios = $this->cargaModelo("horarios");
		$_horarios = $objHorarios->cabeceras();
		$_horario = 0;
		$horarios_dias = array();
		foreach ($_horarios as $key => $value) {
			$value["dias"] = $objHorarios->dias_horario($value["id"]);
			$horarios_dias[$_horario] = $value;
			$_horario++;
		}
		$this->_vista->horarios = $horarios_dias;
		$this->_vista->dibuja("header.tpl");
		$this->_vista->dibuja("portada.tpl");
		$this->_vista->dibuja("footer.tpl");
	}
}

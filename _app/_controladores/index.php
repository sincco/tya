<?php
	class indexControlador extends Controlador{
		public function index(){
			$this->_vista->dibuja("checador.tpl");
		}
	}
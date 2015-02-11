<?php 
class apiControlador extends API {
    public function __construct() {
        parent::__construct(FALSE);
    }

     public function horariosGET() {
        $objHorarios = $this->cargaModelo("horarios");
        $this->respuesta($objHorarios->leer());
     }

     public function horariosPOST() {
        $objHorarios = $this->cargaModelo("horarios");
        $_id = $objHorarios->insertaCabecera($this->_params["data"]);
        if($_id) {
            $this->respuesta(array("id" => $_id));
        } else {
            $this->respuesta(array("error" => "No se pudo insertar el registro"));
        }
     }

    public function incidenciasOPTIONS() {
        $this->respuesta(array("Access"=>"CORS"));
    }

    public function incidenciasPOST() {
        $objEmpleados = $this->cargaModelo("empleados");
        if(isset($this->_params["data"]["empleado"]) && isset($this->_params["data"]["empresa"])) {
            $_idEmpleado = $objEmpleados->leer($this->_params["data"]["empleado"], $this->_params["data"]["empresa"]);
            if($_idEmpleado[0]["id"] > 0) {
                $objModelo = $this->cargaModelo("incidencias");
                $_id = ($objModelo->inserta($_idEmpleado[0]["id"]));
                if($_id) {
                    $this->respuesta(array("id" => $_id));
                } else {
                    $this->respuesta(array("id"=>-1,"error" => "No se pudo insertar el registro"));
                }
            } else {
                $this->respuesta(array("id"=>-1,"error" => "Empleado no registrado"));
            }
        } else {
            $this->respuesta(array("id"=>-1,"error" => "Se espera recibir numero de empleado y empresa"));
        }
    }
 }
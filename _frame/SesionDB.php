<?php
#-------------------------------
#Manejo de sesiones por db
#-------------------------------

class SesionDB implements SessionHandlerInterface {
    private $_db;

    public function open($savePath, $sessionName) {
        $this->_db = new BaseDatos();
        return true;
    }

    public function close() {
        return true;
    }

    public function read($id) {
    #Como todo esta codificado, se decodifca al leer la sesion
        $resultados = $this->_db->query("SELECT data FROM __sesiones
                    WHERE id = :id LIMIT 1;",array("id"=>$id));
        if($resultados) {
            return(string)@Framework::Decrypt($resultados['data']);
        }else {
            return(String)@'';
        }
    }

    public function write($id, $data) {
    #Todo lo almacenado en la sesion se codifica para mayor seguridad
        if(strlen(trim($data)) > 0) {
            $consulta = "REPLACE INTO __sesiones
                        SET id = :id, fecha = NOW(), data = :data;";
            $valores = array("id"=>$id,
                            "data"=>Framework::Encrypt($data));
            return $this->_db->query($consulta, $valores);
        }
    }

    public function destroy($id) {
        $consulta = "DELETE FROM __sesiones
                    WHERE id = :id;";
        $valores = array("id"=>$id);
        $this->_db->query($consulta, $valores);
        session_regenerate_id();
        return true;
    }

    public function gc($maxlifetime) {
        $consulta = "DELETE FROM __sesiones
                    WHERE fecha <= DATE_ADD(NOW(), INTERVAL -".($maxlifetime/60)." SECOND);";
        $this->_db->query($consulta);
        return true;
    }
}

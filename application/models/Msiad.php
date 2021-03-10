<?php
Class Msiad extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database('default');
	}


////METODOS SIAD ADM

	public function sp_login_adm($user,$pass){
		$llamar="CALL sp_login_adm('".$user."','".$pass."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		} else {
			return 0;
		}
	}

////METODOS SIAD DENUNCIANTE

	public function sp_procesar_denuncia($ticket,$vdenuncia,$vcarrera,$vsede,$vcategoria,$vasunto,$fecha){
		$llamar="CALL sp_procesar_denuncia('";
		$llamar.=$ticket."','";
		$llamar.=$vdenuncia."','";
		$llamar.=$vcarrera."','";
		$llamar.=$vsede."','";
		$llamar.=$vcategoria."','";
		$llamar.=$vasunto."','";
		$llamar.=$fecha."');";

		$resultado = $this->db->query($llamar);
	}

	public function sp_consultar_denuncias(){
		$llamar="CALL sp_consultar_denuncias();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_denuncia($ticket){
		$llamar="CALL sp_consultar_denuncia('".$ticket."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_tbl_carreras(){
		$llamar="CALL sp_consultar_carreras();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_tbl_categorias(){
		$llamar="CALL sp_consultar_categorias();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_tbl_sedes(){
		$llamar="CALL sp_consultar_sedes();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_ticket($vticket){
		$llamar="CALL sp_consultar_ticket('";
		$llamar.=$vticket."');";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_total_num_denuncias(){
		$llamar="CALL sp_consultar_total_num_denuncias();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_total_num_denuncias_publicas($sede,$categoria,$carrera,$id){
		$llamar="CALL sp_consultar_total_num_denuncias_publicas(";
		$llamar.= $sede.",";
		$llamar.= $categoria.",";
		$llamar.= $carrera.",";
		$llamar.= $id.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_denuncias_publicas(){
		$llamar="CALL sp_consultar_denuncias_publicas();";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}

	public function sp_consultar_filtros_denuncias_publicas($sede,$categoria,$carrera,$id,$calc_pag,$ne){
		$llamar="CALL sp_consultar_filtros_denuncias_publicas(";
		$llamar.= $sede.",";
		$llamar.= $categoria.",";
		$llamar.= $carrera.",";
		$llamar.= $id.",";
		$llamar.= $calc_pag.",";
		$llamar.= $ne.");";
		$resultado = $this->db->query($llamar);
		mysqli_next_result($this->db->conn_id);
		if($resultado->num_rows()>0){
			return $resultado->result();
		}
	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cprincipal extends CI_Controller {

////CONSTRUCTOR Y METODO INDEX

	function __construct(){
		parent::__construct();
		$this->load->model('Msiad');
	}

	public function index(){
		redirect('Siad');
	}

	////METODOS SOMOS

	public function somos_inicio(){
		$this->load->view('/somos/index');
	}

////METODOS SIAD ADM

	///CARGAR VISTA LOGIN
	public function login(){
		if ($this->session->userdata('user_adm')){
			redirect('ADM/Dashboard');
		} else {
			$this->load->view('/siad_adm/login');
		}
	}

	///CARGAR VISTA DASHBOARD
	public function dashboard(){
		if ($this->session->userdata('user_adm')){
			$this->load->view('/siad_adm/dashboard');
		} else {
			redirect('ADM/Login');
		}
	}

	///CARGAR VISTA DENUNCIAS ADM
	public function denuncias_adm(){
		if ($this->session->userdata('user_adm')){
			$this->load->view('/siad_adm/dashboard');
		} else {
			redirect('ADM/Login');
		}
	}

	///CARGAR VISTA MANEJAR DENUNCIA
	public function manejar_den(){
		if ($this->session->userdata('user_adm')){
			$this->load->view('/siad_adm/dashboard');
		} else {
			redirect('ADM/Login');
		}
	}

	public function iniciar_ses(){
		$user	= addslashes($this->input->post('vuser'));
		$pass	= addslashes($this->input->post('vpass'));
		$rol 	= null;

		$login = $this->Msiad->sp_login_adm($user,$pass);

		//echo $login;

		if ($login){
			foreach ($login as $key){
				$rol	= $key->rol;
			}
		}

		if ($rol != null){
			$sesdata = array(
				'user_adm'	=> $user,
				'rol'		=> $this->encryption->encrypt($rol)
			);
		
			$this->session->set_userdata($sesdata);

		} else {
			return 0;
		}
	}

	public function destacar_den(){

	}

	public function publicar_den(){

	}

	public function eliminar_den(){

	}

	public function responder_den(){

	}

////METODOS SIAD DENUNCIANTE

	public function siad(){

		$data = [];

		if ( isset($_GET['ok']) && isset($_GET['id']) && isset($_GET['asunto']) && isset($_GET['sede']) && isset($_GET['carrera']) && isset($_GET['categoria']) && isset($_GET['denuncia']) && isset($_GET['ticket']) ) {
			$data = array(
				'va' 			=> $_GET['ok'],
				'vid' 			=> $_GET['id'],
				'vasunto' 		=> $_GET['asunto'],
				'vsede' 		=> $_GET['sede'],
				'vcarrera' 		=> $_GET['carrera'],
				'vcategoria' 	=> $_GET['categoria'],
				'vdenuncia' 	=> $_GET['denuncia'],
				'vticket' 		=> $_GET['ticket'],
				'vfecha' 		=> $_GET['fecha']
			);
		}

		$data['cookie'] = $this->session->userdata('cookie');

		$this->load->view('/siad/Vsiad',$data);
	}

	public function denunciar(){

		$a =  $this->input->post('va');

		if ($a) {

			$vasunto			= addslashes($this->input->post('vasunto'));
			$vsede				= addslashes($this->input->post('vsede'));
        	$vcarrera			= addslashes($this->input->post('vcarrera'));
        	$vcategoria			= addslashes($this->input->post('vcategoria'));
        	$vdenuncia			= addslashes($this->input->post('vdenuncia'));

        	if (preg_match_all('/[^0-9]/', $vsede) > 0) {
        		redirect('Siad/Denunciar');
        	}

        	if (preg_match_all('/[^0-9]/', $vcarrera) > 0) {
        		redirect('Siad/Denunciar');
        	}

        	if (preg_match_all('/[^0-9]/', $vcategoria) > 0) {
        		redirect('Siad/Denunciar');
        	}

        	date_default_timezone_set('America/Caracas'); 	//Caracas Uso Horario
        	$date = date('Y-m-d H:i:s'); 					//Now Date

        	$vid = null;
        	$ticket = null;

        	function generarCodigo(){
        		$codigo = "";
        		$caracteres="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        		$max = strlen($caracteres)-1;
        		for($i=0;$i < 10 ;$i++) {
        			$codigo.=$caracteres[mt_rand(0,$max)];
        		}

        		return $codigo;
        	}

        	do {
        		$ticket = generarCodigo();
        		$ticket1 = $this->Msiad->sp_consultar_ticket($ticket);
        	} while ($ticket == $ticket1);

        	$this->Msiad->sp_procesar_denuncia($ticket,$vdenuncia,$vcarrera,$vsede,$vcategoria,$vasunto,$date);

        	$id = $this->Msiad->sp_consultar_denuncia($ticket);

        	foreach ($id as $key) {
        		$vid = $key->ID;
        		$vsede = $key->sede;
        		$vcarrera = $key->carrera;
        		$vcategoria = $key->categoria;
        	}

        	redirect('Siad?ok=true&id='.$vid.'&asunto='.$vasunto.'&sede='.$vsede.'&carrera='.$vcarrera.'&categoria='.$vcategoria.'&denuncia='.$vdenuncia.'&ticket='.$ticket.'&fecha='.$date);
		}

		$data['carreras'] = $this->Msiad->sp_consultar_tbl_carreras();
		$data['categorias'] = $this->Msiad->sp_consultar_tbl_categorias();
		$data['sedes'] = $this->Msiad->sp_consultar_tbl_sedes();

		$data['cookie'] = $this->session->userdata('cookie');

		$this->load->view('/siad/Vdenunciar',$data);
	}

	public function denuncias(){

		$data['datos'] = $this->Msiad->sp_consultar_denuncias_publicas();

		$data['numden'] = $this->Msiad->sp_consultar_total_num_denuncias();

		$data['carreras'] = $this->Msiad->sp_consultar_tbl_carreras();
		$data['categorias'] = $this->Msiad->sp_consultar_tbl_categorias();
		$data['sedes'] = $this->Msiad->sp_consultar_tbl_sedes();

		$data['cookie'] = $this->session->userdata('cookie');

		$this->load->view('/siad/Vdenuncias',$data);
	}

	public function denuncia(){

		$vticket = null;

		if (isset($_POST['vticket'])) {
			$vticket = addslashes($this->input->post('vticket'));

			$data['denuncia'] = $this->Msiad->sp_consultar_denuncia($vticket);

			if ($data['denuncia']) {
				echo "1";
				return false;
				end;
			} else {
				echo "0";
				return false;
				end;
			}
		}

		$ticket = addslashes($this->uri->segment(3));

		$data['denuncia'] = $this->Msiad->sp_consultar_denuncia($ticket);

		$data['cookie'] = $this->session->userdata('cookie');

		$this->load->view('/siad/Vdenuncia',$data);
	}

	public function filtros(){
		$yes = true;

		$sede 			= addslashes($this->input->post('vsede'));
		$categoria 		= addslashes($this->input->post('vcategoria'));
		$carrera 		= addslashes($this->input->post('vcarrera'));
		$id 			= addslashes($this->input->post('vid'));
		$ne				= addslashes($this->input->post('ne'));
		$np 			= addslashes($this->input->post('numpag'));
/* FALTA VALIDAR DE FORMA CORECTA
		if ((preg_match_all('/[^-0-9]/', $sede) > 0) && ($yes == true)) {
        	$yes = false;
        }

        if ((preg_match_all('/[^-0-9]/', $categoria) > 0) && ($yes == true)) {
        	$yes = false;
        }

        if ((preg_match_all('/[^-0-9]/', $carrera) > 0) && ($yes == true)) {
        	$yes = false;
        }

        if ((preg_match_all('/[^-0-9]/', $id) > 0) && ($yes == true)) {
        	$yes = false;
        }
*/
        $data['datos'] = null;

        if ($yes == true) {
        	$te = $this->Msiad->sp_consultar_total_num_denuncias_publicas($sede,$categoria,$carrera,$id);

        	foreach ($te as $key) {
        		$te = $key->total;
        	}

        	$total_pag = round($te / $ne);

        	$calc_pag = ($ne * ($np - 1));

        	$data['ne'] = $ne;
        	$data['num_paginas'] = $total_pag;
        	$data['act_pag'] = $np;
        	$data['datos'] = $this->Msiad->sp_consultar_filtros_denuncias_publicas($sede,$categoria,$carrera,$id,$calc_pag,$ne);
        }

		$this->load->view('/siad/Vdenunciafiltrada',$data);
	}

	public function approvcookies(){
		$this->session->set_userdata('cookie', 'true');
	}
}
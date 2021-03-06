<?php 

class elfeisbuc_modelo extends CI_Model
{

	public function crearUser(){
		if (!is_null( $this->input->post('user_register') )&& (!is_null($this->input->post('email_register'))) && (!is_null($this->input->post('email_register'))) ) {

      $nick  = $this->input->post('user_register');
      $email  = $this->input->post('email_register');
      $pass=$this->input->post('pass_register');

      $arrayDatosUser  = array('nick' => $nick,'email' => $email, 'pass'=> $pass);
       
       // $arrayID = array('id_usuarios' => $userLoginID);
      
                 $this->db->insert('user', $arrayDatosUser);
         
    }

    else {
      return FALSE; 
    }
	}

  public function validarUser(){
      $nick = $this->input->post('user_login');
      $pass = $this->input->post('pass_login');

      $query = $this->db->query('SELECT pass FROM user WHERE nick ="' . $nick . '"');
      $row = $query->row_array();

      if ($row['pass'] == $pass) {
        $this->load->library('session');
        $this->session->set_userdata(array('nick' => $nick));
        //print_r($this->session->userdata('nick'));
        return 1;
      }

      else {

        if (isset($row)) {
          return 2;
        }

        else {
          return 3;
        }  
      }  
  }

  public function obtenerMsg() {

    $queryTodosMensajes = $this->db->query('SELECT * FROM msg ORDER BY fecha DESC');
    return $queryTodosMensajes;
  }

  public function obtenerRsp() {
// que devuelva tb la direccion de la imagen
    $queryRespuestas = $this->db->query('SELECT rsp.*, user.foto_perfil FROM `rsp`, user WHERE rsp.nick_rsp=user.nick ORDER BY fecha_rsp DESC');
    
    return $queryRespuestas;
  }

  public function obtenerIMGpropias() {
    $user = $this->session->userdata('nick');
    $queryTodasMisImagenes = $this->db->query('SELECT * FROM msg WHERE nick_msg = "' . $user . '" AND imagen IS NOT NULL ORDER BY fecha DESC');
    return $queryTodasMisImagenes;
  }

  public function insertarMensaje($imagen) {
    
    if (!is_null($this->input->post('message_text'))) {
      //$imagen entra como parámetro
      $nick = $this->session->userdata('nick');
      $titulo = $this->input->post('message_title');
      $cuerpo = $this->input->post('message_text');

      if ($imagen == ""){
        $arrayMensaje  = array('titulo' => $titulo, 'cuerpo'=> $cuerpo, 'nick_msg'=> $nick,
         'imagen' => NULL);
        $this->db->insert('msg', $arrayMensaje);
      }  

      else {
        $arrayMensaje  = array('titulo' => $titulo, 'cuerpo'=> $cuerpo, 'nick_msg'=> $nick,
         'imagen' => $imagen);
        $this->db->insert('msg', $arrayMensaje);
      }
        
    } 
    
    else {
      return FALSE; 
    }
  }

  public function insertarRespuesta() {
    
    if (!is_null($this->input->post('ask_text'))) {

      $nick_rsp = $this->session->userdata('nick');
      $cuerpo_rsp = $this->input->post('ask_text');
      $id_padre = $this->input->post('id_msg');

      $arrayRespuesta  = array('cuerpo_rsp' => $cuerpo_rsp, 'id_padre'=> $id_padre, 'nick_rsp'=> $nick_rsp);
                  $this->db->insert('rsp', $arrayRespuesta);
    }

    else {
      return FALSE; 
    }
  }

  public function insertarRespuestaPVD() {
    
    if (!is_null($this->input->post('ask_text'))) {

      $nick_emi = $this->session->userdata('nick');
      $nick_rec = $this->input->post('nick_rec');
      $cuerpo_rsp_pvd = $this->input->post('ask_text');
      $id_padre = $this->input->post('id_pvd');

      $arrayRespuestaPVD  = array('cuerpo_rsp_pvd' => $cuerpo_rsp_pvd, 'id_pvd_padre'=> $id_padre, 'nick_emisor'=> $nick_emi, 'nick_receptor'=> $nick_rec);
                  $this->db->insert('rsp_pvd', $arrayRespuestaPVD);
    }

    else {
      return FALSE; 
    }
  }

  public function obtenerDatosUser() {
    $this->load->library('session');
    $user = $this->session->userdata('nick');
    $queryDatosUser = $this->db->query('SELECT * FROM user WHERE nick = "' . $user . '"');
    return $queryDatosUser;
  }

  public function obtenerDatosUnUser($nick_usr) {    
    $queryDatosUser = $this->db->query('SELECT * FROM user WHERE nick = "' . $nick_usr . '"');
    return $queryDatosUser;
  }

  public function updatePerfil($fotoPerfil){
      $nick  = $this->session->userdata('nick');

      $email = $this->input->post('email_perfil');
      $nombre_completo = $this->input->post('nombre_perfil');
      $edad = $this->input->post('edad_perfil');
      $localidad = $this->input->post('localidad_perfil');
      $ocupacion = $this->input->post('ocupacion_perfil');
      $biografia = $this->input->post('biografia_perfil');
      $foto_perfil = $this->input->post('foto_perfil');

      $arrayPerfil  = array('email' => $email,'nombre_completo' => $nombre_completo,'edad' => $edad,'localidad' => $localidad,'ocupacion' => $ocupacion,'biografia' => $biografia,'foto_perfil' => $fotoPerfil);    
             $this->db->where(array('nick' => $nick));
             $this->db->update('user',  $arrayPerfil);
  }

  public function obtenerPVD(){
    $this->load->library('session');
    $user = $this->session->userdata('nick');
    $queryPVD = $this->db->query('SELECT * FROM pvd WHERE nick_receptor = "' . $user . '"');
    return $queryPVD;
  }

  public function obtenerRSP_PVD(){
    $this->load->library('session');
    $user = $this->session->userdata('nick');
    $queryPVD = $this->db->query('SELECT * FROM pvd WHERE nick_receptor = "' . $user . '"');
    return $queryPVD;
  }
}
?>

<?php 

class elfeisbuc_modelo extends CI_Model
{

	public function crearUser()
	{
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

  public function validarUser()
  {
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

  public function obtenerIMGpropias() {
    $user = $this->session->userdata('nick');
    $queryTodasMisImagenes = $this->db->query('SELECT * FROM msg WHERE nick_msg = "' . $user . '" AND imagen IS NOT NULL');
    return $queryTodasMisImagenes;
  }

  public function insertarMensaje() {
    
    if (!is_null($this->input->post('message_text'))) {

      $nick = $this->session->userdata('nick');
      $imagen = $this->input->post('menssage_imagen');
      $titulo = $this->input->post('message_title');
      $cuerpo = $this->input->post('message_text');

      /*if ($imagen == ""){
        $arrayMensaje  = array('titulo' => $titulo, 'cuerpo'=> $cuerpo, 'nick_msg'=> $nick, 'imagen' => NULL);
                  $this->db->insert('msg', $arrayMensaje);
      }
      else {*/
      $arrayMensaje  = array('titulo' => $titulo, 'cuerpo'=> $cuerpo, 'nick_msg'=> $nick, 'imagen' => $imagen);
                  $this->db->insert('msg', $arrayMensaje);
      //}

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
}
?>

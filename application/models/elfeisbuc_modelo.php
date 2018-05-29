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


  public function obtenerMSG() {

    $queryTodosMensajes = $this->db->query('SELECT fecha, titulo, cuerpo, nick_msg FROM msg UNION ALL SELECT fecha_img, titulo_img, img, nick_img FROM img');
    return $queryTodosMensajes;
  }

  public function obtenerIMG() {

    $queryTodasImagenes = $this->db->query('SELECT * FROM img');
    return $queryTodasImagenes;
  }

  /*public function obtenerMsgPropios() {

    $queryTodosMisMensajes = $this->db->query('SELECT * FROM msg WHERE nick_msg = ' . $user);
    return $queryTodosMisMensajes;
  }

  public function obtenerMsgPropios() {

    $queryTodosMisMensajes = $this->db->query('SELECT * FROM msg WHERE nick_msg = ' . $user);
    return $queryTodosMisMensajes;
  }*/

}
?>

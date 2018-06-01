<?php
class elfeisbuc_controller extends CI_Controller {

		public function index(){
        	$this->load->helper(array('form', 'url'));
        	$this->load->view('paginaprincipal_view');
		}

		public function registro(){
			$this->load->helper(array('form', 'url'));
        	$this->load->view('register_view');	
		}

        public function login() {
        	$this->load->helper(array('form', 'url'));
        	$this->load->view('login_view');
        }

        public function perfil(){
            $this->load->library('session');
        	$this->load->helper(array('form', 'url'));
        	$this->formularioDatosUser();
        }

        public function misimagenes(){
            $this->load->library('session');
            $this->load->helper(array('form', 'url'));
            $this->obtenerMisImagenes();
            $this->load->view('footer_view');
        }

        public function home(){
            $this->load->library('session');
            $this->load->helper(array('form', 'url'));
            $this->obtenerTodosMensajes();
            $this->load->view('footer_view');
        }

        public function cerrarSesion() {
            $this->load->library('session');
            $this->load->helper(array('form', 'url'));
            $this->index();
            unset($_SESSION['nick']);
        }

        public function formularioregistro() {
                $danger_open = '<div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-0" role="alert">';
                $danger_btn_close = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>';
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->load->model('elfeisbuc_modelo', '', TRUE);

                $this->form_validation->set_rules('user_register', 'Usuario', 'required|min_length[3]|is_unique[user.nick]', 
            			array(
                            'required' => $danger_open . 'El nombre de usuario es necesario.'. $danger_btn_close .'</div>', 
                            'is_unique' => $danger_open . 'Ya existe una cuenta con ese nick'.$danger_btn_close.'</div>', 
                            'min_length' => $danger_open . 'El %s debe contener más de 3 carácteres.'.$danger_btn_close.'</div>')
            	);
                $this->form_validation->set_rules('email_register', 'Dirección de correo electrónico', 'required|valid_email|is_unique[user.email]',
                        array(
                            'required' => $danger_open . 'Es necesario introducir una dirección de correo electrónico.'.$danger_btn_close.'</div>', 
                            'valid_email' => $danger_open . 'La dirección introducida no es válida'.$danger_btn_close.'</div>', 
                            'is_unique' => $danger_open . 'Ya existe una cuenta con esa dirección de correo electrónico'.$danger_btn_close.'</div>')
                );
                $this->form_validation->set_rules('pass_register', 'Contraseña', 'required',
                        array(
                            'required' => $danger_open . 'Es necesario introducir una contraseña'.$danger_btn_close.'</div>')
                );
                $this->form_validation->set_rules('pass2_register', 'Confirmar contraseña', 'required|matches[pass_register]',
                        array(
                            'required' => $danger_open . 'Es necesario introducir una contraseña'.$danger_btn_close.'</div>', 
                            'matches' => $danger_open . 'Las contraseñas no coinciden'.$danger_btn_close.'</div>')
                );

                if ($this->form_validation->run() == FALSE) {
            			$this->load->helper(array('form', 'url'));
        				$this->load->view('register_view');		
                }
                else {
                		$this->elfeisbuc_modelo->crearUser();
                		echo "<script>alert('El usuario ha sido creado con éxito.')</script>";
                    	$this->load->helper('url');
        				$this->load->view('login_view');	
                }
        }

        public function formulariologin() {
            $danger_open = '<div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-0" role="alert">';
            $danger_btn_close = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>';

    		$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('elfeisbuc_modelo', '', TRUE);

            $this->form_validation->set_rules('user_login', 'Nombre de usuario', 'required', 
            			array(
                            'required' => $danger_open . 'El nombre de usuario es necesario.'.$danger_btn_close.'</div>')
            	);
            $this->form_validation->set_rules('pass_login', 'Contraseña', 'required',
                    array('required' => $danger_open . 'Es necesario introducir una contraseña'.$danger_btn_close.'</div>')
                ); 

            if ($this->form_validation->run() == FALSE) {
            			$this->load->helper(array('form', 'url'));
        				$this->load->view('login_view');		
                }
                else {

                	if ($this->elfeisbuc_modelo->validarUser() == 1){
                        $this->obtenerTodosMensajes();
                        $this->load->view('footer_view');
                	}

                	if ($this->elfeisbuc_modelo->validarUser() == 2){
                		echo "<script>alert('La contraseña introducida no es correcta.')</script>";
        				$this->load->view('login_view');	
                	}

                	else if ($this->elfeisbuc_modelo->validarUser() == 3){
                		echo "<script>alert('El usuario introducido no existe.')</script>";
        				$this->load->view('login_view');	
			        }	
                }                       
        }

        public function obtenerTodosMensajes() {
            $this->load->helper('url');
            $this->load->model('elfeisbuc_modelo', '', TRUE);
            $data['query'] = $this->elfeisbuc_modelo->obtenerMSG();
            $data['query2'] = $this->elfeisbuc_modelo->obtenerRsp();
            $this->load->view('home_view', $data);
        }

        public function obtenerMisImagenes(){
            $this->load->helper('url');
            $this->load->model('elfeisbuc_modelo', '', TRUE);
            $data['query'] = $this->elfeisbuc_modelo->obtenerIMGpropias();
            $data['query2'] = $this->elfeisbuc_modelo->obtenerRsp();
            $this->load->view('img_view', $data);
        }

        public function formularioDatosUser() {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            $this->upload->do_upload('menssage_imagen');
            $fotoPerfil = $this->upload->data('file_name');

             $this->elfeisbuc_modelo->updateFotoPerfil($fotoPerfil);
             
            $this->load->helper(array('form', 'url'));
            $this->load->library(array('form_validation', 'session'));
            $this->load->model('elfeisbuc_modelo', '', TRUE);

            $this->form_validation->set_rules('nick_perfil', 'Nombre de usuario', 'required|min_length[3]', 
                        array(
                            'required' => 'El nombre de usuario es necesario.')
                );

            /*if ($this->form_validation->run() == FALSE) {
                $this->load->helper(array('form', 'url'));
                echo "<script>alert('Ha habido un error en la petición, vuelva a intentarlo.')</script>";
                $this->load->view('perfil_view');     
            }
            else {*/
                
                $data['consulta'] = $this->elfeisbuc_modelo->obtenerDatosUser();
                $this->load->view('perfil_view', $data);
            //}                       
        }

        public function modalController() {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            $this->upload->do_upload('menssage_imagen');
            $imagen = $this->upload->data('file_name');

            $this->load->helper(array('form', 'url'));
            $this->load->library(array('form_validation', 'session'));
            $this->load->model('elfeisbuc_modelo', '', TRUE);
            $this->form_validation->set_rules('message_text', 'Message','required'); 

            if ($this->form_validation->run() !== FALSE) {
                 $this->elfeisbuc_modelo->insertarMensaje($imagen);
                echo "<script>alert('El mensaje se ha insertado.')</script>";
                $this->obtenerTodosMensajes();
                $this->load->view('footer_view');
            }

            else{
                echo "<script>alert('El mensaje NO se ha insertado. Es necesario introducir un mensaje')</script>";
                $this->obtenerTodosMensajes();
                $this->load->view('footer_view');
            }
        }

        public function respuestaMensaje() {
            $this->load->helper(array('form', 'url'));
            $this->load->library(array('form_validation', 'session'));
            $this->load->model('elfeisbuc_modelo', '', TRUE);
            $this->form_validation->set_rules('ask_text', 'Message', 'required'); 

            if ($this->form_validation->run() !== FALSE) {
                $this->elfeisbuc_modelo->insertarRespuesta();
                echo "<script>alert('La respuesta se ha insertado.')</script>";
                $this->obtenerTodosMensajes();
                $this->load->view('footer_view');
            }

            else{
                echo "<script>alert('La respuesta NO se ha insertado. Es necesario introducir un mensaje')</script>";
                $this->obtenerTodosMensajes();
                $this->load->view('footer_view');
            }
        }

}

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

    <title>Feisbuc | Home</title>
  </head>
  <body>
    <nav class="navbar navbar navbar-expand-lg navbar-feisbuc d-flex justify-content-between align-items-center">
      <!-- === Links === -->
      <div class="grid_nav_1 links_home ml-3">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/elfeisbuc_controller/home" class="nav-link nav-faisbuc">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-faisbuc">Notificaciones</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-faisbuc">Mensajes</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/elfeisbuc_controller/misimagenes" class="nav-link nav-faisbuc">Mis fotos</a>
          </li>
        </ul>
      </div>
      <!-- === Logo F === -->
      <!-- <div class="grid_nav_1 logo_home">
        <a href="<?php echo base_url(); ?>index.php/elfeisbuc_controller/formulariologin"><h1>F</h1></a> 
      </div> -->
      <!-- === Panel user === -->
      <div class="grid_nav_1 mr-3">
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 rounded-0" type="search" placeholder="Buscar en Feisbuc..." aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0 rounded-0" type="submit">Buscar</button>
        </form> -->
        <div class="user_nav">
          <div class="dropdown">
            <button class="btn_user dropdown-toggle" type="button" id="drop_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $this->session->userdata('nick'); ?>
            </button>
            <div class="dropdown-menu rounded-0" aria-labelledby="drop_user">
              <a class="dropdown-item" href="#">Perfil</a>
              <a class="dropdown-item" href="#">Ajustes</a>
              <a class="dropdown-item" href="#">Salir</a>
            </div>
            <img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Avatar" class="avatar_user mr-3">
          </div>
        </div>

      </div>
    </nav>

    <!-- === Mensajes === -->
    <div class="grid_home">
      <div class="grid_box_1">
        <!-- caja gris -->
      </div>

      <div class="grid_box_2">
      <div class="caja_mensaje mt-3 d-flex justify-content-center">
        <button type="button" class="btn btn-feisbuk rounded-0 shadow-sm" data-toggle="modal" data-target="#exampleModalCenter">
          Crear mensaje
        </button>
      </div>
        
        <?php 
        foreach ($query->result() as $row) { 

          if ($row->imagen != NULL) {


            echo '<div class="grid_items">
                  <div class="card rounded-0 mb-3 shadow">';

            $data = $row->imagen;
            echo '<div class="img-container"><img src="data:image/jpeg;base64,' . base64_encode($data) . '" class="img-responsive" /></div>';

            echo '<div class="card-body">
              <h5 class="card-title">' . $row->nick_msg . ' dice: ' . $row->titulo . '</h5>
              <p class="card-text">' . $row->cuerpo . '</p>
              <p class="card-text"><small class="text-muted">' .$row->fecha . '</small></p>
              <hr/>
                <a class="btn btn-feisbuk rounded-0 shadow-sm mb-2" data-toggle="collapse" href="#' . $row->id_msg . ' " role="button" aria-expanded="false" aria-controls="' . $row->id_msg . '">
                  Responder
                </a>
       
              <div class="collapse" id="' . $row->id_msg .'">
                
                  <form>
                    <label for="ask_text" class="col-form-label">Responder:</label>
                    <textarea class="form-control rounded-0" id="ask_text" name="ask_text"></textarea>
                    <button type="button" class="btn btn-feisbuk btn-sm shadow-sm rounded-0 mt-3">Enviar</button>
                  </form>
                
              </div>

            </div>
            </div>
          </div>';
          }
          
          else {
            echo '<div class="grid_items shadow">
            <div class="card rounded-0 mb-3">';
            echo '<div class="card-body">
              <h5 class="card-title">' . $row->nick_msg . ' dice: ' . $row->titulo . '</h5>
              <p class="card-text">' . $row->cuerpo . '</p>
              <p class="card-text"><small class="text-muted">' .$row->fecha . '</small></p>
              <hr/>
              <a class="btn btn-feisbuk rounded-0 shadow-sm mb-2" data-toggle="collapse" href="#' . $row->id_msg . '" role="button" aria-expanded="false" aria-controls="' . $row->id_msg . '">
                  Responder
                </a>
       
              <div class="collapse" id="' . $row->id_msg . '">
                
                  <form>
                    <label for="ask_text" class="col-form-label">Responder:</label>
                    <textarea class="form-control rounded-0" id="ask_text" name="ask_text"></textarea>
                    <button type="button" class="btn btn-feisbuk btn-sm shadow-sm rounded-0 mt-3">Enviar</button>
                  </form>
                
              </div>

            </div>
            </div>
          </div>';
          }
        }

        ?>

      </div>

      <div class="grid_box_3">
        <!-- caja gris -->
      </div>

      <!-- === Modal === -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Crear mensaje</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- === Form Crear mensaje === -->
             
               <?php echo validation_errors();  
               echo form_open('elfeisbuc_controller/modalController'); ?>
                <div class="form-group">
                  <label for="menssage_imagen">Subir imagen</label>
                  <input type="file" class="form-control-file" name="menssage_imagen" id="menssage_imagen">

                  <label for="message_title" class="col-form-label">Título:</label>
                  <input class="form-control" id="message_title" name="message_title"></input>

                  <label for="message_text" class="col-form-label">Mensaje:</label>
                  <textarea class="form-control" id="message_text" name="message_text"></textarea>
                </div>
                <div class="d-flex justify-content-center">
                <!-- <button type="button" class="btn btn-secondary btn-sm rounded-0" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-feisbuk btn-sm shadow-sm rounded-0">Enviar</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
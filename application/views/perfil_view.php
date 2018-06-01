<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

    <title>Feisbuc | Perfil</title>
  </head>
  <body>
    <nav class="navbar navbar navbar-expand-lg navbar-feisbuc d-flex justify-content-between align-items-center">
      <!-- === Links === -->
      <div class="grid_nav_1 links_home ml-3">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/elfeisbuc_controller/home" class="nav-link nav-faisbuc active">Inicio</a>
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
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/elfeisbuc_controller/perfil">Perfil</a>
              <a class="dropdown-item" href="#">Ajustes</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/elfeisbuc_controller/cerrarSesion">Salir</a>
            </div>
            <img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Avatar" class="avatar_user mr-3">
          </div>
        </div>

      </div>
    </nav>


    <div class="grid_home">
      <div class="grid_box_1">
        <!-- caja gris -->
      </div>

      <div class="grid_box_2">
	      <div class="mt-3 d-flex justify-content-center">
	     	<h1>Perfil</h1>
	      </div>
        <hr>
        <div class="perfil_caja">
          <img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Avatar">
          <div class="perfil_datos">

            <?php 
            foreach ($consulta->result() as $row) { 

              echo $row->email;
              $attributes = array('class' => 'form-signin');
              echo form_open_multipart('elfeisbuc_controller/formularioDatosUser', $attributes);

              echo '<h1 class="h3 mb-3 font-weight-normal text-center">Modificar datos</h1>
              <br>';

              echo '<label for="menssage_imagen">Cambiar foto perfil</label>
                  <input type="file" class="form-control-file" name="foto_perfil"/><br>
                  <span>Nick</span><br>';
              
              $datosNick = array(
                'name'          => 'nick_perfil',
                'value'         => $this->session->userdata("nick"),
                'class'         => 'form-control',
                'placeholder'   => 'Nick'
              );
              echo form_input($datosNick);?>
              <br>
              <span>Nombre completo</span>
              <?php 
              $datosNombre = array(
                'name'          => 'nombre_perfil',
                'value'         => 'johndoe',
                'class'         => 'form-control',
                'placeholder'   => 'Nombre completo'
              );
              echo form_input($datosNombre);?>
              <br>
              <span>Edad</span>
              <?php 
              $datosEdad = array(
                'name'          => 'edad_perfil',
                'value'         => 'johndoe',
                'class'         => 'form-control',
                'placeholder'   => 'Edad'
              );
              echo form_input($datosEdad);?>
              <br>
              <span>Localidad</span>
              <?php 
              $datosLocalidad = array(
                'name'          => 'localidad_perfil',
                'value'         => 'johndoe',
                'class'         => 'form-control',
                'placeholder'   => 'Localidad'
              );
              echo form_input($datosLocalidad);?>
              <br>
              <span>Ocupación</span>
              <?php 
              $datosOcupacion = array(
                'name'          => 'ocupacion_perfil',
                'value'         => 'johndoe',
                'class'         => 'form-control',
                'placeholder'   => 'Ocupación'
              );
              echo form_input($datosOcupacion);?>
              <br>
              <span>Biografía</span>
              <?php 
              $datosBiografia = array(
                'name'          => 'biografia_perfil',
                'value'         => 'johndoe',
                'class'         => 'form-control',
                'placeholder'   => 'Biografía'
              );
              echo form_textarea($datosBiografia);            
            } ?>
              <br>
             
              <button class="btn btn-lg btn-feisbuk btn-block rounded-0 shadow-sm" type="submit">Actualizar datos</button>
              <?php echo validation_errors(); ?>
            </form>

          </div>
        </div>
      </div>

      <div class="grid_box_3">
        <!-- caja gris -->
      </div>

      
    </div>   

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
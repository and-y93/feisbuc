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
      <div class="grid_nav_1 links_home ml-3">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="#" class="nav-link nav-faisbuc">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-faisbuc">Notificaciones</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-faisbuc">Mensajes</a>
          </li>
        </ul>
        
        
        
      </div>
      <div class="grid_nav_1 logo_home">
        <h1>F</h1>
      </div>
      <div class="grid_nav_1 mr-3">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 rounded-0" type="search" placeholder="Buscar en Feisbuc..." aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0 rounded-0" type="submit">Buscar</button>
        </form>
      </div>
    </nav>

    <!-- === Mensajes === -->
    <div class="grid_home">
      <div class="grid_box_1">
        
      </div>

      <div class="grid_box_2">
        <?php 

        foreach ($query->result() as $row) { 

        echo '<div class="grid_items">
          <div class="card rounded-0 mb-3">
          <img class="card-img-top" src="http://lorempixel.com/780/180/" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">' . $row->nick_msg . ' dice: ' . $row->titulo . '</h5>
            <p class="card-text">' . $row->cuerpo . '</p>
            <p class="card-text"><small class="text-muted">' .$row->fecha . '</small></p>
          </div>
          </div>
        </div>';
        } 
        ?>

      </div>

    </div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
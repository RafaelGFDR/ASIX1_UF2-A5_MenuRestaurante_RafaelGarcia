<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Menu</title>
    <script src="https://kit.fontawesome.com/7822954312.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body class="fondo">
<?php
// El fichero test.xml contiene un documento XML con un elemento raíz y, al
// menos, un elemento /[raiz]/titulo.

if (file_exists('xml/menu.xml')) {
    $menus = simplexml_load_file('xml/menu.xml');
    // print_r($films);
} else {
    exit('Error abriendo test.xml.');
    die();
}
?>
  <!-- barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a href="index.php"><img id="logo" src="img/logo.png" alt=""></a>
    <a class="navbar-brand" href="index.php">MENU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
        $aux=[];
        foreach($menus->menu as $fila){
            if(!in_array((string)$fila['plato'],$aux)){
                echo '<li class="nav-item">';
                if (isset($_GET['plato']) && $_GET['plato']==(string)$fila['plato']) {
                    echo '<a class="nav-link active" href="?plato='.$fila['plato'].'">'.$fila['plato'].'</a>';
                }
                else {
                    echo '<a class="nav-link" href="?plato='.$fila['plato'].'">'.$fila['plato'].'</a>';
                }
                echo '</li>';
                array_push($aux,(string)$fila['plato']);
            }
        }
        ?>
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a> -->
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- slider -->
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/foto1.jpg" class="d-block w-100" alt="Imagén 1">
    </div>
    <div class="carousel-item">
      <img src="./img/foto2.jpg" class="d-block w-100" alt="Imagén 2">
    </div>
    <div class="carousel-item">
      <img src="./img/foto3.jpg" class="d-block w-100" alt="Imagén 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- tabla -->
<div>
  <div>
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nombre del plato</th>
          <th scope="col">Precio</th>
          <th scope="col" class="hidden">Ingredientes</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_GET['plato'])) {
            foreach($menus->menu as $fila){
                if ($_GET['plato']==$fila['plato']) {
                    echo '<tr>';
                    echo '<td>'.$fila->title.'</td>';
                    echo '<td>'.$fila->description.'</td>';
                    echo '<td class="hidden">';
                    foreach($fila->ingredientes->caracteristicas as $ign) {
                      if ($ign =='Carne') {
                        echo '<i class="fa-solid fa-bacon" style="color: #e73636;"></i>  ';
                      }
                      elseif ($ign =='Lacteo') {
                        echo '<i class="fa-solid fa-cheese fa-flip-horizontal" style="color: #ece636;"></i>  ';
                      }
                      elseif ($ign =='Vegano') {
                        echo '<i class="fa-solid fa-wheat-awn" style="color: #4fe360;"></i>  ';
                      }
                      elseif ($ign =='Pescado') {
                        echo '<i class="fa-solid fa-fish" style="color: #5d8fe5;"></i>  ';
                      }
                    }
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }else {
            foreach($menus->menu as $fila){
                echo '<tr>';
                echo '<td>'.$fila->title.'</td>';
                echo '<td>'.$fila->description.'</td>';
                echo '<td class="hidden">';
                foreach($fila->ingredientes->caracteristicas as $ign) {
                  if ($ign =='Carne') {
                    echo '<i class="fa-solid fa-bacon" style="color: #e73636;"></i>  ';
                  }
                  elseif ($ign =='Lacteo') {
                    echo '<i class="fa-solid fa-cheese fa-flip-horizontal" style="color: #ece636;"></i>  ';
                  }
                  elseif ($ign =='Vegano') {
                    echo '<i class="fa-solid fa-wheat-awn" style="color: #4fe360;"></i>  ';
                  }
                  elseif ($ign =='Pescado') {
                    echo '<i class="fa-solid fa-fish" style="color: #5d8fe5;"></i>  ';
                  }
                }
                echo '</td>';
                echo '</tr>';
            }
        }
        ?>

      </tbody>
    </table>
  </div>
</div>


</body>
</html>
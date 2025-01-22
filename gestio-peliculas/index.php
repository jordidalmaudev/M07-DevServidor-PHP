<?php

require './functions/funcions.php';
$conn = connectBD();
session()

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="./css/index.css">
    <title>Gestió Películas | Jordi Dalmau</title>
</head>
<body>
  <?php navBar(); ?> 
    <div class="container">

        <div class="row my-5">
            <h1 class="text-center">Llistat d'Actors</h1>
            <p class="text-center">Col·lecció de dades filmogràfiques</p>
        </div>

    <div class="row justify-content-center">
        <?php
        try {
            $sql = "SELECT actor.*, pais.nombrePais 
                    FROM actor 
                    JOIN pais ON actor.nacionalidadActor = pais.idPais";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $listaActores = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($listaActores as $actor) {
                echo "
                <div class='col-md-6'>
                    <div class='card shadow mb-3' style='max-width: 450px; height: 150px;'>
                      <div class='row no-gutters'>
                        <div class='col-md-4'>
                          <img src='{$actor['imagen']}' class='card-img' alt='{$actor['nombreActor']}'>
                        </div>
                        <div class='col-md-8'>
                          <div class='card-body'>
                            <h5 class='card-title'>{$actor['nombreActor']}</h5>
                            <p class='card-text'>Nacionalitat: {$actor['nombrePais']}</p>
                            <p class='card-text'>
                                <a href='./vistas/modificarActor.php?id={$actor['idActor']}' class='btn btn-success'>Modificar</a>
                                <a href='./vistas/eliminarActor.php?id={$actor['idActor']}' class='btn btn-danger'>Eliminar</a>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                ";
            }
        } catch(PDOException $excepcion) {
            echo "Error en la consulta de tipo " . $excepcion->getMessage();
        }
        ?>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
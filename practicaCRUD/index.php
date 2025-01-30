<?php

require_once 'db.php';
$conn = connectBD();

try {
    $sql = "SELECT * FROM pelicula";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


// Si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $idPelicula = $_POST['pelicula'];

    $sql = "SELECT idActor, personaje FROM interpretacion WHERE idPelicula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([strip_tags($idPelicula)]);
    $actores = $stmt->fetchAll(PDO::FETCH_ASSOC);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Peliculas y Actores</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Selecciona una película</h2>
                <form class="form-group" action="index.php" method="POST">
                    <label for="pelicula">Escoge una película</label>
                    <select name="pelicula" id="pelicula">
                        <?php
                        foreach ($peliculas as $pelicula) {
                            echo "<option value='" . $pelicula['idPelicula'] . "'>" . $pelicula['tituloPelicula'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <div class="col-6">
                <h2>Info Actores</h2>

                <?php

            
                if (isset($actores)) {
                    echo "<ul>";
                    foreach ($actores as $actor) {
                        echo "<li>Actor: " . $actor['idActor'] . " - Personaje: " . $actor['personaje'] . "</li>";
                    }
                    echo "</ul>";
                }

                // mostrar 
                ?>
            </div>
        </div>
    </div>
</body>
</html>


<?php

require './functions/functions.php';
$conn = connectBD();
session();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="./css/index.css">
    <title>Examen - Jordi Dalmau</title>
</head>
<section class="container">
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a href="./controladores/logout.php">Logout</a>
    
  </div>
</nav>

<h1 class="my-4 text-center text-primary">Examen de preguntas</h1>
<?php
try {
    // consulta preguntas
    $sql = "SELECT * FROM preguntas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $listaPreguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // consulta respuestas
    $sqlRespuestas = "SELECT * FROM respuestas";
    $stmtRespuestas = $conn->prepare($sqlRespuestas);
    $stmtRespuestas->execute();
    $listaRespuestas = $stmtRespuestas->fetchAll(PDO::FETCH_ASSOC);
?>

<form class="form-group" action="index.php" method="POST">
<?php
    foreach ($listaPreguntas as $pregunta) {
        echo "<h2>{$pregunta['pregunta']}</h2>";
        foreach ($listaRespuestas as $respuesta) {
            if ($pregunta['id_pregunta'] === $respuesta['id_pregunta']): ?>
            <div class="d-flex gap-2">
                <input type="radio" name="<?= 'pregunta' . $pregunta['id_pregunta'] ?>" value="<?= $respuesta['id_respuesta'] ?>"> <?= $respuesta['respuesta'] ?> </input>
            </div>
                <?php
            endif;
        }
    }
} catch(PDOException $excepcion) {
    echo "Error en la consulta de tipo " . $excepcion->getMessage();
}
?>
<br>
<div class="d-grid gap-2">
<button type="submit" class="btn btn-primary btn-lg btn-block"> ENVIAR RESPUESTA</button>
</div>
</form>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correctas = 0;
    $total = 0;

    foreach ($_POST as $key => $value) {
        $id_respuesta = $value;
        $sql = "SELECT es_correcta FROM respuestas WHERE id_respuesta = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([strip_tags($id_respuesta)]);
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($respuesta['es_correcta']) {
            $correctas++;
        }
        $total++;
    }
    echo "<h2 class='mt-5'>Resultado</h2>";
    echo "<h3>Has acertado $correctas de $total preguntas.</h3>";
}
?>
</section>
</body>
</html>
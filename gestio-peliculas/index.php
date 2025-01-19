<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió Películas | Jordi Dalmau</title>
</head>
<body>
<h1>Gestió Películas</h1>
<p>Col·lecció de dades filmogràfiques</p>

<?php

require 'connexio.php';
$conn = connectBD();

?>

<a href="insertActor.php">CREAR UN NUEVO ACTOR</a>
<a href="insertPais.php">AÑADE UN PAIS</a>
<table>
<thead>
        <tr>
            <th>Imagen</th>
            <th>Nacionalidad</th>
            <th>Nombre Actor</th>
            <th>Acciones</th>
        </tr>
</thead>
<tbody>
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
            <tr>
                <td><img src='{$actor['imagen']}' alt='Imagen del actor' style='width: 100px; height: auto;'></td>
                <td>{$actor['nombrePais']}</td>
                <td>{$actor['nombreActor']}</td>
                <td><a href='modificarActor.php?id={$actor['idActor']}'>Modificar</a> | <a href='eliminarActor.php?id={$actor['idActor']}'>Eliminar</a></td>
            </tr>
        ";
    }
} catch(PDOException $excepcion) {
    echo "Error en la consulta de tipo " . $excepcion->getMessage();
}
?>
</tbody>
</table>
</body>
</html>

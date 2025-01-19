<h1>Gestió Películas</h1>

<?php

require 'connexio.php';
$conn = connectBD();

?>

<a href="insertActor.php">CREAR UN NUEVO ACTOR</a>
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
    $sql = "SELECT * FROM actor";
    $listaActores = $conn->query($sql);

    while ($actor = $listaActores->fetch(PDO::FETCH_ASSOC)) {
        echo "
            <tr>
                <td><img src={$actor['imagen']} alt='Imagen del actor' style='width: 100px; height: auto;'></td>
                <td>{$actor['nacionalidadActor']}</td>
                <td>{$actor['nombreActor']}</td>
                <td><a href='modificarActor.php?id={$actor['idActor']}'>Modificar</a> | <a href='eliminarActor.php?id={$actor['idActor']}'>Eliminar</a></td>
            </tr>
        ";
    }
} catch(PDOExcepcion $excepcion) {
    echo "Error en la consulta de tipo " . $excepcion->getMessage();
}
?>
</tbody>
</table>

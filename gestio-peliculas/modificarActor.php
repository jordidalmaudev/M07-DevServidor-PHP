<?php

include 'connexio.php';
$conn = connectBD();

$id = $_GET['id'];

// Obtener actor por id
$query = "SELECT * FROM actor WHERE idActor = $id";
$stmt = $conn->prepare($query);
$stmt->execute();
$actor = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener la lista de países
$query = "SELECT idPais, nombrePais FROM pais";
$stmt = $conn->prepare($query);
$stmt->execute();
$paises = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form action="modificar_actor.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nombreActor">Nombre del Actor:</label>
    <input type="text" id="nombreActor" name="nombreActor" value="<?php echo $actor['nombreActor']?>"><br>

    <label for="nacionalidadActor">Nacionalidad del Actor:</label>
    <select id="nacionalidadActor" name="nacionalidadActor" >
    <?php foreach ($paises as $pais): ?>
            <option value="<?php echo $pais['idPais']; ?>" <?php echo ($pais['idPais'] == $actor['nacionalidadActor']) ? 'selected' : ''; ?>>
                <?php echo $pais['nombrePais']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="imagen">Imagen del Actor (URL):</label>
    <input type="text" id="imagen" name="imagen" value="<?php echo $actor['imagen']; ?>"><br>

    <input type="submit" value="Editar Actor">
</form>

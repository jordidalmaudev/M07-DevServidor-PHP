<?php

require '../functions/funcions.php';
$conn = connectBD();

$id = $_GET['id'];

$sql = "SELECT * FROM pais WHERE idPais = $id";
$stm = $conn->prepare($sql);
$stm->execute();
$pais = $stm->fetch(PDO::FETCH_ASSOC);

?>

<form action="../controladores/modificar_pais.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nombrePais">Nom del país:</label>
    <input type="text" name="nombrePais" id="nombrePais" value="<?php echo $pais['nombrePais'] ?>" required>
    <input type="submit" value="Modificar">
</form>

Volver al <a href="insertPais.php">listado de paises</a>
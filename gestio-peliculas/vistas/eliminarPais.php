<?php
require '../db/connexio.php';
$conn = connectBD();

$idPais = $_GET['id'];

$sql = "SELECT * FROM pais WHERE idPais = $idPais";
$stmt = $conn->prepare($sql);
$stmt->execute();
$pais = $stmt->fetch();

?>

<h1>Eliminar país</h1>
<p>¿Estás seguro de que quieres eliminar el país <?=$pais['nombrePais']?>?</p>

<form action="../controladores/eliminar_pais.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $idPais ?>">
    <input type="submit" value="Eliminar País">
</form>

 <a href="insertPais.php">Volver a la lista de países</a>
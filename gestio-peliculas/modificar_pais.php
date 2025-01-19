<?php
include 'connexio.php';
$conn = connectBD();

try {
$idPais = $_POST['id'];
$nombrePais = $_POST['nombrePais']; 

$sql = "UPDATE pais SET nombrePais = '$nombrePais' WHERE idPais = $idPais";

$stm = $conn->prepare($sql);
$stm->execute();

echo "País modificado correctamente.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
<a href="insertPais.php">Volver a la lista de países</a>

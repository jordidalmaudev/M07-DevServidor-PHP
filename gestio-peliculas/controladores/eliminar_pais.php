<?php
require '../db/connexio.php';
$conn = connectBD();

$idPais = $_POST['id'];

try {
    // Verificar si el país está relacionado con algún actor
    $query = "SELECT COUNT(*) as count FROM actor WHERE nacionalidadActor = $idPais";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $resultActor = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el país está relacionado con algún director
    $query = "SELECT COUNT(*) as count FROM director WHERE nacionalidadDirector = $idPais";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $resultDirector = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultActor['count'] > 0 || $resultDirector['count'] > 0) {
        echo "No se puede eliminar el país porque está relacionado con uno o más actores o directores.";
    } else {
        // Eliminar el país
        $query = "DELETE FROM pais WHERE idPais = $idPais";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        echo "País eliminado correctamente.";
        
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<a href="../vistas/insertPais.php">Volver a la lista de países</a>
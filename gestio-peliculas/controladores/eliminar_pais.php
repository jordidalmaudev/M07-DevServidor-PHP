<?php
require '../functions/funcions.php';
$conn = connectBD();

$idPais = $_POST['id'];

try {
    // Verificar si el país está relacionado con algún actor
    $query = "SELECT COUNT(*) as count FROM actor WHERE nacionalidadActor = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([strip_tags($idPais)]);
    $resultActor = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultActor['count'] > 0) {
        echo "No se puede eliminar el país porque está relacionado con uno o más actores.";
    } else {
        // Eliminar el país
        $query = "DELETE FROM pais WHERE idPais = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([strip_tags($idPais)]);

        echo "País eliminado correctamente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<a href="../vistas/insertPais.php">Volver a la lista de países</a>
<?php

include '../functions/functions.php';
$conn = connectBD();



if (isset($_SESSION['user'])) {
    echo 'Bienvenido ' . $_SESSION['user'];
}


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

    echo "<p>Has acertado $correctas de $total preguntas.</p>";
}

?>
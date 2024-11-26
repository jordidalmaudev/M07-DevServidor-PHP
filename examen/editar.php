<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumne</title>
</head>
<body>
<?php

require_once './servicios/connDB.php';

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];

    $sql = "SELECT * FROM alumnes WHERE id = $id";
    $result = mysqli_query($mysqlConnection, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $Anom = $row['nom'];
        $Acognoms = $row['cognoms'];
        $Acorreu = $row['correu'];
    }
}

if (isset($_POST['confirmarEditar'])) {
    $id = $_POST['editId'];
    $nom = $_POST['nom'];
    $cognoms = $_POST['cognoms'];
    $correu = $_POST['correu'];

    $sqlUpdate = "UPDATE alumnes SET nom = '$nom', cognoms = '$cognoms', correu = '$correu' WHERE id = $id";

    if (mysqli_query($mysqlConnection, $sqlUpdate)) : ?>
        <script>
            alert('Alumne editat correctament.');
            window.location.href = './index.php';
        </script>
    <?php else : ?>
        <p>Error: <?= mysqli_error($mysqlConnection); ?></p>
    <?php endif;
    mysqli_close($mysqlConnection);
}
?>
    <form method='POST' action='editar.php'>
    <input type='hidden' name='editId' value="<?= $id ?>">
    <label for="nom">Nom:</label>
    <input type='text' name='nom' value="<?= $Anom ?>">
    <label for="cognoms">Cognoms:</label>
    <input type='text' name='cognoms' value="<?= $Acognoms ?>">
    <label for="correu">Correu:</label>
    <input type='mail' name='correu' value="<?= $Acorreu ?>">
    <button type='submit' name='confirmarEditar'>Editar</button>
    <a href="./index.php">Volver</a>
</form>

</body>
</html>
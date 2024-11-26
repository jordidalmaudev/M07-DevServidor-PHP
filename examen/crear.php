<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Alumne</title>
</head>
<body>
<?php

require_once './servicios/connDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $cognoms = $_POST['cognoms'];
    $correu = $_POST['correu'];

    $sql = "INSERT INTO alumnes (nom, cognoms, correu) VALUES ('$nom', '$cognoms', '$correu')";

    if (mysqli_query($mysqlConnection, $sql)) : ?>
        <script>
            alert('Alumne creat ala bbdd correctament.');
            window.location.href = './index.php';
        </script>
    <?php else :
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqlConnection);
    endif;
}

?>

<form method='POST' action='crear.php'>
    <label for="nom">Nom:</label>
    <input type='text' name='nom' placeholder="Nom Alumne">
    <label for="cognoms">Cognoms:</label>
    <input type='text' name='cognoms' placeholder="Cognoms Alumne">
    <label for="correu">Correu:</label>
    <input type='mail' name='correu' placeholder="Correu Alumne">
    <button type='submit'>Crear</button>
    <a href="./index.php">Volver</a>
</form>


</body>
</html>
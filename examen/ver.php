<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver todos alumnos</title>
</head>
<body>
    <?php
        require_once './servicios/connDB.php';

        $verAlumnes = "SELECT * FROM alumnes";
        $resultat = mysqli_query($mysqlConnection, $verAlumnes);

    ?>
    <table>
    <tr>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Correu</th>
            <th>Acciones</th>
        </tr>
    
    <?php
    while ($row = mysqli_fetch_array($resultat)) : ?>
        <tr>
                <td><?= htmlspecialchars($row['nom']); ?></td>
                <td><?= htmlspecialchars($row['cognoms']); ?></td>
                <td><?= htmlspecialchars($row['correu']); ?></td>
                <td>
                    <a href="./editar.php?editar=<?= htmlspecialchars($row['id']); ?>">Editar</a> -
                    <a href="./eliminar.php?eliminar=<?= htmlspecialchars($row['id']); ?>">Eliminar</a>
                </td>
            </tr>
    <?php endwhile ?>
    </table>
</body>
</html>
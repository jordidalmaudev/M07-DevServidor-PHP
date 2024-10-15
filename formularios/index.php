<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All users list</title>
</head>
<body>
    <h1>Usuarios base de datos</h1>
    
    <?php

        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $dbname = "m7daw";

    try {
        $conn = mysqli_connect($host, $user, $password, $dbname);
    } catch (Exception $e) {
        echo "An exception occurred: " . $e->getMessage();
    };

    $selectAllUsers = "SELECT * FROM users";
    $result = mysqli_query($conn, $selectAllUsers);
    ?>

    <table>
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Edad</th>
        <th>Acciones</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                <td><?php echo htmlspecialchars($row['apellidos']); ?></td>
                <td><?php echo htmlspecialchars($row['edad']); ?></td>
                <td>
                    <a href="?editar=<?php echo htmlspecialchars($row['id']); ?>">Editar</a> - 
                    <a href="?eliminar=<?php echo htmlspecialchars($row['id']); ?>">Eliminar</a>
                </td>
            </tr>
    <?php } ?>
    </table>

    <div>
    <a href="insert.html">Introducir Usuarios</a>
    </div>
    
        <?php
        $deleteId = $_GET['eliminar'];
        $deleteUser = "DELETE FROM users WHERE id = $deleteId";

        if (mysqli_query($conn, $deleteUser)) {
            echo " <h2> " . "Usuari@ eliminad@ correctamente en la base de datos" . "</h2>";
            mysqli_close($conn);
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        ?>

</body>
</html>
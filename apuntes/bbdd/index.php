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

    include 'conexion.php';

    $selectAllUsers = "SELECT * FROM users";
    $result = mysqli_query($conn, $selectAllUsers);
    ?>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                <td><?php echo htmlspecialchars($row['apellidos']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['edad']); ?></td>
                <td>
                    <a href="?editar=<?php echo htmlspecialchars($row['id']); ?>">Editar</a> -
                    <a href="eliminarData.php?eliminar=<?php echo htmlspecialchars($row['id']); ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <div>
        <a href="insert.html">Introducir Usuarios</a>
    </div>


    <?php
    // Edit user
    if (isset($_GET['editar'])) {
        $editId = $_GET['editar'];
        $selectUser = "SELECT * FROM users WHERE id = $editId";
        $query = mysqli_query($conn, $selectUser);
        $user = mysqli_fetch_array($query);
        ?>

        <!-- Edit User Form -->
        <form method="POST" action="">
            <input type="hidden" name="editId" value="<?php echo htmlspecialchars($user['id']); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo htmlspecialchars($user['apellidos']); ?>">
            <label for="edad">Edad:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
            <label for="edad">Edad:</label>
            <input type="text" name="edad" min="0" value="<?php echo htmlspecialchars($user['edad']); ?>">
            <button type="submit" name="updateUser">Actualizar</button>
        </form>

        <?php
    }

    if (isset($_POST['updateUser'])) {
        $editId = $_POST['editId'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];

        $updateUser = "UPDATE users SET nombre='$nombre', apellidos='$apellidos', edad='$edad', email='$email' WHERE id=$editId";

        if (mysqli_query($conn, $updateUser)) {
            echo "<h2>Usuario actualizado correctamente</h2>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>

</body>

</html>
<form action="insertar_actor.php" method="POST">
    <label for="nombreActor">Nombre del Actor:</label>
    <input type="text" id="nombreActor" name="nombreActor" required><br>

    <label for="nacionalidadActor">Nacionalidad del Actor:</label>
    <select id="nacionalidadActor" name="nacionalidadActor" required>
        <option value="<?= ?>"></option>
    </select><br>

    <label for="imagen">Imagen del Actor (URL):</label>
    <input type="text" id="imagen" name="imagen" required><br>

    <input type="submit" value="Insertar Actor">
</form>

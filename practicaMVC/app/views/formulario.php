<div class="col-6">
                <h2>Selecciona una película</h2>
                <form class="form-group" action="index.php" method="POST">
                    <label for="pelicula">Escoge una película</label>
                    <select name="pelicula" id="pelicula" class="form-control">
                        <?php
                        foreach ($peliculas as $pelicula) {
                            echo "<option value='" . $pelicula['idPelicula'] . "'>" . $pelicula['tituloPelicula'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Enviar" class="btn btn-primary mt-2">
                </form>
</div>
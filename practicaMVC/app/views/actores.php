<div class="col-6">
    <h2>Info Actores</h2>
    <?php
    if (isset($actores)) {
        foreach ($actores as $actor) {
            echo "<p>Actor: " . $actor['nombreActor'] . " - Personaje: " . $actor['personaje'] . "</p>";
        }
    }
    ?>
</div>
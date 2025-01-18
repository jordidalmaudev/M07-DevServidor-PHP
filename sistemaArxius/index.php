<?php

$directori = "img";

$extensions = ['jpg', 'jpeg', 'jfif', 'png'];

$fitxers = scandir($directori);

// Array per guardar les imatges vàlides
$imatges = [];


foreach ($fitxers as $fitxer) {
    // Obtenim la extensió del fitxer
    $extensio = pathinfo($fitxer, PATHINFO_EXTENSION);
    $directoriTotal = $directori . "/" . $fitxer;
    if (is_file($directoriTotal) && in_array(strtolower($extensio), $extensions)) {
        $imatges[] = $fitxer;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Galeria d'Imatges</title>
    
</head>
<body>
    <div class="galeria">
        <?php foreach ($imatges as $imatge) : ?>
            <img src="<?= htmlspecialchars($directori . '/' . $imatge) ?>" alt="Imatge de la tardor">
            <p><?= $imatge ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>

<?php

session_start();
session_destroy();

// Redirigir a index.php
header('Location: index.php');
exit;

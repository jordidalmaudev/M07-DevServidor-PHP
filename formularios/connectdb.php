<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "m7daw";

try {
    $conn = mysqli_connect($host, $user, $password, $dbname);
    echo "Connected to $dbname at $host successfully";
} catch (Exception $e) {
    echo "An exception occurred: " . $e->getMessage();
};

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
print_r($result);

// finally {
//     mysqli_close($conn);
// }

while ($row = mysqli_fetch_array($result)) {
    echo $row['id'] . " - " . $row['name'] . " - " . $row['email'] . "<br>";
};

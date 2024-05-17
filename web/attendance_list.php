<?php
$servername = "localhost";
$username = "root";
$password = "amira";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, lastname FROM liste_etudiant";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>First Name</th><th>| Last Name</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["firstname"]. "</td><td>&nbsp;" . $row["lastname"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo " <h1>empty list</h1>";
}
$conn->close();
?>

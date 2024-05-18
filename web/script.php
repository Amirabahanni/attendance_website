<?php
$servername = "localhost";
$username = "root";
$password = "insert password here";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS liste_etudiant (
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    ip_address VARCHAR(45) NOT NULL UNIQUE
)";

$client_ip = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT * FROM liste_etudiant WHERE ip_address = '$client_ip'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "This student has already submitted the form !<br>";
} else {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];

    $sql = "INSERT INTO liste_etudiant (firstname, lastname, ip_address) VALUES ('$firstname', '$lastname', '$client_ip')";

    if ($conn->query($sql) === TRUE) {
        echo "
        <style>
            * {
                font-family: 'Spartan', sans-serif;
            }
            body {
                background: radial-gradient(circle, rgb(12, 57, 239) 0%, rgb(252, 17, 181) 100%);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            form {
                color: #fffff;
                width: 355px;
                padding: 30px;
                background: white;
                border-radius: 10px;
                box-shadow: 35px 35px 100px rgba(238, 238, 228, 0.667), 35px 35px 100px rgba(23, 23, 22, 0.288);
            }
        </style>
        <form>Y o u   a r e    m a r k e d   a s    p r e s e n t  !</form>
    ";    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

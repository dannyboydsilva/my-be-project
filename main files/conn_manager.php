<?php
function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supermarketdb";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        //die("Connection failed: " . mysqli_connect_error());
        return null;
    }
    //echo "Connected successfully";
    return $conn;
}
//connect();
?>
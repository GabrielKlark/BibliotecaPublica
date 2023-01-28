<?php
    $server = "localhost";
    $user = "root";
    $password = "gislaine";
    $password = "root";
    $dbname = "dbBiblioteca";
    
    $conn = mysqli_connect($server,$user,$password,$dbname);

    // Check connection
    if ($conn->connect_error)
    {
        // Stop php execution and return error
        die("Connection failed: " . $conn->connect_error);
    }

?>
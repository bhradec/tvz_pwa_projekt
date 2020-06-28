<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $basename = "lexpress";

    $dbc = mysqli_connect($severname, $username, $password, $basename) or
        die ("Error connecting to MySQL server" . mysqli_error($dbc));
?>
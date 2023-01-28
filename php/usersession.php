<?php

    session_start();

    $logged = $_SESSION['id'];

    if($logged == '')
    {
        echo "<script>
            window.location.replace('/BibliotecaPublica/index.php')
        </script>";
    }

?>
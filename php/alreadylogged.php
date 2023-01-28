<?php
    session_start();

    if($_SESSION['id'] == '')
    {
        echo "userNOTLogged";
    }
    else
    {
        echo "userLogged";
    }
?>
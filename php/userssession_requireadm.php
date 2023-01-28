<?php

    $perfil = $_SESSION['perfil'];

    if(strtoupper($perfil) == 'ADM')
    {
        
    }
    else
    {
        echo "<script>
            window.location.replace('/BibliotecaPublica/Screens/home.php')
        </script>";
    }

?>
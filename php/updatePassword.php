<?php

    include_once "usersession.php";
    include_once "connection.php";

    $id = $_SESSION['id'];
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $novasenha = mysqli_real_escape_string($conn, $_POST['novasenha']);

    $novasenha = password_hash($novasenha, PASSWORD_DEFAULT);

    $sql = "select senhaFunc from tbFunc where idFunc = $id;";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();

        //Se a senha for igual
        if(password_verify($senha, $row['senhaFunc']))
        {
            $query = "update tbFunc
                        set senhaFunc = '$novasenha'
                        where idFunc = $id";

            $sql = mysqli_query($conn, $query);
            if($sql)
            {
                echo "SUCESS_UPDATED_PASSWORD";
            }
            else
            {
                echo "ERROR_SQL";
            }
        }
        else
        {
            echo "ERROR_MATCH_PASSWORD";
        }
    }
    else
    {
        echo "ERROR_SQL";
    }

?>
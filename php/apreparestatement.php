<?php

    include_once "usersession.php";
    include_once "connection.php";

    $id = $_SESSION['id'];
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $novasenha = mysqli_real_escape_string($conn, $_POST['novasenha']);

    $novasenha = password_hash($novasenha, PASSWORD_DEFAULT);

    //Template
    $query = "select * from tbFunc where idFunc = $id and senhaFunc = ?;";
    //Preprared Statement
    $stmt = mysqli_stmt_init($conn);

    if(mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_bind_param($stmt, "s", $senha);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0)
        {
            $query = "update tbFunc
                        set senhaFunc = $novasenha
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
        echo "ERROR_SQL_STATEMENT";
    }

?>
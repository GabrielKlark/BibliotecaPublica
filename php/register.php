<?php

    include_once "connection.php";

    //Variables
    $id = $_POST['inpId'];
    $pass = $_POST['inpSenha'];

    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "select * from tbFunc where idFunc = ?";

    //stmt = statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        if($row['senhaFunc'] == '')
        {
            $query = "update tbFunc
                        set senhaFunc = '$pass'
                        where idFunc = $id";
            $sql = $conn->query($query);

            if($sql)
            {
                //Salva dados do funcionário logado
                session_start();
                $_SESSION['id'] = $row['idFunc'];
                $_SESSION['nmFunc'] = $row['nmFunc'];
                $_SESSION['perfil'] = $row['perfilFunc'];
                echo "SUCESS_USER_CADASTRADO";
            }
            else
            {
                echo "ERROR_CADASTRAR_SENHA";
            }
        }  
        else
        {
            echo "ERROR_SENHA_CADASTRADA";
        }
    }
    else
    {
        echo "ERROR_ENCONTRAR_ID";
    }

    $conn->close();
    exit();

/*
    $sql = "select * from tbFunc where idFunc = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        if($row['senhaFunc'] == '')
        {
            $query = "update tbFunc
                        set senhaFunc = '$pass'
                        where idFunc = $id";
            $sql = $conn->query($query);

            if($sql)
            {
                //Salva dados do funcionário logado
                session_start();
                $_SESSION['id'] = $row['idFunc'];
                $_SESSION['nmFunc'] = $row['nmFunc'];
                $_SESSION['perfil'] = $row['perfilFunc'];
                echo "SUCESS_USER_CADASTRADO";
            }
            else
            {
                echo "ERROR_CADASTRAR_SENHA";
            }
        }  
        else
        {
            echo "ERROR_SENHA_CADASTRADA";
        }
    }
    else
    {
        echo "ERROR_ENCONTRAR_ID";
    }

    $conn->close();
    exit();
*/
?>
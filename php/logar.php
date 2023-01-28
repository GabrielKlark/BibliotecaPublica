<?php

    require_once "connection.php";  

    $id = $_POST['inpId'];
    $pass = $_POST['inpSenha'];

    $sql = "select * from tbFunc where idFunc = ?";

    //stmt = statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    // Se retornar algo
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();

        //Se o usuário for ativo (puder ter acesso)
        if($row['ativoFunc'] == true)
        {
            //Se a senha for igual
            if(password_verify($pass, $row['senhaFunc']))
            {
                //Salva dados do funcionário logado
                session_start();
                $_SESSION['id'] = $row['idFunc'];
                $_SESSION['nmFunc'] = $row['nmFunc'];
                $_SESSION['perfil'] = $row['perfilFunc'];
                
                echo "SUCESS_USER_LOGGED";
                exit();
            }
            //se ainda não tiver senha cadastrada
            else if($row['senhaFunc'] == '')
            {
                echo "ERROR_EMPTY_PASSWORD";
                exit();
            }
            else
            {
                echo "ERROR_WRONG_PASSWORD";
                exit();
            }
        }
        else
        {
            echo "ERROR_UNAUTHORIZED_USER";
            exit();
        }
    } 
    else 
    {
        echo "ERROR_WRONG_CREDENTIALS";
    }

    $conn->close();

/*
    $sql = "select * from tbFunc where idFunc = $id";
    $result = $conn->query($sql);

    // Se retornar algo
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) 
        {
            //Se a senha for igual
            if(password_verify($pass, $row['senhaFunc']))
            {
                //Salva dados do funcionário logado
                session_start();
                $_SESSION['id'] = $row['idFunc'];
                $_SESSION['nmFunc'] = $row['nmFunc'];
                $_SESSION['perfil'] = $row['perfilFunc'];
                
                echo "SUCESS_USER_LOGGED";
                exit();
            }
            //se ainda não tiver senha cadastrada
            else if($row['senhaFunc'] == '')
            {
                echo "ERROR_EMPTY_PASSWORD";
                exit();
            }
            else
            {
                echo "ERROR_WRONG_PASSWORD";
                exit();
            }
        }
    } 
    else 
    {
        echo "ERROR_WRONG_CREDENTIALS";
    }

    $conn->close();
    */

?>
<?php

    include_once "connection.php";
    include_once "usersession.php";

    $cpf = $_POST['inpCPF'];
    $nm = $_POST['inpNome'];
    $gen = $_POST['selectGen'];
    $email = $_POST['inpEmail'];
    $cel = $_POST['inpCel'];
    $end = $_POST['inpEnd'];

    $query = "update tbCliente set nmClie = '$nm', idGenClie = '$gen', emailClie = '$email', celClie = '$cel', endClie = '$end' where cpfClie like '$cpf';";

    $sql = mysqli_query($conn, $query);

    if($sql)
    {
        echo "Cliente $nm atualizado com sucesso!";
    }
    else
    {
        echo "Falha ao atualizar cliente!";
    }
    
?>
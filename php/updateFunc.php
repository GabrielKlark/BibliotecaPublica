<?php

    include_once "connection.php";
    include_once "usersession.php";

    $id = $_POST['inpId'];
    $cpf = $_POST['inpCPF'];
    $nm = $_POST['inpNome'];
    $gen = $_POST['selectGen'];
    $email = $_POST['inpEmail'];
    $cel = $_POST['inpCel'];
    $perfil = $_POST['inpPerfil'];
    $ativo = $_POST['inpAtivo'];
    $end = $_POST['inpEnd'];

    $query = "update tbFunc set nmFunc = '$nm', idGenFunc = '$gen', emailFunc = '$email', celFunc = '$cel', perfilFunc = '$perfil', ativoFunc = '$ativo', endFunc = '$end' where idFunc = '$id';";

    $sql = mysqli_query($conn, $query);

    if($sql)
    {
        echo "Funcionário $nm atualizado com sucesso!";
    }
    else
    {
        echo "Falha ao atualizar funcionário!";
    }
    
?>
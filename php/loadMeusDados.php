<?php

    include_once "usersession.php";
    include_once "connection.php";

    $id = $_SESSION['id'];

    $query = "select * from tbFunc where idFunc = $id";
    $sql = $conn->query($query);

    if($sql->num_rows > 0)
    {
        $row = $sql->fetch_assoc();
        $dados = array(
            "id" => $id,
            "nm" => $row['nmFunc'],
            "gen" => $row['idGenFunc'],
            "cpf" => $row['cpfFunc'],
            "email" => $row['emailFunc'],
            "cel" => $row['celFunc'],
            "nasc" => $row['dtNascFunc'],
            "perfil" => $row['perfilFunc'],
            "end" => $row['endFunc']
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();
?>
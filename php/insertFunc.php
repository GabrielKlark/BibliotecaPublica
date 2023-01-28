<?php

    include_once "connection.php";
    include_once "usersession.php";

    $nm = $_POST['inpNome'];
    $gen = $_POST['selectGen'];
    $cpf = $_POST['inpCPF'];
    $email = $_POST['inpEmail'];
    $cel = $_POST['inpCel'];
    $nasc = $_POST['inpNasc'];
    $perfil = $_POST['inpPerfil'];
    $end = $_POST['inpEnd'];

    $query_insert = "insert into tbFunc(cpfFunc, nmFunc, dtNascFunc, idGenFunc, emailFunc, celFunc, endFunc, perfilFunc, ativoFunc) values ('$cpf', '$nm', '$nasc', '$gen', '$email', '$cel', '$end', '$perfil', 1)";

    $dados = array();

    /// Execute $query_insert and return the id of the inserted row
    $sql_insert = $conn->query($query_insert);

    if ($sql_insert)
    {
        $query_id = 'select * from tbFunc where cpfFunc like "%' . $cpf . '%" limit 1';

        $result = $conn->query($query_id);

        $linha = $result->fetch_assoc();

        $dados = array(
            "id" => $linha["idFunc"],
            "nm" => $linha["nmFunc"]
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();

?>
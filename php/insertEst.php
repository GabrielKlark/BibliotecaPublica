<?php

    include_once "connection.php";
    include_once "usersession.php";

    $isbn = $_POST['inpISBN'];
    $est = $_POST['inpEst'];
    $disp = $_POST['inpDisp'];

    $query = "call SP_InsertForEstoque('$isbn', $est, $disp);";

    $dados = array();

    $sql = mysqli_query($conn, $query);

    while($linha = mysqli_fetch_array($sql))
    {
        array_push(
            $dados,
            array(
                "cod" => $linha["codEst"]
            )
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();

?>
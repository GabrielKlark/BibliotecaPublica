<?php

    include_once "connection.php";
    include_once "usersession.php";

    $isbn = $_POST['inpISBN'];

    $query = "call SP_SelectForEstoqueInsert('$isbn');";

    $dados = array();

    $sql = mysqli_query($conn, $query);

    while($linha = mysqli_fetch_array($sql))
    {
        array_push(
            $dados,
            array(
                "cod" => $linha["codLiv"],
                "tit" => $linha["titLiv"]
            )
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();

?>
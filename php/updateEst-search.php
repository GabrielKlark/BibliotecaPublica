<?php

    include_once "connection.php";
    include_once "usersession.php";

    $isbn = $_POST['inpISBN'];

    $query = "call SP_SelectForEstoqueUpdate('$isbn');";

    $dados = array();

    $sql = mysqli_query($conn, $query);

    while($linha = mysqli_fetch_array($sql))
    {
        array_push(
            $dados,
            array(
                "cod" => $linha["codEst"],
                "tit" => $linha["titLiv"],
                "est" => $linha["qntdEst"],
                "disp" => $linha["dispEst"]
            )
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();

?>
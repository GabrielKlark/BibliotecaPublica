<?php

    include_once "usersession.php";
    include_once "connection.php";

    $where = $_POST['where'];

    $query = "select * from tbCliente $where limit 1";

    $sql = mysqli_query($conn, $query);

    $dados = array();

    while($linha = mysqli_fetch_array($sql))
    {
        array_push(
            $dados,
            array(
                "cpf" => $linha["cpfClie"],
                "nm" => $linha["nmClie"],
                "cel" => $linha["celClie"],
                "email" => $linha["emailClie"],
                "gen" => $linha["idGenClie"],
                "nasc" => $linha["dtNascClie"],
                "end" => $linha["endClie"]
            )
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();
  
?>
<?php

    include_once "connection.php";
    include_once "usersession.php";

    $where = $_POST['where'];

    $query = "select * from tbFunc $where";

    $sql = mysqli_query($conn, $query);

    $dados = array();

    while($linha = mysqli_fetch_array($sql))
    {
        array_push(
            $dados,
            array(
                "id" => $linha["idFunc"],
                "nm" => $linha["nmFunc"],
                "cpf" => $linha["cpfFunc"],
                "cel" => $linha["celFunc"],
                "email" => $linha["emailFunc"],
                "gen" => $linha["idGenFunc"],
                "nasc" => $linha["dtNascFunc"],
                "perfil" => $linha["perfilFunc"],
                "end" => $linha["endFunc"],
                "ativo" => $linha["ativoFunc"]
            )
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();
  
?>
<?php

    include_once "connection.php";
    include_once "usersession.php";

    $where = $_POST['where'];

    $query = "select * from tbLivro $where";

    $sql = mysqli_query($conn, $query);

    $dados = array();

    while($linha = mysqli_fetch_array($sql))
    {
        array_push(
            $dados,
            array(
                "cod" => $linha["codLiv"],
                "isbn" => $linha["isbnLiv"],
                "autor" => $linha["autorLiv"],
                "preco" => $linha["custoLiv"],
                "tit" => $linha["titLiv"],
                "editora" => $linha["editoraLiv"],
                "ano" => $linha["anoLiv"],
                "idioma" => $linha["idiomaLiv"]
            )
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();
  
?>
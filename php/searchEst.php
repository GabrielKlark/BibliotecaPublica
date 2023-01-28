<?php

    include_once "connection.php";
    include_once "usersession.php";

    $where = $_POST['where'];

    $query = "select tbEstoque.codEst, tbLivro.isbnLiv, tbLivro.titLiv, tbEstoque.qntdEst, tbEstoque.dispEst from tbEstoque INNER JOIN tbLivro on tbEstoque.fk_codLiv = tbLivro.codLiv $where;";

    $sql = mysqli_query($conn, $query);

    $dados = array();

    while($linha = mysqli_fetch_array($sql))
    {
        array_push(
            $dados,
            array(
                "cod" => $linha["codEst"],
                "isbn" => $linha["isbnLiv"],
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
<?php

    include_once "connection.php";
    include_once "usersession.php";

    $isbn = $_POST['inpISBN'];
    $tit = $_POST['inpTit'];
    $est = $_POST['inpEst'];
    $disp = $_POST['inpDisp'];

    $query = "call SP_UpdateForEstoque('$isbn', $est, $disp);";

    $sql = mysqli_query($conn, $query);

    if($sql)
    {
        echo "Livro $tit atualizado com sucesso!";
    }
    else
    {
        echo "Falha ao atualizar livro!";
    }

?>
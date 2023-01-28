<?php

    include_once "usersession.php";

    $cod = $_SESSION['codCom'];
    $dt = $_SESSION['dtCom'];
    $dev = $_SESSION['dtDev'];
    $books = $_SESSION['titLiv'];

    $dados = array(
        "cod" => $cod,
        "dt" => $dt,
        "dev" => $dev,
        "books" => $books
    );

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();

?>
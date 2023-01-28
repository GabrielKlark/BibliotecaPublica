<?php

    include_once "../php/usersession.php";

    $nmFunc = $_SESSION['nmFunc'];
    $perfil = $_SESSION['perfil'];

    $dados = array(
        "nmFunc" => $nmFunc,
        "perfil" => $perfil
    );

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();
?>
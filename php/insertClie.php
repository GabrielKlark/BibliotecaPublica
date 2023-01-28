<?php

    include_once "usersession.php";
    include_once "connection.php";

    $nm = $_POST['inpNome'];
    $gen = $_POST['selectGen'];
    $cpf = $_POST['inpCPF'];
    $email = $_POST['inpEmail'];
    $cel = $_POST['inpCel'];
    $nasc = $_POST['inpNasc'];
    $end = $_POST['inpEnd'];
    $idFunc = $_SESSION['id'];

    $query = "call SP_InsertCliente('$cpf', '$nm', '$nasc', '$gen', '$email', '$cel', '$end', $idFunc);";

    $sql = mysqli_query($conn, $query);

    $dados = array();

    while($linha = mysqli_fetch_array($sql))
    {
        $dados = array
	    (
            "status" => $linha["queryStatus"]
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();

?>
<?php

    include_once "usersession.php";
    include_once "connection.php";

    $cpf = $_POST['inpCPF'];

    $dados = array();

    $query = "select *
                from tbComanda 
                INNER JOIN tbLivro
                ON tbComanda.fk_codLiv = tbLivro.codLiv
                where fk_cpfClie like '$cpf' and devolvido = false order by dtCom limit 1;";

    $sql = $conn->query($query);

    if($sql->num_rows > 0)
    {
        $linha = $sql->fetch_assoc();

        $dados = array(
            "codCom" => $linha["codCom"],
            "dtCom" => $linha["dtCom"],
            "dtDev" => $linha["dtDev"],
            "isbnLiv" => $linha["isbnLiv"],
            "titLiv" => $linha["titLiv"],
            "precoLiv" => $linha["custoLiv"]
        );
    }
    else
    {
        $dados = array(
            "codCom" => '',
            "dtCom" => '',
            "dtDev" => '',
            "isbnLiv" => '',
            "titLiv" => '',
            "precoLiv" => ''
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();
  
?>
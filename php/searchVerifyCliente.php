<?php

    include_once "usersession.php";
    include_once "connection.php";

    $cpf = $_POST['cpf'];

    $dados = array();

    $query = "select * from tbCliente where cpfClie like '$cpf';;";
    $sql = mysqli_query($conn, $query);

    if($sql)
    {
        if($sql->num_rows > 0)
        {
            $linha = mysqli_fetch_array($sql);
            array_push(
                $dados,
                array(
                    "cpf" => $linha["cpfClie"],
                    "nm" => $linha["nmClie"],
                    "nasc" => $linha["dtNascClie"],
                    "gen" => $linha["idGenClie"],
                    "email" => $linha["emailClie"],
                    "cel" => $linha["celClie"],
                    "end" => $linha["endClie"]
                )
            );

            $query = "select * from tbComanda
                    join tbLivro
                    on tbComanda.fk_codLiv = tbLivro.codLiv
                    where devolvido = false and fk_cpfClie like '$cpf' limit 1";
            $sql = mysqli_query($conn, $query);

            if($sql->num_rows > 0)
            {
                $linha = mysqli_fetch_array($sql);
                array_push(
                    $dados,
                    array(
                        "cod" => $linha["codCom"],
                        "dt" => $linha["dtCom"],
                        "dev" => $linha["dtDev"],
                        "devolvido" => $linha["devolvido"],
                        "emAtraso" => $linha["emAtraso"],
                        "tit" => $linha["titLiv"]
                    )
                );
            }
        }
    }


    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();
  
?>
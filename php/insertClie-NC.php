<?php

    include_once "usersession.php";
    include_once "connection.php";

    $funcId = 1;
    $cpf = $_POST['inpCPF'];
    $realizado = $_POST['inpDtAtual'];
    $dev = $_POST['inpDev'];
    $isbn = $_POST['inpISBN'];

    //$query = "call SP_InsertRealizarComanda('$cpf', '$realizado', '$dev', '$isbn', '$isbn2', '$isbn3', $funcId);";

    //Verifica se cliente já não possui comanda ativa
    $query = "select * from tbComanda where fk_cpfClie like '$cpf' and devolvido = false";
    $sql = $conn->query($query);

    if($sql->num_rows == 0)
    {
        //Verifica se o isbn existe
        $query = "select codLiv from tbLivro where isbnLiv like '$isbn'";
        $sql = $conn->query($query);

        if($sql->num_rows > 0)
        {
            $linha = mysqli_fetch_array($sql);
            $codLiv = $linha['codLiv'];

            //Verifica se o livro está em estoque
            $query = "select codEst from tbEstoque where fk_codLiv = $codLiv";
            $sql = $conn->query($query);

            if($sql->num_rows > 0)
            {
                $linha = mysqli_fetch_array($sql);
                $codEst = $linha['codEst'];

                //Verifica se o livro está disponível em estoque
                $query = "select dispEst from tbEstoque where codEst = $codEst";
                $sql = $conn->query($query);

                $linha = mysqli_fetch_array($sql);
                $dispEst = $linha['dispEst'];

                if($dispEst > 0)
                {
                    //Cadastra comanda
                    $query = "insert into tbComanda(dtCom, dtDev, devolvido , emAtraso, fk_codLiv, fk_cpfClie, fk_idFunc)
                                values ('$realizado', '$dev', false, false, $codLiv, '$cpf', $funcId);";
                    
                    if($sql = $conn->query($query))
                    {
                        //Atualiza quantidade disponivel do livro em estoque
                        $query = "update tbEstoque set dispEst = (dispEst - 1) where codEst = $codEst;";
                        
                        if($sql = $conn->query($query))
                        {
                            //Seleciona
                            $query = "select *
                                        from tbComanda 
                                        INNER JOIN tbLivro
                                        ON tbComanda.fk_codLiv = tbLivro.codLiv
                                        where fk_cpfClie like '$cpf' and devolvido = false order by dtCom limit 1;";
                            $sql = $conn->query($query);

                            $linha = mysqli_fetch_array($sql);
                            $codCom = $linha['codCom'];
                            $dtCom = $linha['dtCom'];
                            $dtDev = $linha['dtDev'];
                            $titLiv = $linha['titLiv'];

                            $_SESSION['codCom'] = $codCom;
                            $_SESSION['dtCom'] = $dtCom;
                            $_SESSION['dtDev'] = $dtDev;
                            $_SESSION['titLiv'] = $titLiv;

                            echo "SUCESSO";
                        }
                        else
                        {
                            echo "ERRO_UPDATE_ESTOQUE";
                        }
                    }
                    else
                    {
                        echo "ERRO_INSERT_COMANDA";
                    }

                }
                else
                {
                    echo "ERRO_ESTOQUE_INDISPONIVEL";
                }
            }
            else
            {
                echo "ERRO_ESTOQUE_NAO_CADASTRADO";
            }
        }
        else
        {
            echo "ERRO_ISBN_INVALIDO";
        }
    }
    else
    {
        echo "ERRO_COMANDA_ATIVA";
    }

    /*
    $linha = mysqli_fetch_array($sql);
    $codCom = $linha["codCom"];

    echo $codCom;
    */

?>
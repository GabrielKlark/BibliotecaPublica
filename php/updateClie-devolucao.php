<?php

    include_once "usersession.php";
    include_once "connection.php";

    $codCom = $_POST['codCom'];
    $dtCom = $_POST['dtCom'];
    $dtDev = $_POST['dtDev'];
    $titLiv = $_POST['titLiv'];
    $isbn = $_POST['isbn'];

    $query = "select codLiv from tbLivro where isbnLiv like '$isbn'";
    $sql = mysqli_query($conn, $query);

    if($sql)
    {
        $linha = $sql->fetch_assoc();
        $codLiv = $linha['codLiv'];

        $query = "update tbComanda 
                    set devolvido = true, emAtraso = false 
                    where codCom like '$codCom';";

        $sql = mysqli_query($conn, $query);

        if($sql)
        {
            $query = "update tbEstoque
                        set dispEst = (dispEst + 1) where fk_codLiv = $codLiv";

            if($sql = mysqli_query($conn, $query))
            {
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
            echo "ERRO_UPDATE_COMANDA";
        }
    }
    else
    {
        echo "ERRO_ENCONTRAR_ISBN";
    }
    
?>
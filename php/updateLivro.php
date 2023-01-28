<?php

    include_once "connection.php";
    include_once "usersession.php";

    $isbn = $_POST['inpISBN'];
    $autor = $_POST['inpAutor'];
    $custo = $_POST['inpPreco'];
    $tit = $_POST['inpTit'];
    $editora = $_POST['inpEdit'];
    $ano = $_POST['inpAno'];
    $idioma = $_POST['selectIdioma'];

    $query = "update tbLivro set titLiv = '$tit', autorLiv = '$autor', editoraLiv = '$editora', anoLiv = '$ano', idiomaLiv = '$idioma', custoLiv = '$custo' where isbnLiv like '%$isbn%';";

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
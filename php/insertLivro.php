<?php

    include_once "connection.php";
    include_once "usersession.php";

    $titulo = $_POST['inpTit'];
    $preco = $_POST['inpPreco'];
    $isbn = $_POST['inpISBN'];
    $autor = $_POST['inpAutor'];
    $editora = $_POST['inpEdit'];
    $ano = $_POST['inpAno'];
    $idioma = $_POST['selectIdioma'];

    $query_insert = "insert into tbLivro(isbnLiv, titLiv, autorLiv, editoraLiv, anoLiv, idiomaLiv, custoLiv) values ('$isbn', '$titulo', '$autor', '$editora', '$ano', '$idioma', $preco)";

    $dados = array();

    /// Execute $query_insert and return the id of the inserted row
    $sql_insert = $conn->query($query_insert);

    if ($sql_insert)
    {
        $query_cod = 'select * from tbLivro where isbnLiv like "%' . $isbn . '%" limit 1';

        $result = $conn->query($query_cod);

        $linha = $result->fetch_assoc();

        $dados = array
	    (
            "cod" => $linha["codLiv"],
            "title" => $linha["titLiv"]
        );
    }

    header('Content-Type: application/json');
        echo json_encode($dados);
    exit();

?>
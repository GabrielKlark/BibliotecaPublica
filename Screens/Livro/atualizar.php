<?php
    include_once "../../php/usersession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros - Atualizar</title>

    <link rel="stylesheet" href="../../css/Screens/reset.css">
    <link rel="stylesheet" href="../../css/Screens/globalScreensStyle.css">

    <!--Awesomefont Icons-->
    <link rel="stylesheet" href="../../css/fontawesome/all.min.css">

</head>
<body>
    <nav>
        <div class="navHeader">
            <h4>Opções</h4>

            <ul>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li class="activePage"><a href="#">Atualizar</a></li>
                <li><a href="listar.php">Consultar</a></li>
            </ul>
        </div>

        <div class="navFooter">

            <a id="logoutButton">
                <i class="fa-solid fa-power-off"></i>
            </a>
            <a id="homeButton">
                <i class="fa-solid fa-home"></i>
            </a>

        </div>
    </nav>
    <main>
        <h1>Livros</h1>

        <form id="formAtt" method="post">
            <div class="camposForm">
                <label for="inpISBN">ISBN:</label>
                <div class="insideSearch">
                    <input type="text" name="inpISBN" id="inpISBN">
                    <button id="search" type="submit">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>

                <label for="inpAutor">Autor:</label>
                <input type="text" name="inpAutor" id="inpAutor">

                <label for="inpPreco">Preço:</label>
                <input type="text" name="inpPreco" id="inpPreco">

                <label for="inpTit">Título:</label>
                <input type="text" name="inpTit" id="inpTit">

                <label for="inpEdit">Editora:</label>
                <input type="text" name="inpEdit" id="inpEdit">

                <label for="inpAno">Ano:</label>
                <input type="number" name="inpAno" id="inpAno">

                <label for="selectIdioma">Idioma:</label>
                <select name="selectIdioma" id="selectIdioma">
                    <option value="">Selecione...</option>
                    <option value="Português">Português</option>
                    <option value="Inglês">Inglês</option>
                    <option value="Espanhol">Espanhol</option>
                    <option value="Frânces">Frânces</option>
                    <option value="Alemão">Alemão</option>
                    <option value="Árabe">Árabe</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Swahili">Swahili</option>
                    <option value="Japonês">Japonês</option>
                    <option value="Chinês">Chinês</option>
                    <option value="Coreano">Coreano</option>
                    <option value="Outro">Outro</option>
                </select>

                <span id="status" class="status"></span>

                <button id="btnAtt" type="submit">Atualizar</button>
            </div>
        </form>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/livro-atualizar.js"></script>
</body>
</html>
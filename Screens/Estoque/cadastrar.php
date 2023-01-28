<?php
    include_once "../../php/usersession.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Cadastrar</title>

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
                <li class="activePage"><a href="#">Cadastrar</a></li>
                <li><a href="atualizar.php">Atualizar</a></li>
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
        <h1>Estoque</h1>

        <form id="formCad" method="post">
            <div class="camposForm">
                <label for="inpISBN">ISBN:</label>
                <div class="insideSearch">
                    <input type="text" name="inpISBN" id="inpISBN">
                    <button id="search" type="submit">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>

                <label for="inpTit">Título:</label>
                <input type="text" name="inpTit" id="inpTit">

                <label for="inpEst">Estoque:</label>
                <input type="number" name="inpEst" id="inpEst">

                <label for="inpDisp">Disponível:</label>
                <input type="number" name="inpDisp" id="inpDisp">

                <span id="status" class="status"></span>
                
                <button id="btnCad" type="submit">Cadastrar no Estoque</button>

            </div>
        </form>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/est-cadastro.js"></script>
</body>
</html>
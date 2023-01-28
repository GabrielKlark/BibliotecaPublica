<?php
    include_once "../../php/usersession.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Comanda</title>

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
                <li><a href="verificar.php">Verificar</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="atualizar.php">Atualizar</a></li>
                <li class="activePage"><a href="#">Nova Comanda</a></li>
                <li><a href="devolucao.php">Devolução</a></li>
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
        <h1>Clientes</h1>

        <form id="formNC" method="post">
            <div class="camposForm">
                <label for="inpCPF">CPF:</label>
                <div class="insideSearch">
                    <input type="text" name="inpCPF" id="inpCPF">
                    <button id="search">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>

                <label for="inpDtAtual">Data Atual:</label>
                <input type="date" name="inpDtAtual" id="inpDtAtual" disabled>

                <label for="selectPrazo">Prazo:</label>
                <select name="selectPrazo" id="selectPrazo">
                    <option value="10">10 Dias</option>
                    <option value="20">20 Dias</option>
                    <option value="30">30 Dias</option>
                </select>

                <label for="inpDev">Devolver Até:</label>
                <input type="date" name="inpDev" id="inpDev" disabled>

                <label for="inpISBN">ISBN do Livro:</label>
                <input type="text" name="inpISBN" id="inpISBN">

                <span id="status" class="status"></span>

                <button id="btnCad" type="submit">Cadastrar Comanda</button>

            </div>
        </form>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/clie-novacomanda.js"></script>
</body>
</html>
<?php
    include_once "../../php/usersession.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Atualizar</title>

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
                <li class="activePage"><a href="#">Atualizar</a></li>
                <li><a href="novacomanda.php">Nova Comanda</a></li>
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

        <form id="formAtt" method="post">
            <div class="camposForm">
                <label for="inpCPF">CPF:</label>
                <div class="insideSearch">
                    <input type="text" name="inpCPF" id="inpCPF">
                    <button id="search">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>

                <label for="inpNome">Nome:</label>
                <input type="text" name="inpNome" id="inpNome">

                <label for="selectGen">Gênero:</label>
                <select name="selectGen" id="selectGen">
                    <option value="">Selecione...</option>
                    <option value="Mulher Cis">Mulher Cis</option>
                    <option value="Mulher Trans">Mulher Trans</option>
                    <option value="Homem Cis">Homem Cis</option>
                    <option value="Homem Trans">Homem Trans</option>
                    <option value="Não-Binário">Não-Binário</option>
                    <option value="Outro">Outro</option>
                </select>

                <label for="inpEmail">E-mail::</label>
                <input type="email" name="inpEmail" id="inpEmail">

                <label for="inpCel">Celular:</label>
                <input type="text" name="inpCel" id="inpCel">

                <label for="inpNasc">Nascimento:</label>
                <input type="date" name="inpNasc" id="inpNasc">

                <label for="inpEnd">Endereço:</label>
                <input type="text" name="inpEnd" id="inpEnd">

                <span id="status" class="status"></span>

                <button id="btnAtt" type="submit">Atualizar</button>
            </div>
        </form>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/clie-atualizar.js"></script>
</body>
</html>
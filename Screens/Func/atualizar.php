<?php
    include_once "../../php/usersession.php";
    include_once "../../php/userssession_requireadm.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários - Atualizar</title>

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
        <h1>Funcionários</h1>

        <form id="formAtt" method="post">
            <div class="camposForm">
                <label for="inpId">ID:</label>
                <div class="insideSearch">
                    <input type="number" name="inpId" id="inpId">
                    <button id="search">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>

                <label for="inpNome">Nome:</label>
                <input type="text" name="inpNome" id="inpNome">

                <label for="inpCPF">CPF:</label>
                <input type="text" name="inpCPF" id="inpCPF">

                <label for="inpEmail">E-mail::</label>
                <input type="email" name="inpEmail" id="inpEmail">

                <label for="inpCel">Celular:</label>
                <input type="text" name="inpCel" id="inpCel">

                <label for="inpNasc">Nascimento:</label>
                <input type="date" name="inpNasc" id="inpNasc">

                <label for="inpPerfil">Perfil:</label>
                <div>
                    <input type="checkbox" name="inpPerfil" id="inpPerfil">
                    <label for="inpPerfil">Adm?</label>
                </div>

                <label for="inpAtivo">Status:</label>
                <div>
                    <input type="checkbox" name="inpAtivo" id="inpAtivo">
                    <label for="inpAtivo">Ativo?</label>
                </div>

                <label for="inpEnd">Endereço:</label>
                <input type="text" name="inpEnd" id="inpEnd">

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

                <span id="status" class="status"></span>

                <button id="btnAtt" type="submit">Atualizar</button>
            
            </div>
        </form>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/func-atualizar.js"></script>
</body>
</html>
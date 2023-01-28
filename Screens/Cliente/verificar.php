<?php
    include_once "../../php/usersession.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Verificar</title>

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
                <li class="activePage"><a href="#">Verificar</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="atualizar.php">Atualizar</a></li>
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

        <div class="searchDiv">
            <form action="" method="post">
                <div class="formHeader">
                    <label for="inpSearch">CPF:</label>
                    
                    <div>
                        <input type="text" name="inpSearch" id="inpSearch">

                        <button id="search" type="submit">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="main-container">
            <div id="containerDados" class="main-container-content">
                <h3>Dados</h3>
                <div id="nome">Nome: </div>
                <div id="email">E-mail: </div>
                <div id="gen">Gênero: </div>
                <div id="dtNasc">Nascimento: </div>
                <div id="cel">Celular: </div>
                <div id="end">Endereço: </div>
            </div>
        </div>

        <div class="info-containers">
            <div class="info-container">
                <div id="containerCA" class="info-container-content">
                    <h3>Comandas Atuais</h3>
                    <div id="codCom">Cod: </div>
                    <div id="dtCom">Realizada em: </div>
                    <div id="devCom">Devolução Prevista: </div>
                    <div id="statusCom">Status: </div>
                    <div id="booksCom">Livros: </div>
                </div>
            </div>

            <div class="info-container">
                <div id="containerAA" class="info-container-content">
                    <h3>Atrasos Atuais</h3>
                    <div id="codAtr">Cod: </div>
                    <div id="comAtr">Comanda: </div>
                    <div id="devAtr">Devolução Prevista: </div>
                    <div id="atrasoAtr">Dias em Atraso: </div>
                    <div id="statusAtr">Status: </div>
                </div>
            </div>
        </div>

        <div class="info-containers" style="display: none;">
            <div class="info-container">
                <div id="containerHC" class="info-container-content">
                    <h3>Histórico de Comandas</h3>
                    <button id="showHC">Mostrar</button>

                    <div class="info-contentShown">
                        
                    </div>
                </div>
            </div>

            <div class="info-container" style="display: none;">
                <div id="containerHM" class="info-container-content">
                    <h3>Histórico de Multas</h3>
                    <button id="showHM">Mostrar</button>

                    <div class="info-contentShown">
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/clie-verificar.js"></script>
</body>
</html>
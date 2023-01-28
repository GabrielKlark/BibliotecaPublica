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
    <title>Funcionários - Consultar</title>

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
                <li><a href="atualizar.php">Atualizar</a></li>
                <li class="activePage"><a href="#">Consultar</a></li>
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

        <div class="searchDiv">
            <form id="formAll" method="post">
                <div class="formHeader">
                    <label for="selectSearch">Pesquisar por:</label>
                    
                    <div>
                        <select name="selectSearch" id="selectSearch">
                            <option value="">Selecione...</option>
                            <option value="idFunc">ID</option>
                            <option value="nmFunc">Nome</option>
                            <option value="cpfFunc">CPF</option>
                            <option value="dtNascFunc">Nascimento</option>
                            <option value="perfilFunc">Perfil</option>
                        </select>

                        <input type="text" name="inpSearch" id="inpSearch" disabled>

                        <button id="search" disabled>
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </div>
                </div>
                <button id="searchAll">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                        <div>Listar Todos Os Funcionários</div>
                    <i class="fa-solid fa-triangle-exclamation"></i>         
                </button>
            </form>
        </div>

        <div class="listTable">
            <table>
                    <thead>
                        <tr>
                            <th class="thID">ID</th>
                            <th class="thNm">Nome</th>
                            <th class="thCPF">CPF</th>
                            <th class="thCel">Celular</th>
                            <th class="thEmail">E-mail</th>
                            <th class="thGen">Gênero</th>
                            <th class="thNasc">Nascimento</th>
                            <th class="thPerf">Perfil</th>
                            <th class="thID">Status</th>
                            <th class="thEnd">Endereço</th>
                        </tr>
                    </thead>
                    <tbody id="listTable">
                        
                    </tbody>
            </table>
        </div>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/func-listar.js"></script>
</body>
</html>
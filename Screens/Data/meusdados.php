<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados</title>

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
                <li class="activePage"><a href="#">Dados</a></li>
                <li><a href="minhasenha.php">Nova Senha</a></li>
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
        <h1>Meus Dados</h1>

        <form id="formDados" method="post">
            <div class="camposForm">
                <label for="inpID">ID:</label>
                <input type="text" name="inpID" id="inpID" disabled>

                <label for="inpNome">Nome:</label>
                <input type="text" name="inpNome" id="inpNome" disabled>

                <label for="selectGen">Gênero:</label>
                <select name="selectGen" id="selectGen" disabled>
                    <option value="">Selecione...</option>
                    <option value="Mulher Cis">Mulher Cis</option>
                    <option value="Mulher Trans">Mulher Trans</option>
                    <option value="Homem Cis">Homem Cis</option>
                    <option value="Homem Trans">Homem Trans</option>
                    <option value="Não-Binário">Não-Binário</option>
                    <option value="Outro">Outro</option>
                </select>

                <label for="inpCPF">CPF:</label>
                <input type="text" name="inpCPF" id="inpCPF" disabled>

                <label for="inpEmail">E-mail::</label>
                <input type="email" name="inpEmail" id="inpEmail" disabled>

                <label for="inpCel">Celular:</label>
                <input type="text" name="inpCel" id="inpCel" disabled>

                <label for="inpNasc">Nascimento:</label>
                <input type="date" name="inpNasc" id="inpNasc" disabled>

                <label for="inpPerfil">Perfil:</label>
                <div class="checkbox">
                    <input type="checkbox" name="inpPerfil" id="inpPerfil" disabled>
                    <label for="inpPerfil">Adm?</label>
                </div>

                <label for="inpEnd">Endereço:</label>
                <input type="text" name="inpEnd" id="inpEnd" disabled>
            </div>
        </form>
    </main>

    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/meusdados.js"></script>
</body>
</html>
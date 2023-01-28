<?php
    include_once "../../php/usersession.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados - Nova Senha?</title>

    <link rel="stylesheet" href="../../css/Screens/reset.css">
    <link rel="stylesheet" href="../../css/Screens/globalScreensStyle.css">
    <link rel="stylesheet" href="../../css/style.css">

    <!--Awesomefont Icons-->
    <link rel="stylesheet" href="../../css/fontawesome/all.min.css">
</head>
<body>
    <nav>
        <div class="navHeader">
            <h4>Opções</h4>

            <ul>
                <li><a href="meusdados.php">Dados</a></li>
                <li class="activePage"><a href="#">Nova Senha</a></li>
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

        <section>
            <div>
                <form id="formPass" method="post">
                    <label for="inpSenha">Senha Atual:</label>
                        <input type="password" name="inpSenha" id="inpSenha">

                    <label for="inpNewSenha">Nova Senha:</label>
                        <input type="password" name="inpNewSenha" id="inpNewSenha">

                    <label for="inpConfirmNewSenha">Confirme Nova Senha:</label>
                        <input type="password" name="inpConfirmNewSenha" id="inpConfirmNewSenha">

                    <button id="buttonSetPass" type="submit" disabled>Definir Senha</button>
            </form>
            </div>
        </section>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/minhasenha.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Devolução Realizada!</title>

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

        <div class="main-container">
            <div class="main-container-content">
                <h3>Devolução Realizada Com Sucesso!</h3>
                
                <div id="cod">Cod: </div>
                <div id="dt">Realizada em: </div>
                <div id="dev">Devolução Prevista: </div>
                <div id="status">Status: Devolvido e multa paga!</div>
                <div id="books">Livros: </div>

                <button id="btnNC">Nova Comanda</button>
            </div>
        </div>
    </main>

    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/clie-devolucaorealizada.js"></script>
</body>
</html>
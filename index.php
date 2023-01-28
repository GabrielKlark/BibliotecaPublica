<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Login</title>

    <link rel="stylesheet" href="css/Screens/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="./assets/img/logo.png" alt="Logo Livraria do Klark">
    </header>

    <main>
        <div>
            <!--Action Provisória Só para acessar outras telas-->
            <form id="formLogar" method="post">

                <label for="inpId">Id</label>
                    <input type="number" name="inpId" id="inpId" required>

                <label for="inpSenha">Senha</label>
                    <input type="password" name="inpSenha" id="inpSenha" required>
                
                <button type="submit">Login</button>

                <a href="firstAcess.php">Primeiro Acesso?</a>
            </form>
        </div>
    </main>

    <footer>
        <p>@gabrielzklark</p>
    </footer>

    <script src="scripts/toast/dist/tata.js"></script>
    <script src="scripts/loginScript.js"></script>
    
</body>
</html>
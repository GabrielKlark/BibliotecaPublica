<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi</title>

    <link rel="stylesheet" href="css/Screens/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Primeiro Acesso</h1>
    </header>

    <section>
        <div>
            <form id="formRegister" method="post">

                <label for="inpId">Id</label>
                    <input type="text" name="inpId" id="inpId">

                <label for="inpSenha">Nova Senha</label>
                    <input type="password" name="inpSenha" id="inpSenha">
                
                <button type="submit">Definir Senha</button>

                <a href="index.php">Login</a>
            </form>
        </div>
    </section>

    <footer>
        <p>@gabrielzklark</p>
    </footer>

    <script src="scripts/toast/dist/tata.js"></script>
    <script src="./scripts/loginScript-register.js"></script>

</body>
</html>
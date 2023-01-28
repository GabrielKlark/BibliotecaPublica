<?php
    include_once "../../php/usersession.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Devolução</title>

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
                <li class="activePage"><a href="#">Devolução</a></li>
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

        <form id="formDev" method="post">
            <div class="camposForm">
                <label for="inpCPF">CPF:</label>
                <div class="insideSearch">
                    <input type="text" name="inpCPF" id="inpCPF">
                    <button id="search" type="submit">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>

                <label for="inpDtAtual">Data Atual:</label>
                <input type="date" name="inpDtAtual" id="inpDtAtual" disabled>

                <label for="inpDt">Realizada em:</label>
                <input type="date" name="inpDt" id="inpDt" disabled>

                <label for="inpDev">Prazo:</label>
                <input type="date" name="inpDev" id="inpDev" disabled>

                <label for="inpAtraso">Dias em Atraso:</label>
                <input type="number" name="inpAtraso" id="inpAtraso" disabled>

                <label for="inpISBN">ISBN do Livro:</label>
                <input type="text" name="inpISBN" id="inpISBN" disabled>

                <label for="inpTit">Título:</label>
                <input type="text" name="inpTit" id="inpTit" disabled>

                <label for="selectEstado">Estado:</label>
                <select name="selectEstado" id="selectEstado">
                    <option value="3">Perfeito</option>
                    <option value="2">Ruim</option>
                    <option value="1">Péssimo</option>
                    <option value="0">Perdido</option>
                </select>

                <!--
                
                <label for="inpISBN3">ISBN 2° Livro:</label>
                <input type="text" name="inpISBN2" id="inpISBN2" disabled>
                
                <label for="selectEstado2">Estado:</label>
                <select name="selectEstado2" id="selectEstado2">
                    <option value="1">Perfeito</option>
                    <option value="2">Ruim</option>
                    <option value="3">Péssimo</option>
                    <option value="0">Perdido</option>
                </select>

                <label for="inpISBN3">ISBN 3° Livro:</label>
                <input type="text" name="inpISBN3" id="inpISBN3" disabled>
            
                <label for="selectEstado3">Estado:</label>
                <select name="selectEstado3" id="selectEstado3">
                    <option value="1">Perfeito</option>
                    <option value="2">Ruim</option>
                    <option value="3">Péssimo</option>
                    <option value="0">Perdido</option>                
                </select>

                -->

                <label for="inpPreco">Preço do Livro:</label>
                <input type="text" name="inpPreco" id="inpPreco" disabled>

                <label for="txtMulta">Resumo da Multa:</label>
                <textarea name="txtMulta" id="txtMulta" cols="18" rows="10" disabled></textarea>

                <span id="status" class="status"></span>

                <button id="btnCad" type="submit">Multa Paga</button>
            </div>
        </form>
    </main>

    <script src="../../scripts/toast/dist/tata.js"></script>
    <script src="../../scripts/globalScript.js"></script>
    <script src="../../scripts/clie-devolucao.js"></script>

</body>
</html>
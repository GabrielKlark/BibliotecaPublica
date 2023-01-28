(() => {
    //Forms, Table
    const formVerify = document.querySelector("#formAll");
    const containerDados = document.querySelector("#containerDados");
    const containerComandasAtuais = document.querySelector("#containerCA");
    const containerAtrasosAtuais = document.querySelector("#containerAA");
    const containerHistComandas = document.querySelector("#containerHC");
    const containerHistMultas = document.querySelector("#containerHM");

    //Buttons
    const btnSearch = document.querySelector("#search");
    const btnShowHistComandas = document.querySelector("#showHC");
    const btnShowHistMultas = document.querySelector("#showHM");

    //Campos
    const inpSearch = document.querySelector("#inpSearch");

    inpSearch.addEventListener("input", function () {
        if(inpSearch.value != '')
        {
            btnSearch.disabled = false;
        }
        else 
        {
            btnSearch.disabled = true;
        }
    })

    btnSearch.addEventListener("click", async function (event) {
        
        event.preventDefault();

        ButtonsOff(true);

        let dados = new FormData();
        dados.append('cpf', `${inpSearch.value}`);

        const result = await fetch('/BibliotecaPublica/php/searchVerifyCliente.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.json())

        console.log(result);

        // Returns the json length
        let resultLength = Object.keys(result).length;

        if(resultLength == 0)
        {
            //alert("Cliente não encontrado!");
            tata.error('Erro!', `Cliente não encontrado!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else
        {
            //Clearing current table
            containerDados.innerHTML = "";
            containerComandasAtuais.innerHTML = "";
            containerAtrasosAtuais.innerHTML = "";

            //Write json in table
            containerDados.innerHTML = 
            `
                <h3>Dados</h3>
                <div id="nome">Nome: ${result[0].nm}</div>
                <div id="email">E-mail: ${result[0].email}</div>
                <div id="gen">Gênero: ${result[0].gen}</div>
                <div id="dtNasc">Nascimento: ${result[0].nasc}</div>
                <div id="cel">Celular: ${result[0].cel}</div>
                <div id="end">Endereço: ${result[0].end}</div>
            `

            if (resultLength > 1)
            {
                containerComandasAtuais.innerHTML = 
                `
                    <h3>Comandas Atuais</h3>
                    <div id="codCom">Cod: ${result[1].cod}</div>
                    <div id="dtCom">Realizada em: ${result[1].dt}</div>
                    <div id="devCom">Devolução Prevista: ${result[1].dev}</div>
                    <div id="statusCom">Status: ${Number(result[1].emAtraso) == 0 ? "Em Dia..." : "Em atraso!!!"}</div>
                    <div id="booksCom">Livros: ${result[1].tit}</div>
                `

                if (Number(result[1].emAtraso) == 1)
                {
                    containerAtrasosAtuais.innerHTML = 
                    `
                        <h3>Atrasos Atuais</h3>
                        <div id="comAtr">Comanda: ${result[1].cod}</div>
                        <div id="devAtr">Devolução Prevista: ${result[1].dev}</div>
                        <div id="statusAtr">Status: Cliente será multado! </div>
                    `
                }
                else
                {
                    containerAtrasosAtuais.innerHTML = 
                    `
                        <h3>Nenhuma Comanda Em Atraso Encontrada!</h3>
                    `
                }
            }
            else
            {
                containerComandasAtuais.innerHTML = 
                `
                    <h3>Nenhuma Comanda Ativa Encontrada!</h3>
                `
                containerAtrasosAtuais.innerHTML = 
                `
                    <h3>Nenhuma Comanda Em Atraso Encontrada!</h3>
                `
            }
        }

        ButtonsOff(false);
    /*
        //Clearing current table
        listTable.innerHTML = "";

        // Returns the json length
        let resultLength = Object.keys(result).length;

        if(resultLength == 0)
        {
            alert("Nenhum funcionário encontrado para ser listado...");
        }
        else
        {
            //Write json in table
            for (let i = 0; i < resultLength; i++) {
                
                let linhaDados = document.createElement("tr")
                
                let ativo = result[i].ativo == 1 ? 'Ativo' : 'Inativo' 

                linhaDados.innerHTML = 
                `
                    <td>${result[i].id}</td>
                    <td>${result[i].nm}</td>
                    <td>${result[i].cpf}</td>
                    <td>${result[i].cel}</td>
                    <td>${result[i].email}</td>
                    <td>${result[i].gen}</td>
                    <td>${result[i].nasc}</td>
                    <td>${result[i].perfil}</td>
                    <td>${ativo}</td>
                    <td>${result[i].end}</td>
                `

                listTable.appendChild(linhaDados)
            }
        }

        CamposOff(false);
        if(selectSearch.value == "")
            inpSearch.disabled = true;
    */
    })

    function ButtonsOff(isOff) {    

        btnSearch.disabled = isOff;
        inpSearch.disabled = isOff;
        btnShowHistComandas.disabled = isOff;
        btnShowHistMultas.disabled = isOff;

    }
})();
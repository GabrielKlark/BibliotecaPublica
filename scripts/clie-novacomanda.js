(() => {
    //Forms
    const formNovaComanda = document.querySelector("#formNC");

    //Span
    const spnStatus = document.querySelector("#status");

    //Buttons
    const btnSearch = document.querySelector("#search");
    const btnCad = document.querySelector("#btnCad");

    //Campos
    const inpCPF = document.querySelector("#inpCPF");
    const inpDtAtual = document.querySelector("#inpDtAtual");
    const selectPrazo = document.querySelector("#selectPrazo");
    const inpDev = document.querySelector("#inpDev");
    const inpISBN = document.querySelector("#inpISBN");

    inpCPF.addEventListener("input", function () {
        
        CamposOff(true);
        if(inpCPF.value.length == 14)
            btnSearch.disabled = false;
        else
            btnSearch.disabled = true;

    })

    btnSearch.addEventListener("click", async function (event) { 
        
        event.preventDefault();

        if(inpCPF.value == '')
            return;

        btnSearch.disabled = true;

        let where = `where cpfClie like '${inpCPF.value}'`;

        let dados = new FormData();
        dados.append('where', `${where}`);

        const result = await fetch('/BibliotecaPublica/php/searchCliente.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.json())

        // Returns the json length
        let resultLength = Object.keys(result).length;

        if(resultLength == 0)
        {
            //alert("Cliente não encontrado!");
            tata.error('Erro!', `Nenhum cliente encontrado!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            CamposOff(true);
        }
        else
        {
            CamposOff(false);
        }

        btnSearch.disabled = true;

    })

    selectPrazo.addEventListener("change", function () {
        
        SetPrazoInput(Number(selectPrazo.value))

    })

    formNovaComanda.addEventListener("submit", async function(event) {  

        event.preventDefault();

        CamposOff(true);
        btnSearch.disabled = true;
        inpCPF.disabled = true;

        let dados = new FormData();
        dados.append('inpCPF', inpCPF.value);
        dados.append('inpDtAtual', inpDtAtual.value);
        dados.append('inpDev', inpDev.value);
        dados.append('inpISBN', inpISBN.value);

        const result = await fetch('/BibliotecaPublica/php/insertClie-NC.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.text())

        console.log(result);

        if(result.includes("SUCESSO"))
        {
            window.location.replace("/BibliotecaPublica/Screens/Cliente/comandarealizada.php")
        }
        else
        {
            /*spnStatus.innerHTML = result;
            spnStatus.style.display = "block";
            spnStatus.className = "status status-red"
            setInterval(() => {
                spnStatus.style.display = "none";
                CamposOff(false)
            }, 5000);*/
            tata.error('Falha!', `${result}!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            CamposOff(false);
            btnSearch.disabled = true;
            inpCPF.disabled = false;
        }
    })

    function CamposOff(isOff) {    

        selectPrazo.disabled = isOff;
        inpISBN.disabled = isOff;
        btnCad.disabled = isOff;

    }

    function SetPrazoInput(days)
    {
        let serverDate = new Date(inpDtAtual.value)
        serverDate.setDate(serverDate.getDate() + days)
        
        inpDev.value = serverDate.toISOString().slice(0, 10)
    }

    /*
        Start Page
    */
        //Desativa campos
        CamposOff(true)
        btnSearch.disabled = true;
        //Set Dates
        (async() => {
                //Pega data do servidor
                const result = await fetch('/BibliotecaPublica/php/getServerDate.php', {
                    method: 'POST'
                }).then((res) => res.text())

                //"yyyy-MM-dd" console.log(result)

                //Seta input para data do servidor
                inpDtAtual.value = result;

                //Seta prazo para data do servidor + 10 dias
                SetPrazoInput(10)
        })();

})();
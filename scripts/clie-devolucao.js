(() => {
    //Forms
    const formDev = document.querySelector("#formDev");

    //Span
    const spnStatus = document.querySelector("#status");

    //Buttons
    const btnSearch = document.querySelector("#search");
    const btnCad = document.querySelector("#btnCad");

    //Campos
    const inpCPF = document.querySelector("#inpCPF");
    const inpDtAtual = document.querySelector("#inpDtAtual");
    const inpDt = document.querySelector("#inpDt");
    const inpAtraso = document.querySelector("#inpAtraso");
    const inpISBN = document.querySelector("#inpISBN");
    const inpTit = document.querySelector("#inpTit");
    const selectEstado = document.querySelector("#selectEstado");
    const inpPreco = document.querySelector("#inpPreco");
    const txtMulta = document.querySelector("#txtMulta");

    let codCom = 0;

    inpCPF.addEventListener("input", function () {
        
        selectEstado.disabled = true;
        btnCad.disabled = true;

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

        let dados = new FormData();
        dados.append('inpCPF', `${inpCPF.value}`);

        const result = await fetch('/BibliotecaPublica/php/searchComanda.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.json())

        if(result.codCom != '')
        {
            codCom = result.codCom;
            inpDt.value = result.dtCom;
            inpDev.value = result.dtDev;
            inpISBN.value = result.isbnLiv;
            inpTit.value = result.titLiv;
            inpPreco.value = result.precoLiv;

            CalcAtraso();
            CalcMulta();

            selectEstado.disabled = false;
            btnCad.disabled = false;
        }
        else
        {
            //alert(`Nenhuma comanda ativa encontrada no CPF "${inpCPF.value}"!`);
            tata.error('Nada!', `Nenhuma comanda ativa encontrada no CPF "${inpCPF.value}"!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            selectEstado.disabled = true;
            btnCad.disabled = true;
        }

        btnSearch.disabled = true;

    })

    selectEstado.addEventListener("change", function () {
        
        CalcMulta();

    })

    formDev.addEventListener("submit", async function(event) {  

        event.preventDefault();

        selectEstado.disabled = true;
        btnCad.disabled = true;
        btnSearch.disabled = true;
        inpCPF.disabled = true;

        let dados = new FormData();
        dados.append('codCom', codCom);
        dados.append('dtCom', inpDt.value);
        dados.append('dtDev', inpDev.value);
        dados.append('titLiv', inpTit.value);
        dados.append('isbn', inpISBN.value);

        const result = await fetch('/BibliotecaPublica/php/updateClie-devolucao.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.text())

        if(result.includes("SUCESSO"))
        {
            window.location.replace("/BibliotecaPublica/Screens/Cliente/devolucaorealizada.php")
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
            tata.error('Erro!', `${result}`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
    })

    async function SetDates()
    {
        //Pega data do servidor
        const result = await fetch('/BibliotecaPublica/php/getServerDate.php', {
            method: 'POST'
        }).then((res) => res.text())

        //Seta input para data do servidor
        inpDtAtual.value = result;
    }

    function CalcAtraso()
    {
        let serverDate = new Date(inpDtAtual.value)
        let prazoDate = new Date(inpDev.value)
        
        const calcDaysBetweenDates = (todayDate, prazoDate) => {
            let difference = todayDate.getTime() - prazoDate.getTime()

            let totalDaysBetween = Math.ceil(difference / (1000 * (60 * 60) * 24))

            return totalDaysBetween;
        }

        let atraso = calcDaysBetweenDates(serverDate, prazoDate)

        if(atraso < 0)
        {
            inpAtraso.value = 0;
        }
        else
        {
            inpAtraso.value = Number(atraso);
        }
    }

    function CalcMulta()
    {
        let estado = Number(selectEstado.value)
        let diasEmAtraso = Number(inpAtraso.value)

        let atrasoEmReais, estadoEmReais

        switch (estado) {
            case 0:
                estadoEmReais = Number(inpPreco.value)
                break;
            case 1:
                estadoEmReais = Number(inpPreco.value) / 2
                break;
            case 2:
                estadoEmReais = Number(inpPreco.value) / 5
                break;
            default:
                estadoEmReais = 0;
                break;
        }

        atrasoEmReais = (diasEmAtraso * 1.79)

        txtMulta.innerHTML = `
            Atraso............R$${atrasoEmReais}
            Livro 1...........R$${estadoEmReais}

            Total.............R$${atrasoEmReais + estadoEmReais}
        `;
    }

    (() => {
        selectEstado.disabled = true
        btnCad.disabled = true
        btnSearch.disabled = true

        SetDates();
        CalcMulta();
    })();

})();
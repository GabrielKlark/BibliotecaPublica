(() => {
    //Forms
    const formAtt = document.querySelector("#formAtt");

    //Span
    const spnStatus = document.querySelector("#status");

    //Buttons
    const btnSearch = document.querySelector("#search");
    const btnAtt = document.querySelector("#btnAtt");

    //Campos
    const inpCPF = document.querySelector("#inpCPF");
    const inpNome = document.querySelector("#inpNome");
    const inpEmail = document.querySelector("#inpEmail");
    const inpCel = document.querySelector("#inpCel");
    const inpNasc = document.querySelector("#inpNasc");
    const inpEnd = document.querySelector("#inpEnd");
    const selectGen = document.querySelector("#selectGen");

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
            tata.error('Erro!', `Cliente não encontrado!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            CamposOff(true);
        }
        else
        {
            inpCPF.value = result[0].cpf;
            inpNome.value = result[0].nm;
            selectGen.value = result[0].gen;
            inpEmail.value = result[0].email;
            inpCel.value = result[0].cel;
            inpEnd.value = result[0].end;
            inpNasc.value = result[0].nasc;
            CamposOff(false);
            inpNasc.disabled = true;
        }

        inpCPF.disabled = false;
        btnSearch.disabled = false;

    })

    formAtt.addEventListener("submit", async function(event) {  

        event.preventDefault();

        CamposOff(true);
        btnSearch.disabled = true;
        inpCPF.disabled = true;

        let dados = new FormData();
        dados.append('inpCPF', inpCPF.value);
        dados.append('inpNome', inpNome.value);
        dados.append('selectGen', selectGen.value);
        dados.append('inpEmail', inpEmail.value);
        dados.append('inpCel', inpCel.value);
        dados.append('inpEnd', inpEnd.value);

        const result = await fetch('/BibliotecaPublica/php/updateClie.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.text())

        if(result.includes('sucesso'))
        {
            //spnStatus.className = "status status-green";
            tata.success('Sucesso!', `${result}`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else
        {
            //spnStatus.className = "status status-red"
            tata.error('Erro!', `${result}`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }

        /*spnStatus.innerHTML = result;
        spnStatus.style.display = "block";
        setInterval(() => {
            spnStatus.style.display = "none";
        }, 5000);*/

        inpCPF.disabled = false;
        btnSearch.disabled = false;
    })

    function CamposOff(isOff) {    
        inpNome.disabled = isOff;
        inpEmail.disabled = isOff;
        inpCel.disabled = isOff;
        inpEnd.disabled = isOff;
        selectGen.disabled = isOff;
        inpNasc.disabled = isOff;
        btnAtt.disabled = isOff;
    }
    CamposOff(true)
    btnSearch.disabled = true;

})();

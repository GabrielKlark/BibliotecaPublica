(() => {
    
    //Forms
    const formAtt = document.querySelector("#formAtt");

    //Span
    const spnStatus = document.querySelector("#status");

    //Buttons
    const btnSearch = document.querySelector("#search");
    const btnAtt = document.querySelector("#btnAtt");

    //Campos
    const inpId = document.querySelector("#inpId");
    const inpNome = document.querySelector("#inpNome");
    const inpCPF = document.querySelector("#inpCPF");
    const inpEmail = document.querySelector("#inpEmail");
    const inpCel = document.querySelector("#inpCel");
    const inpNasc = document.querySelector("#inpNasc");
    const inpPerfil = document.querySelector("#inpPerfil");
    const inpAtivo = document.querySelector("#inpAtivo");
    const inpEnd = document.querySelector("#inpEnd");
    const selectGen = document.querySelector("#selectGen");

    inpId.addEventListener("input", function () {
        
        CamposOff(true);
        btnSearch.disabled = false;

    })

    btnSearch.addEventListener("click", async function (event) { 
        
        event.preventDefault();

        if(inpId.value == '')
            return;

        btnSearch.disabled = true;

        let where = `where idFunc = ${inpId.value}`;

        let dados = new FormData();
        dados.append('where', `${where}`);

        const result = await fetch('/BibliotecaPublica/php/searchForFunc.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.json())

        // Returns the json length
        let resultLength = Object.keys(result).length;

        if(resultLength == 0)
        {
            //alert("Nenhum funcionário encontrado!");
            tata.error('Nada!', `Nenhum funcionário encontrado!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            CamposOff(true);
        }
        else
        {
            inpNome.value = result[0].nm;
            selectGen.value = result[0].gen;
            inpCPF.value = result[0].cpf;
            inpEmail.value = result[0].email;
            inpCel.value = result[0].cel;
            inpPerfil.checked = result[0].perfil.includes('Adm');
            inpAtivo.checked = result[0].ativo == 1;
            inpEnd.value = result[0].end;
            inpNasc.value = result[0].nasc;
            CamposOff(false);
        }

        inpId.disabled = false;
        btnSearch.disabled = false;

    })

    formAtt.addEventListener("submit", async function(event) {  

        event.preventDefault();

        //btnAtt.disabled = true;
        CamposOff(true);

        let perfil = (inpPerfil.checked ? 'Adm' : 'Usr')
        let ativo = (inpAtivo.checked ? 1 : 0)

        let dados = new FormData();
        dados.append('inpId', inpId.value);
        dados.append('inpCPF', inpCPF.value);
        dados.append('inpNome', inpNome.value);
        dados.append('selectGen', selectGen.value);
        dados.append('inpEmail', inpEmail.value);
        dados.append('inpCel', inpCel.value);
        dados.append('inpPerfil', perfil);
        dados.append('inpAtivo', ativo);
        dados.append('inpEnd', inpEnd.value);

        const result = await fetch('/BibliotecaPublica/php/updateFunc.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.text())

        //spnStatus.innerHTML = result;
        //spnStatus.style.display = "block";

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

        /*
        setInterval(() => {
            spnStatus.style.display = "none";
        }, 5000);
        */
    })

    function CamposOff(isOff) {    
        inpNome.disabled = isOff;
        inpEmail.disabled = isOff;
        inpCel.disabled = isOff;
        inpEnd.disabled = isOff;
        selectGen.disabled = isOff;
        inpPerfil.disabled = isOff;
        inpAtivo.disabled = isOff;
        btnAtt.disabled = isOff;
        
        inpCPF.disabled = true;
        inpNasc.disabled = true;
    }
    CamposOff(true);

})();
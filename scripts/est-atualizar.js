(() => {
    //Forms
    const formAtt = document.querySelector("#formAtt");

    //Span
    const spnStatus = document.querySelector("#status");

    //Buttons
    const btnSearch = document.querySelector("#search");
    const btnAtt = document.querySelector("#btnAtt");

    //Campos
    const inpISBN = document.querySelector("#inpISBN");
    const inpTit = document.querySelector("#inpTit");
    const inpEst = document.querySelector("#inpEst");
    const inpDisp = document.querySelector("#inpDisp");

    inpISBN.addEventListener("input", function () {

        inpTit.disabled = true;
        inpEst.disabled = true;
        inpDisp.disabled = true;
        btnAtt.disabled = true;

        if (inpISBN.value != "")
            btnSearch.disabled = false;
        else
            btnSearch.disabled = true;

    })

    btnSearch.addEventListener("click", async function (event) { 
        
        event.preventDefault();

        if(inpISBN.value == '')
            return;

        btnSearch.disabled = true;

        let dados = new FormData();
        dados.append('inpISBN', inpISBN.value);

        const result = await fetch('/BibliotecaPublica/php/updateEst-search.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.json())

        if(result[0].cod.includes("Erro_EstoqueNaoCadastrado"))
        {
            /*
            spnStatus.innerHTML = `Livro de ISBN "${inpISBN.value}" não encontrado no Estoque! Tente cadastrá-lo.`

            spnStatus.className = "status status-red"
            spnStatus.style.display = "block"

            setInterval(() => {
                spnStatus.style.display = "none"
                btnCad.disabled = false
            }, 5000)
            */
            tata.error('Nada!', `Livro de ISBN "${inpISBN.value}" não encontrado no Estoque! Tente cadastrá-lo.`, {
                position: 'tr',
                animate: 'slide',
                duration: 6000
            })
        }
        else
        {
            inpTit.value = result[0].tit;

            inpEst.disabled = false;
            inpDisp.disabled = false;
            inpEst.value = result[0].est;
            inpDisp.value = result[0].disp;

            btnAtt.disabled = false;
            btnSearch.disabled = true;
        }

    })

    formAtt.addEventListener("submit", async function(event) {  

        event.preventDefault();

        //btnAtt.disabled = true;
        CamposOff(true);

        let dados = new FormData();
        dados.append('inpISBN', inpISBN.value);
        dados.append('inpTit', inpTit.value);
        dados.append('inpEst', inpEst.value);
        dados.append('inpDisp', inpDisp.value);

        const result = await fetch('/BibliotecaPublica/php/updateEst.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.text())

        if(result.includes('sucesso'))
        {
            tata.success('Sucesso!', `${result}`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else
        {
            tata.error('Erro!', `${result}`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
    })

    function CamposOff(isOff) {    
        inpISBN.disabled = isOff;
        btnSearch.disabled = isOff;
        inpTit.disabled = isOff;
        inpEst.disabled = isOff;
        inpDisp.disabled = isOff;
        btnAtt.disabled = isOff;
    }
    CamposOff(true);
    inpISBN.disabled = false;
    
})();
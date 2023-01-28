(() => {
    //Forms
    const formCad = document.querySelector("#formCad");

    //Span
    const spnStatus = document.querySelector("#status");

    //Buttons
    const btnSearch = document.querySelector("#search");
    const btnCad = document.querySelector("#btnCad");

    //Campos
    const inpISBN = document.querySelector("#inpISBN");
    const inpTit = document.querySelector("#inpTit");
    const inpEst = document.querySelector("#inpEst");
    const inpDisp = document.querySelector("#inpDisp");

    inpISBN.addEventListener("input", function () {

        inpTit.disabled = true;
        inpEst.disabled = true;
        inpDisp.disabled = true;
        btnCad.disabled = true;

        if (inpISBN.value != "")
            btnSearch.disabled = false;
        else
            btnSearch.disabled = true;

    })

    inpEst.addEventListener("input", function () {
        inpDisp.value = inpEst.value;
    })

    btnSearch.addEventListener("click", async function (event) { 
        
        event.preventDefault();

        if(inpISBN.value == '')
            return;

        btnSearch.disabled = true;

        let dados = new FormData();
        dados.append('inpISBN', inpISBN.value);

        const result = await fetch('/BibliotecaPublica/php/insertEst-search.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.json())

        if(result[0].cod.includes("Erro_EncontrarLivro"))
        {
            /*spnStatus.innerHTML = `Livro de ISBN "${inpISBN.value}" não encontrado!`

            spnStatus.className = "status status-red"
            spnStatus.style.display = "block"

            setInterval(() => {
                spnStatus.style.display = "none"
                btnCad.disabled = false
            }, 5000)*/
            tata.error('Erro!', `Livro de ISBN "${inpISBN.value}" não encontrado!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else if (result[0].cod.includes("Erro_EstoqueCadastrado"))
        {
            /*spnStatus.innerHTML = `Livro de ISBN "${inpISBN.value}" já cadastrado no estoque!<br>(Tente atualizá-lo na área de atualizar estoque)`
        
            spnStatus.className = "status status-red"
            spnStatus.style.display = "block"

            setInterval(() => {
                spnStatus.style.display = "none"
                btnCad.disabled = false
            }, 5000)*/
            tata.info('Erro!', `Livro de ISBN "${inpISBN.value}" já cadastrado no estoque!<br>(Tente atualizá-lo na área de atualizar estoque)`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else
        {
            inpTit.value = result[0].tit;

            inpEst.disabled = false;
            inpEst.value = 0;
            inpDisp.value = 0;

            btnCad.disabled = false;
            btnSearch.disabled = true;
        }
    })

    formCad.addEventListener("submit", async function(event) {  

        event.preventDefault();

        CamposOff(true);

        let dados = new FormData();
        dados.append('inpISBN', inpISBN.value);
        dados.append('inpEst', inpEst.value);
        dados.append('inpDisp', inpDisp.value);

        const result = await fetch('/BibliotecaPublica/php/insertEst.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.json())

        // Returns the json length
        let resultLength = Object.keys(result).length;

        if(resultLength == 0)
        {
            tata.info('Erro!', `Falha ao cadastrar no estoque! "` + result, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else
        {
            tata.success('Sucesso!', `Livro "${inpTit.value}" cadastrado com sucesso no estoque com COD: ${result[0].cod}`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            formCad.reset();
        }
        /*if(resultLength == 0)
        {
            spnStatus.innerHTML = "Falha ao cadastrar no estoque! <br>" + result;
            spnStatus.className = "status status-red"
        }  
        else
        {
            spnStatus.innerHTML = `Livro "${inpTit.value}" cadastrado com sucesso no estoque com COD: ${result[0].cod}`;
            spnStatus.className = "status status-green";
        }
        
        spnStatus.style.display = "block";

        setInterval(() => {
            spnStatus.style.display = "none";
            inpISBN.disabled = false;
        }, 5000);*/
    })

    function CamposOff(isOff) {    
        inpISBN.disabled = isOff;
        btnSearch.disabled = isOff;
        inpTit.disabled = isOff;
        inpEst.disabled = isOff;
        inpDisp.disabled = isOff;
        btnCad.disabled = isOff;
    }

    CamposOff(true);
    inpISBN.disabled = false;

})();
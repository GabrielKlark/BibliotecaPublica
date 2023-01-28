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
    const inpAutor = document.querySelector("#inpAutor");
    const inpPreco = document.querySelector("#inpPreco");
    const inpTit = document.querySelector("#inpTit");
    const inpEdit = document.querySelector("#inpEdit");
    const inpAno = document.querySelector("#inpAno");
    const selectIdioma = document.querySelector("#selectIdioma");

    inpISBN.addEventListener("input", function () {

        inpAutor.disabled = true;
        inpPreco.disabled = true;
        inpTit.disabled = true;
        inpEdit.disabled = true;
        inpAno.disabled = true;
        selectIdioma.disabled = true;
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

        let where = `where isbnLiv like "${inpISBN.value}" limit 1`;

        let dados = new FormData();
        dados.append('where', `${where}`);

        const result = await fetch('/BibliotecaPublica/php/searchLivro.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.json())

        // Returns the json length
        let resultLength = Object.keys(result).length;

        if(resultLength == 0)
        {
            //alert("Nenhum livro encontrado!");
            tata.error('Nada!', `Nenhum livro encontrado!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            CamposOff(true);
        }
        else
        {
            inpISBN.value = result[0].isbn;
            inpAutor.value = result[0].autor;
            inpPreco.value = result[0].preco;
            inpTit.value = result[0].tit;
            inpEdit.value = result[0].editora;
            inpAno.value = result[0].ano;
            selectIdioma.value = result[0].idioma;
            CamposOff(false);
        }

        inpISBN.disabled = false;
        btnSearch.disabled = false;

    })

    formAtt.addEventListener("submit", async function(event) {  

        event.preventDefault();

        //btnAtt.disabled = true;
        CamposOff(true);

        let dados = new FormData();
        dados.append('inpISBN', inpISBN.value);
        dados.append('inpAutor', inpAutor.value);
        dados.append('inpPreco', inpPreco.value);
        dados.append('inpTit', inpTit.value);
        dados.append('inpEdit', inpEdit.value);
        dados.append('inpAno', inpAno.value);
        dados.append('selectIdioma', selectIdioma.value);

        const result = await fetch('/BibliotecaPublica/php/updateLivro.php', {
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
            inpISBN.disabled = false;
        }, 5000);*/
    })

    function CamposOff(isOff) {    
        inpISBN.disabled = isOff;
        btnSearch.disabled = isOff;
        inpAutor.disabled = isOff;
        inpPreco.disabled = isOff;
        inpTit.disabled = isOff;
        inpEdit.disabled = isOff;
        inpAno.disabled = isOff;
        selectIdioma.disabled = isOff;
        btnAtt.disabled = isOff;
    }
    //For Script Load
    CamposOff(true);
    inpISBN.disabled = false;

})();
(() => {
    //Forms
    const formCad = document.querySelector("#formCad");

    //Span
    const spnStatus = document.querySelector("#status");

    //Buttons
    const btnCad = document.querySelector("#btnCad");

    //Campos
    const inpTit = document.querySelector("#inpTit");
    const inpPreco = document.querySelector("#inpPreco");
    const inpISBN = document.querySelector("#inpISBN");
    const inpAutor = document.querySelector("#inpAutor");
    const inpEdit = document.querySelector("#inpEdit");
    const inpAno = document.querySelector("#inpAno");
    const selectIdioma = document.querySelector("#selectIdioma");

    //Form de Cadastro
    formCad.addEventListener("submit", async function(event) {  

        event.preventDefault();

        btnCad.disabled = true;

        let dados = new FormData();
        dados.append('inpTit', inpTit.value);
        dados.append('inpPreco', inpPreco.value);
        dados.append('inpISBN', inpISBN.value);
        dados.append('inpAutor', inpAutor.value);
        dados.append('inpEdit', inpEdit.value);
        dados.append('inpAno', inpAno.value);
        dados.append('selectIdioma', selectIdioma.value);

        const result = await fetch('/BibliotecaPublica/php/insertLivro.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.json())   
                    
        if(result != null)
        {
            /*spnStatus.className = "status status-green";
            spnStatus.innerHTML = `Livro "${result.title}" cadastrado com sucesso no <b>COD ${result.cod}</b>`;
            */
            tata.success('Sucesso!', `Livro "${result.title}" cadastrado no COD ${result.cod}`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            formCad.reset();
        }
        else
        {
            /*spnStatus.className = "status status-red"
            spnStatus.innerHTML = `Falha ao cadastrar livro!`;*/
            tata.error('Erro!', `Falha ao cadastrar livro!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
    })
})();
(() => {
    //Forms
    const formCad = document.querySelector("#formCad");

    //Span
    const spnStatus = document.querySelector("#status");

    //Buttons
    const btnCad = document.querySelector("#btnCad");

    //Campos
    const inpNome = document.querySelector("#inpNome");
    const selectGen = document.querySelector("#selectGen");
    const inpCPF = document.querySelector("#inpCPF");
    const inpEmail = document.querySelector("#inpEmail");
    const inpCel = document.querySelector("#inpCel");
    const inpNasc = document.querySelector("#inpNasc");
    const inpEnd = document.querySelector("#inpEnd");

    //Form de Cadastro
    formCad.addEventListener("submit", async function(event) {  

        event.preventDefault();

        btnCad.disabled = true;

        let dados = new FormData();
        dados.append('inpNome', inpNome.value);
        dados.append('selectGen', selectGen.value);
        dados.append('inpCPF', inpCPF.value);
        dados.append('inpEmail', inpEmail.value);
        dados.append('inpCel', inpCel.value);
        dados.append('inpNasc', inpNasc.value);
        dados.append('inpEnd', inpEnd.value);
        dados.append('codFunc', 1);

        const result = await fetch('/BibliotecaPublica/php/insertClie.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.json())   
                    
        let resultLength = Object.keys(result).length;

        if(resultLength > 0)
        {
            if(result.status.includes("Erro_CPFCadastrado"))
            {
                tata.info('Erro!', `Falha ao cadastrar cliente, pois o CPF já está cadastrado!`, {
                    position: 'tr',
                    animate: 'slide',
                    duration: 5000
                })
            }
            else
            {
                tata.success('Sucesso!', `Cliente ${inpNome.value} cadastrado!`, {
                    position: 'tr',
                    animate: 'slide',
                    duration: 5000
                })
                formCad.reset();
            }
        }
        else
        {
            tata.error('Erro!', `Falha ao cadastrar cliente!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }

        btnCad.disabled = false;

        /*
        if(result == null)
        {
            spnStatus.className = "status status-red";
            spnStatus.innerHTML = `Falha ao cadastrar cliente!`;
        }
        else if(result.status.includes("Erro_CPFCadastrado"))
        {
            spnStatus.className = "status status-red";
            spnStatus.innerHTML = `Falha ao cadastrar cliente, pois o CPF já está cadastrado!`;
        }
        else
        {
            spnStatus.className = "status status-green";
            spnStatus.innerHTML = `Cliente ${inpNome.value} cadastrado com sucesso!`;
            formCad.reset();
        }
        spnStatus.style.display = "block";
        setInterval(() => {
            spnStatus.style.display = "none";
            btnCad.disabled = false;
        }, 5000);*/
    })
})();
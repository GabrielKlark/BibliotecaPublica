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
    const inpPerfil = document.querySelector("#inpPerfil");
    const inpEnd = document.querySelector("#inpEnd");

    //Form de Cadastro
    formCad.addEventListener("submit", async function(event) {  

        event.preventDefault();

        btnCad.disabled = true;

        let perfil = (inpPerfil.checked ? 'Adm' : 'Usr')

        let dados = new FormData();
        dados.append('inpNome', inpNome.value);
        dados.append('selectGen', selectGen.value);
        dados.append('inpCPF', inpCPF.value);
        dados.append('inpEmail', inpEmail.value);
        dados.append('inpCel', inpCel.value);
        dados.append('inpNasc', inpNasc.value);
        dados.append('inpPerfil', perfil);
        dados.append('inpEnd', inpEnd.value);

        const result = await fetch('/BibliotecaPublica/php/insertFunc.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.json())   
                    
        console.log(result);

        if(result != null)
        {
            /*
            spnStatus.className = "status status-green";
            spnStatus.innerHTML = `Funcionário ${result.nm} cadastrado com sucesso no <b>ID ${result.id}</b>`;
            */
            tata.success('Sucesso!', `Funcionário ${result.nm} cadastrado com sucesso no ID ${result.id}`, {
                position: 'tr',
                animate: 'slide',
                duration: 7000
            })
            formCad.reset();
        }
        else
        {
            /*
            spnStatus.className = "status status-red";
            spnStatus.innerHTML = `Falha ao cadastrar funcionário!`;
            */
            tata.error('Erro!', `Falha ao cadastrar funcionário!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        /*
        spnStatus.style.display = "block";

        setInterval(() => {
            spnStatus.style.display = "none";
            btnCad.disabled = false;
        }, 5000);
        */
    })
})();
(async() => {
    const result = await fetch('/BibliotecaPublica/php/alreadylogged.php', {
        method: 'POST'
    }).then((res) => res.text())

    if(!result.includes("NOT"))
    {
        tata.info('Usuário logado!', 'Você já está logado!', {
            position: 'tr'
        })
        window.location.replace('/BibliotecaPublica/Screens/home.php')
    }
})();

(() => {
    //Forms
    const formRegister = window.document.querySelector("#formRegister")

    //Fields
    const inpId = window.document.querySelector("#inpId")
    const inpSenha = window.document.querySelector("#inpSenha")

    formRegister.addEventListener('submit', async function (event) {

        event.preventDefault();

        let dados = new FormData();
        dados.append('inpId', inpId.value);
        dados.append('inpSenha', inpSenha.value);

        const result = await fetch('/BibliotecaPublica/php/register.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.text())

        if(result.includes('SUCESS'))
        {
            window.location.replace("/BibliotecaPublica/Screens/home.php")
        }
        else if(result.includes('SENHA_CADASTRADA'))
        {
            alert('Usuário encontrado, mas senha já foi cadastrada!')
            window.location.replace("/BibliotecaPublica/index.php")
        }
        else if(result.includes('ENCONTRAR_ID'))
        {
            //alert(`Usuário de ID ${inpId.value} não encontrado!`)
            tata.error(`Usuário de ID ${inpId.value} não encontrado!`, '', {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else
        {
            //alert('Erro de sistema!')
            tata.error('Erro de sistema!', '', {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }

    })
})();
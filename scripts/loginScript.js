(async() => {
    const result = await fetch('/BibliotecaPublica/php/alreadylogged.php', {
        method: 'POST'
    }).then((res) => res.text())

    if(!result.includes("NOT"))
    {
        //alert('Você já está logado!')
        tata.info('Usuário logado!', 'Você já está logado!', {
            position: 'tr'
        })
        window.location.replace('/BibliotecaPublica/Screens/home.php')
    }
})();

(() => {

    //Forms
    const formLogar = window.document.querySelector("#formLogar")

    //Fields
    const inpId = window.document.querySelector("#inpId")
    const inpSenha = window.document.querySelector("#inpSenha")

    formLogar.addEventListener('submit', async function (event) {

        event.preventDefault();

        let dados = new FormData();
        dados.append('inpId', inpId.value);
        dados.append('inpSenha', inpSenha.value);

        const result = await fetch('/BibliotecaPublica/php/logar.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.text())

        if(result.includes('SUCESS'))
        {
            window.location.replace("/BibliotecaPublica/Screens/home.php")
        }
        else if(result.includes('EMPTY_PASSWORD'))
        {
            alert('Usuário encontrado, mas nenhuma senha foi cadastrada!')
            window.location.replace("/BibliotecaPublica/firstAcess.php")
        }
        else if(result.includes('WRONG_PASSWORD'))
        {
            //alert('Senha inválida!')
            tata.error('Senha inválida!', 'A senha digitada está incorreta!', {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            inpSenha.value = '';
        }
        else if(result.includes('UNAUTHORIZED_USER'))
        {
            tata.error('Usuário não autorizado!', 'Entre em contato com algum administrador para que libere seu acesso!', {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else
        {
            //alert('Usuário não encontrado!') 
            tata.error('Usuário não encontrado!', '', {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }

    });
})();
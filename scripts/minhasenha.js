(() => {

    const formPass = window.document.querySelector('#formPass')

    const inpSenha = window.document.querySelector('#inpSenha')
    const inpNewSenha = window.document.querySelector('#inpNewSenha')
    const inpConfirm = window.document.querySelector('#inpConfirmNewSenha')
    const btnSetPass = window.document.querySelector('#buttonSetPass')

    inpSenha.addEventListener('input', CheckInputs)
    inpNewSenha.addEventListener('input', CheckInputs)
    inpConfirm.addEventListener('input', CheckInputs)

    formPass.addEventListener('submit', async function(event) {
        
        event.preventDefault();

        if(inpSenha.value == "" || inpNewSenha.value == "" || inpConfirmNewSenha.value == "")
        {
            //alert("Preencha todos os campos!")
            tata.info(`Ei,`, 'Preencha todos os campos!', {
                position: 'tr',
                animate: 'slide',
                duration: 3000
            })
            return;
        }

        if(inpNewSenha.value != inpConfirmNewSenha.value)
        {
            //alert(`Os campos "Nova Senha" e "Confirme Nova Senha" devem ser iguais!`)
            tata.info(`Campos Diferentes`, 'Os campos "Nova Senha" e "Confirme Nova Senha" devem ser iguais!', {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            return;
        }

        let dados = new FormData()
        dados.append("senha", inpSenha.value)
        dados.append("novasenha", inpNewSenha.value)

        const result = await fetch('/BibliotecaPublica/php/updatePassword.php', {
            method: 'POST',
            body: dados
        }).then((res) => res.text())

        if(result.includes("SUCESS"))
        {
            alert("Senha atualizada com sucesso!")
            window.location.replace("/BibliotecaPublica/Screens/Data/meusdados.php")
        }
        else if (result.includes("MATCH_PASSWORD"))
        {
            //alert("Senha atual incorreta!")
            tata.error('Senha atual incorreta!', '', {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
            inpSenha.value = ""
        }
        else
        {
            //alert("Erro de Servidor")
            tata.error('Erro de sistema!', 'Notifique os administradores...', {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }

    })

    function CheckInputs()
    {
        if(inpSenha.value == "" || inpNewSenha.value == "" || inpConfirmNewSenha.value == "")
        {
            btnSetPass.disabled = true
        }
        else
        {
            btnSetPass.disabled = false
        }
    }

})();
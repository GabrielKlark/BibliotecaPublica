(() => {
    const formDados = window.document.querySelector('#formDados');

    const inpID = document.querySelector("#inpID");
    const inpNome = document.querySelector("#inpNome");
    const selectGen = document.querySelector("#selectGen");
    const inpCPF = document.querySelector("#inpCPF");
    const inpEmail = document.querySelector("#inpEmail");
    const inpCel = document.querySelector("#inpCel");
    const dtNasc = document.querySelector("#inpNasc");
    const ckbPerfil = document.querySelector("#inpPerfil");
    const inpEnd = document.querySelector("#inpEnd");
    const inpSenha = document.querySelector("#inpSenha");

    let id;

    //Set Data function - auto execute
    (async() => {
        const user = await fetch('/BibliotecaPublica/php/loadMeusDados.php', {
            method: 'POST'
        }).then((res) => res.json())

        id = user.id;
        inpID.value = user.id;
        inpNome.value = user.nm;
        selectGen.value = user.gen;
        inpCPF.value = user.cpf;
        inpEmail.value = user.email;
        inpCel.value = user.cel;
        dtNasc.value = user.nasc;
        ckbPerfil.checked = user.perfil.toUpperCase().includes("ADM");
        inpEnd.value = user.end;
    })();
})();
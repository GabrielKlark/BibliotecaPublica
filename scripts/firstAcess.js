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

(() => {
    //Buttons
    const btnNovaComanda = document.querySelector("#btnNC");

    //Campos
    const cod = document.querySelector("#cod");
    const dt = document.querySelector("#dt");
    const dev = document.querySelector("#dev");
    const books = document.querySelector("#books");

    btnNovaComanda.addEventListener('click', function(event){

        event.preventDefault();
        window.location.replace("/BibliotecaPublica/Screens/Cliente/novacomanda.php");
        
    });

    (async() => {

        const result = await fetch('/BibliotecaPublica/php/searchComandaRealizada.php', {
            method: 'POST'
        }).then((res) => res.json())

        cod.innerHTML += result.cod;
        dt.innerHTML += result.dt;
        dev.innerHTML += result.dev;
        books.innerHTML += result.books;
    })();

})();
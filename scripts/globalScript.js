(() => {
    //Home Button
    const btnHome = window.document.querySelector("a#homeButton");
    const logoutButton = window.document.querySelector("a#logoutButton");

    btnHome.addEventListener('click', () => {

        window.location.replace("../home.php");

    });
    
    logoutButton.addEventListener('click', () => {

        window.location.replace("/BibliotecaPublica/php/usersession_logout.php");

    });

})();
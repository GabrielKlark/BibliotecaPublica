const buttonsContainer = window.document.querySelector('#buttons');

const lblName = window.document.querySelector('#lblName')

async function StartPage()
{
    const user = await fetch('/BibliotecaPublica/php/loadHome.php', {
        method: 'POST'
    }).then((res) => res.json())

    lblName.innerHTML = user.nmFunc;
    if(user.perfil.toUpperCase().includes('ADM'))
    {
        buttonsContainer.innerHTML = `
                                        <div class="buttonsContainer">
                                            <div class="button" id="Func">Funcionários</div>
                                            <div class="button" id="Liv">Livros</div>
                                        </div>
                                        <div class="buttonsContainer">
                                            <div class="button" id="Clie">Clientes</div>
                                            <div class="button" id="Est">Estoque</div>  
                                        </div>
                                        <div class="buttonsContainer">
                                            <div class="button" id="Data">Meus Dados</div>
                                        </div>
                                        `
        const btnFunc = window.document.querySelector('#Func');
        btnFunc.addEventListener('click', func);
    }
    else
    {
        buttonsContainer.innerHTML = `
                                        <div class="buttonsContainer">
                                            <div class="button" id="Liv">Livros</div>
                                        </div>
                                        <div class="buttonsContainer">
                                            <div class="button" id="Clie">Clientes</div>
                                            <div class="button" id="Est">Estoque</div>  
                                        </div>
                                        <div class="buttonsContainer">
                                            <div class="button" id="Data">Meus Dados</div>
                                        </div>
                                        `
    }

    const btnLiv = window.document.querySelector('#Liv');
    btnLiv.addEventListener('click', liv);

    const btnClie = window.document.querySelector('#Clie');
    btnClie.addEventListener('click', clie);

    const btnEst = window.document.querySelector('#Est');
    btnEst.addEventListener('click', est);

    const btnData = window.document.querySelector('#Data');
    btnData.addEventListener('click', dt);
}

function func ()
{
    window.location.replace('./Func/cadastrar.php') 
}

function liv ()
{
    window.location.replace('./Livro/cadastrar.php') 
}

function clie ()
{
    window.location.replace('./Cliente/cadastrar.php') 
}

function est ()
{
    window.location.replace('./Estoque/cadastrar.php') 
}

function dt ()
{
    window.location.replace('./Data/meusdados.php') 
}
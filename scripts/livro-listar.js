(() => {
    //Forms, Table
    const formAll = document.querySelector("#formAll");
    const listTable = document.querySelector("#listTable");

    //Buttons
    const btnSearch = document.querySelector("#search");
    const btnSearchAll = document.querySelector("#searchAll");

    //Campos
    const selectSearch = document.querySelector("#selectSearch");
    const inpSearch = document.querySelector("#inpSearch");

    selectSearch.addEventListener("change", function () {
        
        if(selectSearch.value != "")
        {
            inpSearch.disabled = false;
        }
        else
        {
            inpSearch.disabled = true;
        }

        btnSearch.disabled = true;
        listTable.innerHTML = "";
        inpSearch.value = "";
            
    })

    inpSearch.addEventListener("input", function () {
        if(inpSearch.value != '')
        {
            btnSearch.disabled = false;
        }
        else 
        {
            btnSearch.disabled = true;
        }
    })

    btnSearch.addEventListener("click", async function (event) {
        
        event.preventDefault();

        CamposOff(true);

        let where = `where ${selectSearch.value} like "%${inpSearch.value}%"` 

        let dados = new FormData();
        dados.append('where', `${where}`);

        const result = await fetch('/BibliotecaPublica/php/searchLivro.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.json())

        //Clearing current table
        listTable.innerHTML = "";

        // Returns the json length
        let resultLength = Object.keys(result).length;

        if(resultLength == 0)
        {
            //alert("Nenhum livro encontrado para ser listado...");
            tata.error('Nada!', `Nenhum livro encontrado para ser listado!`, {
                position: 'tr',
                animate: 'slide',
                duration: 5000
            })
        }
        else
        {
            //Write json in table
            for (let i = 0; i < resultLength; i++) {
                
                let linhaDados = document.createElement("tr")
                
                let ativo = result[i].ativo == 1 ? 'Ativo' : 'Inativo' 

                linhaDados.innerHTML = 
                `
                    <td>${result[i].cod}</td>
                    <td>${result[i].isbn}</td>
                    <td>${result[i].tit}</td>
                    <td>${result[i].ano}</td>
                    <td>${result[i].autor}</td>
                    <td>${result[i].editora}</td>
                    <td>${result[i].idioma}</td>
                    <td>${result[i].preco}</td>
                `

                listTable.appendChild(linhaDados)
            }
        }

        CamposOff(false);
        if(selectSearch.value == "")
            inpSearch.disabled = true;

    })

    btnSearchAll.addEventListener("click", async function(event) {  

        event.preventDefault();

        CamposOff(true);

        let resp = confirm("Tem certeza que deseja listar todos os livros? (Isso pode gerar lentidão e falhas de sistema)");

        if(resp)
        {
            let dados = new FormData();
            dados.append('where', '');

            const result = await fetch('/BibliotecaPublica/php/searchLivro.php', {
                        method: 'POST',
                        body: dados
                    }).then((res) => res.json())

            //Clearing current table
            listTable.innerHTML = "";

            // Returns the json length
            let resultLength = Object.keys(result).length;

            if(resultLength == 0)
            {
                //alert("Nenhum livro encontrado para ser listado...");
                tata.error('Nada!', `Nenhum livro encontrado para ser listado!`, {
                    position: 'tr',
                    animate: 'slide',
                    duration: 5000
                })
            }
            else
            {
                //Write json in table
                for (let i = 0; i < resultLength; i++) {
                    
                    let linhaDados = document.createElement("tr")
                    
                    let ativo = result[i].ativo == 1 ? 'Ativo' : 'Inativo' 

                    linhaDados.innerHTML = 
                    `
                        <td>${result[i].cod}</td>
                        <td>${result[i].isbn}</td>
                        <td>${result[i].tit}</td>
                        <td>${result[i].ano}</td>
                        <td>${result[i].autor}</td>
                        <td>${result[i].editora}</td>
                        <td>${result[i].idioma}</td>
                        <td>${result[i].preco}</td>
                    `

                    listTable.appendChild(linhaDados)
                }
            }
        }
        
        CamposOff(false);
        btnSearch.disabled = true;
        if(selectSearch.value == "")
            inpSearch.disabled = true;
        
    })

    function CamposOff(isOff) {    

        btnSearch.disabled = isOff;
        btnSearchAll.disabled = isOff;
        selectSearch.disabled = isOff;
        inpSearch.disabled = isOff;

    }
})();
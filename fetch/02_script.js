const btnCarregar = document.getElementeryById('btn-carregar');
const divResultado = document.getElementeryById('resultado');

btnCarregar.addEventListener('click', () => {
    fetch('https://jsonplaceholder.typicode.com/todos/1')
        .then(response => response.json())
        .then(data => {
            divResultado.textContent = 'Resultado (Fetch + Promises): ' + data.title;
        })
        .catch(erro => {
            console.error('Erro no Fetch:', erro);
        });
    });

const btnCarregar = document.getElementById('btn-carregar');
const divResultado = document.getElementById('resultado');

async function carregarDados() {
  try {
    // 1. Aguarda a resposta bruta da rede
    const response = await fetch('https://jsonplaceholder.typicode.com/todos/1');
    
    // 2. Aguarda a conversão do corpo da mensagem para JSON
    const data = await response.json();
    
    // 3. Usa os dados já convertidos
    divResultado.textContent = 'Resultado (Async/Await): ' + data.title;
    
  } catch (erro) {
    console.error('Erro no Async/Await:', erro);
  }
}

// Associa o evento de clique à função assíncrona
btnCarregar.addEventListener('click', carregarDados);
// Espera que o documento carregue completamente
$(document).ready(function() {
  
  // Escuta o clique no botão com id "btn-carregar"
  $('#btn-carregar').click(function() {
    
    // Faz o pedido AJAX usando o jQuery
    $.ajax({
      url: 'https://jsonplaceholder.typicode.com/todos/1',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Se der certo, coloca o título recebido dentro da div #resultado
        $('#resultado').text('Resultado (jQuery): ' + data.title);
      },
      error: function(erro) {
        // Se der erro, mostra na consola
        console.error('Erro no pedido:', erro);
      }
    });

  });

});

document.getElementById('formulario').addEventListener('submit', function(event) {
  var arquivoInput = document.getElementById('arquivo');
  if (arquivoInput.files.length > 0) {
    var arquivo = arquivoInput.files[0];
    var tamanhoMaximo = 15 * 1024 * 1024; // 10 MB (tamanho máximo permitido)
    if (arquivo.size > tamanhoMaximo) {
      alert('O arquivo excede o tamanho máximo permitido de 15 MB.');
      event.preventDefault(); // Impede o envio do formulário
    }
  }
});

// Aguarda o carregamento do DOM
document.addEventListener('DOMContentLoaded', () => {

  // Botão para resetar os filtros
  const resetButton = document.getElementById('resetButton');

  // Botão "Buscar"
  const buscarButton = document.querySelector('.button-row button:first-child');

  // Referência ao corpo da tabela (onde estão os projetos)
  const table = document.querySelector('table tbody');

  // === Função para resetar filtros ===
  resetButton.addEventListener('click', () => {
    const formBox = document.querySelector('.form-box');
    const inputs = formBox.querySelectorAll('input, select');

    inputs.forEach(element => {
      if (element.tagName === 'SELECT') {
        element.selectedIndex = 0; // Volta para "Selecione"
      } else {
        element.value = ''; // Limpa texto
      }
    });

    // Mostra todas as linhas da tabela após reset
    const rows = table.querySelectorAll('tr');
    rows.forEach(row => row.style.display = '');
  });

  // === Função para aplicar filtros ===
  buscarButton.addEventListener('click', () => {
    const tipoCurso = document.getElementById('tipoCurso').value.toLowerCase();
    const areaCurso = document.getElementById('areaCurso').value.toLowerCase();
    const estado = document.getElementById('estado').value.toLowerCase();
    const rede = document.getElementById('rede').value.toLowerCase();

    const rows = table.querySelectorAll('tr');

    rows.forEach(row => {
      const cells = row.querySelectorAll('td');

      // Ajuste os índices conforme a estrutura real da tabela
      const curso = cells[3]?.textContent.toLowerCase() || '';
      const area = cells[2]?.textContent.toLowerCase() || '';
      const redeCell = cells[1]?.textContent.toLowerCase() || '';

      // Define se a linha deve aparecer
      const matches =
        (tipoCurso === '' || curso.includes(tipoCurso)) &&
        (areaCurso === '' || area.includes(areaCurso)) &&
        (estado === '' || redeCell.includes(estado)) &&
        (rede === '' || redeCell.includes(rede));

      row.style.display = matches ? '' : 'none';
    });
  });

});

// Script para ordenação por Data
// Ordenação por data e título
document.addEventListener('DOMContentLoaded', () => {
  const tableBody = document.querySelector('table tbody');
  const ordenarData = document.getElementById('ordenarData');
  const ordenarTitulo = document.getElementById('ordenarTitulo');

  function ordenarTabela(comparador) {
    const linhas = Array.from(tableBody.querySelectorAll('tr'));
    const linhasOrdenadas = linhas.sort(comparador);
    linhasOrdenadas.forEach(linha => tableBody.appendChild(linha));
  }

  // Ordenar por data
  ordenarData.addEventListener('change', () => {
    const valor = ordenarData.value;
    ordenarTabela((a, b) => {
      const dataA = new Date(a.cells[5].textContent.split('/').reverse().join('/'));
      const dataB = new Date(b.cells[5].textContent.split('/').reverse().join('/'));
      return valor === 'maisRecentes' ? dataB - dataA : dataA - dataB;
    });
  });
// Script para ordenação por A-Z ou Z-A
  // Ordenar por título A-Z ou Z-A
  ordenarTitulo.addEventListener('change', () => {
    const valor = ordenarTitulo.value;
    ordenarTabela((a, b) => {
      const tituloA = a.cells[3].textContent.toLowerCase();
      const tituloB = b.cells[3].textContent.toLowerCase();
      return valor === 'az'
        ? tituloA.localeCompare(tituloB)
        : tituloB.localeCompare(tituloA);
    });
  });
});



document.addEventListener('DOMContentLoaded', () => {
  // Pega todas as linhas da tabela e transforma em array
  const linhas = Array.from(document.querySelectorAll('table tbody tr'));

  // Define quantas linhas (PIs) serão mostradas por página
  const linhasPorPagina = 10;

  // Define a página inicial como 1
  let paginaAtual = 1;

  // Referência aos botões e ao elemento que mostra o número da página atual
  const anteriorBtn = document.getElementById('anteriorBtn');
  const proximoBtn = document.getElementById('proximoBtn');
  const paginaAtualSpan = document.getElementById('paginaAtual');

  // === Função para mostrar apenas as linhas da página atual ===
  function mostrarPagina(pagina) {
    // Calcula o índice da primeira e da última linha da página
    const inicio = (pagina - 1) * linhasPorPagina;
    const fim = inicio + linhasPorPagina;

    // Mostra ou esconde as linhas de acordo com o intervalo da página atual
    linhas.forEach((linha, index) => {
      if (index >= inicio && index < fim) {
        linha.style.display = ''; // mostra
      } else {
        linha.style.display = 'none'; // esconde
      }
    });

    // Atualiza o número da página visível na interface
    paginaAtualSpan.textContent = `Página ${pagina}`;

    // Desativa o botão "Anterior" se estiver na primeira página
    anteriorBtn.disabled = pagina === 1;

    // Desativa o botão "Próximo" se chegou na última página
    proximoBtn.disabled = fim >= linhas.length;
  }

  // === Quando o usuário clica em "Anterior" ===
  anteriorBtn.addEventListener('click', () => {
    if (paginaAtual > 1) {
      paginaAtual--;             // volta uma página
      mostrarPagina(paginaAtual); // atualiza a tabela
    }
  });

  // === Quando o usuário clica em "Próximo" ===
  proximoBtn.addEventListener('click', () => {
    // Só avança se ainda houver mais linhas
    if ((paginaAtual * linhasPorPagina) < linhas.length) {
      paginaAtual++;             // avança uma página
      mostrarPagina(paginaAtual); // atualiza a tabela
    }
  });

  // Mostra a primeira página assim que a página for carregada
  mostrarPagina(paginaAtual);
});


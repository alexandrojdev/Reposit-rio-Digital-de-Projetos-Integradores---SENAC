// module pattern

    // evita poluir o escopo global
const PerfilApp = (function() {
  // constantes privadas
  const btnWhatsapp = document.querySelector('.whatsapp-btn');
  const btnHamburger = document.querySelector('.hamburger');
  const menuNav = document.querySelector('.nav-container');
  const btnScrollTop = document.querySelector('.custom-top-button');

  // metodos privados
  function startShakeCycle() {
    if (!btnWhatsapp) return;
    btnWhatsapp.classList.add('shake');
    setTimeout(() => {
      btnWhatsapp.classList.remove('shake');
    }, 1000);
  }

  function initShake() {
    setTimeout(() => {
      startShakeCycle();
      setInterval(startShakeCycle, 10000);
    }, 10000);
  }

  function setupMenu() {
    if (!btnHamburger || !menuNav) return;
    btnHamburger.addEventListener('click', () => {
      menuNav.classList.toggle('active');
    });
  }

  function setupScrollTop() {
    if (!btnScrollTop) return;
    btnScrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // metodo publico p inicializar o modulo
  function init() {
    initShake();
    setupMenu();
    setupScrollTop();
  }

  // expoe apenas o que for necessário
  return {
    init
  };
})();

// iniciar o modulo
window.addEventListener('DOMContentLoaded', () => PerfilApp.init());
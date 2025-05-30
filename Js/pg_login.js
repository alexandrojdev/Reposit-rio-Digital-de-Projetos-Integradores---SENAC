 
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // evita envio do formulário
    window.location.href = '/Pages/pg_adicionar.html'; // redireciona para a página desejada
});
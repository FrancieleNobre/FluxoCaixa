if (document.getElementById("cpfinput")) {
    document.getElementById("cpfinput").focus();
}

function fazerLogin() {
    var cpf = document.getElementById("cpfinput").value;
    var senha = document.getElementById("senhainput").value;
    var errorMsg = document.getElementById("errorMsg");
    if (cpf === '') {
        errorMsg.style.display = 'block';
        errorMsg.innerHTML = 'O campo de CPF está vazio, por favor, o preencha com seu CPF.';
        return;
    } else {
        errorMsg.style.display = 'none';
    }

    if (senha === '') {
        errorMsg.style.display = 'block';
        errorMsg.innerHTML = 'O campo de senha está vazio, por favor, o preencha com sua senha.';
        return;
    } else if (senha.length < 8) {
        errorMsg.style.display = 'block';
        errorMsg.innerHTML = 'Sua senha deve conter 8 ou mais dígitos.';
        return;
    } else {
        errorMsg.style.display = 'none';
    }

    Processando(); // Adiciona exibição de "Processando"

    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'cpf=' + encodeURIComponent(cpf) + '&senha=' + encodeURIComponent(senha)
    })
        .then(response => {
            esconderProcessando(); // Esconde "Processando" após a resposta
            if (!response.ok) {
                throw new Error('Erro na requisição: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                errorMsg.classList.remove('alert-danger');
                errorMsg.classList.add('alert-success');
                errorMsg.innerHTML = data.message;
                errorMsg.style.display = 'block';
                Processando(); // Adiciona novamente a exibição de "Processando" antes de redirecionar
                setTimeout(function () {
                    window.location.href = 'dashboard.php';
                }, 2000);
            } else {
                errorMsg.style.display = 'block';
                errorMsg.innerHTML = data.message;
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
            errorMsg.style.display = 'block';
            errorMsg.innerHTML = 'Erro na requisição. Por favor, tente novamente mais tarde.';
            esconderProcessando(); // Esconde "Processando" em caso de erro
        });
}

function Processando() {
    var divProcessando = document.createElement('div');
    divProcessando.id = 'processando';
    divProcessando.style.position = 'fixed';
    divProcessando.style.top = '50%';
    divProcessando.style.left = '50%';
    divProcessando.style.transform = 'translate(-50%, -50%)';
    divProcessando.innerHTML = '<img src="./img/loading.gif" width="200px" alt="Processando..." title="Processando...">';
    document.body.appendChild(divProcessando);
}

function esconderProcessando() {
    var divProcessando = document.getElementById('processando');
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}

const aprazo = document.getElementById('aprazo');
const avista = document.getElementById('avista');
const div = document.getElementById('divprazo');

aprazo.addEventListener('click', function () {
    div.style.display = "block";
});

avista.addEventListener('click', function () {
    div.style.display = "none";
});
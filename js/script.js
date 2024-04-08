if (document.getElementById("cpf")) {
    document.getElementById("cpf").focus();
}

function fazerLogin() {
    var cpf = document.getElementById("cpf").value;
    var senha = document.getElementById("senha").value;
    var errorMsg = document.getElementById("errorMsg");

    if (cpf === "") {
        errorMsg.style.display = "block";
        errorMsg.innerHTML =
            "CPF não digitado.";
        return;
    } else if (senha === "") {
        errorMsg.style.display = "block";
        errorMsg.innerHTML =
            "Senha não digitada.";
        return;
    } else if (senha.length < 8) {
        errorMsg.style.display = "block";
        errorMsg.innerHTML = "Mínimo de 8 digitos.";
        return;
    } else {
        errorMsg.style.display = "none";
    }
    mostrarProcessando();
    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
            "cpf=" +
            encodeURIComponent(cpf) +
            "&senha=" +
            encodeURIComponent(senha),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            if (data.success) {
                setTimeout(function () {
                    window.location.href = "dashboard.php";
                }, 2000);
                //alert(data.message);
                errorMsg.classList.remove("erroBonito");
                errorMsg.classList.add("acertoBonito");
                errorMsg.innerHTML = data.message;
                errorMsg.style.display = "block";
            } else {
                errorMsg.style.display = "block";
                errorMsg.innerHTML = data.message;
            }
            esconderProcessando();
        })
        .catch((error) => {
            console.error("Erro na requisição", error);
        });
}
// FUNCAO DE LOADING
function mostrarProcessando() {
    var divProcessando = document.createElement("div");
    divProcessando.id = "processandoDiv";
    divProcessando.style.position = "fixed";
    divProcessando.style.top = "10%";
    divProcessando.style.left = "50%";
    divProcessando.style.transform = "translate(-50%, -50%)";
    divProcessando.innerHTML =
        '<img src="./img/loading.gif" width="70px" alt="Processando..." title="Processando...">';
    document.body.appendChild(divProcessando);
}
// FUNCAO DE ESCONDER O LOADING
function esconderProcessando() {
    var divProcessando = document.getElementById("processandoDiv");
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}
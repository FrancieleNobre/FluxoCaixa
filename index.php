<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fluxo de Caixa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="body">

    <div class="position-absolute top-50 start-50 translate-middle">

        <div class="card" style="width: 18rem;">
            <div class="card-header text-center bg-dark text-white">
                Login
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="cpfinput" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf">
                    </div>
                    <div class="mb-3">
                        <label for="senhainput" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <center>
                        <button type="button" class="btn btn-outline-dark" onclick="fazerLogin()">Login</button>
                    </center>
                </form>
                <div class="alert alert-danger mt-3" role="alert" id="errorMsg" style="display: none;">
                    Senha ou CPF Incorreto!
                </div>
            </div>
        </div>

    </div>

<?php

//   $options = [
//     'cost' => 12,
//   ];
//   $senha = '987654321';
//   $senhaHash = password_hash($senha, PASSWORD_BCRYPT, $options);
//   echo $senhaHash;




?>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>
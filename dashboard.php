<?php
include_once './config/conexao.php';
include_once './config/constantes.php';
include_once './func/funcoes.php';
?>




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
    <nav class="navbar navbar-expand-lg preto" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./dashboard.php">Home</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a href="./index.php" class="btn btn-outline-light">Sair</a>
                </form>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 preto vh-100">

                <ul class="list-group margem">
                    <center>
                        <li class="preto text-white mb-2"><a href="./dashboard.php?page=contratacao" class="textinho">Contratação</a></li>
                        <li class="preto text-white mb-2"><a href="./dashboard.php?page=tipospagamento" class="textinho">Tipos de Pagamentos</a></li>
                        <li class="preto text-white mb-2"><a href="./dashboard.php?page=cliente" class="textinho">Cliente</a></li>
                        <li class="preto text-white mb-2"><a href="./dashboard.php?page=tiposervico" class="textinho">Tipo de Serviços</a></li>
                        <li class="preto text-white"><a href="./dashboard.php?page=adm" class="textinho">ADM</a></li>
                    </center>
                </ul>


            </div>
            <div class="col-md-10">
                <?php
                    if (isset($_GET['page'])){
                        if ($_GET['page'] == 'cliente'){
                            include_once 'cliente.php';
                        } else if ($_GET['page'] == 'tiposervico'){
                            include_once 'tiposervico.php';
                        } else if ($_GET['page'] == 'adm'){
                            include_once 'adm.php';
                        } else if ($_GET['page'] == 'contratacao'){
                            include_once 'contratacao.php';
                        } else if ($_GET['page'] == 'tipospagamento'){
                            include_once 'tipospagamento.php';
                        }
                    } else{
                        echo "<center><h1 class='mt-5'>Bem Vindo!!!</h1></center>";
                    };

                ?>

            </div>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>
<?php
include_once("./config/conexao.php");
include_once("./config/constantes.php");
include_once("./func/funcoes.php");
$conn = conectar();

if ( isset($_POST['nomecadadm'])) {
    $nome = $_POST['nomecadadm'];
    $cpf = $_POST['cpfcadadm'];
    $senha = $_POST['senhacadadm']; 
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $register = $conn->prepare("INSERT INTO adm (nome, cpf, senha) VALUES (:nome, :cpf, :senha)");
    $register->bindParam(':nome', $nome);
    $register->bindParam(':cpf', $cpf);
    $register->bindParam(':senha', $senha_hash);
    $register->execute();

    header('Location: dashboard.php?page=adm');
    exit; 
}

if ( isset($_POST['servicad'])) {
    $tiposervico = $_POST['servicad'];
    $register = $conn->prepare("INSERT INTO tiposervico (tiposervico) VALUES (:tiposervico)");
    $register->bindParam(':tiposervico', $tiposervico);
    $register->execute();
    header('Location: dashboard.php?page=tiposervico');
    exit; 
}

if ( isset($_POST['nomecadcli'])) {
    $nome = $_POST['nomecadcli'];
    $cpf = $_POST['cpfcadcli'];
    $register = $conn->prepare("INSERT INTO cliente (nome, cpf) VALUES (:nome, :cpf)");
    $register->bindParam(':nome', $nome);
    $register->bindParam(':cpf', $cpf);
    $register->execute();
    header('Location: dashboard.php?page=cliente');
    exit; 
}

if ( isset($_POST['nomecadpag'])) {
    $pagamento = $_POST['nomecadpag'];
    $register = $conn->prepare("INSERT INTO tipopagamento (tipopagamento) VALUES (:tipopagamento)");
    $register->bindParam(':tipopagamento', $pagamento);
    $register->execute();
    header('Location: dashboard.php?page=tipospagamento');
    exit; 
}

if ( isset($_POST['selectcliente'])) {
    $selectcliente = $_POST['selectcliente'];
    $selectservico = $_POST['selectservico'];
    $valor = $_POST['valor']; 
    $selectpag = $_POST['selectpag']; 
    $valorentrada = $_POST['valorentrada']; 
    $parcelas = $_POST['parcelas']; 
    $prazo = $_POST['prazo']; 
    $administrador = $_POST['administrador']; 
    $register = $conn->prepare("INSERT INTO contrato (idcliente, idtiposervico, idtipopagamento, idadm, valor, prazoentrega, valorentrada, parcelas) VALUES (:idcliente, :idtiposervico, :idtipopagamento, :idadm, :valor, :prazoentrega, :valorentrada, :parcelas)");
    $register->bindParam(':idcliente', $selectcliente);
    $register->bindParam(':idtiposervico', $selectservico);
    $register->bindParam(':idtipopagamento', $selectpag);
    $register->bindParam(':idadm', $administrador);
    $register->bindParam(':valor', $valor);
    $register->bindParam(':prazoentrega', $prazo);
    $register->bindParam(':valorentrada', $valorentrada);
    $register->bindParam(':parcelas', $parcelas);
    $register->execute();

    header('Location: dashboard.php?page=contratacao');
    exit; 
}




?>


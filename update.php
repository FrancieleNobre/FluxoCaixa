<?php
include_once("./config/conexao.php");
include_once("./config/constantes.php");
include_once("./func/funcoes.php");
$conn = conectar();

if (isset($_POST['idaltadm'])) {
    $id = $_POST['idaltadm'];
    $nome = $_POST['nomeimpadm'];
    $cpf = $_POST['cpfimpadm'];
    $ativo = $_POST['ativoadmimp'];
    $update = "UPDATE adm SET nomeadm = :nome, cpfadm = :cpf, ativo = :ativo WHERE idadm = :idadm";
    $stmt = $conn->prepare($update);
    $stmt->bindParam(':idadm', $id); 
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':ativo', $ativo);
    $stmt->execute(); 
    header('Location: dashboard.php?page=adm'); 
}

if (isset($_POST['idseralt'])) {
    $id = $_POST['idseralt'];
    $nome = $_POST['tipaltservi'];
    $ativo = $_POST['ativoseralt'];
    $update = "UPDATE tiposervico SET tiposervico = :tiposervico, ativo = :ativo WHERE idtiposervico = :idtiposervico";
    $stmt = $conn->prepare($update);
    $stmt->bindParam(':idtiposervico', $id); 
    $stmt->bindParam(':tiposervico', $nome);
    $stmt->bindParam(':ativo', $ativo);
    $stmt->execute(); 
    header('Location: dashboard.php?page=tiposervico'); 
}

if (isset($_POST['idaltcli'])) {
    $id = $_POST['idaltcli'];
    $nome = $_POST['nomeclialt'];
    $cpf = $_POST['cpfaltcli'];
    $ativo = $_POST['ativoaltcli'];
    $update = "UPDATE cliente SET nome = :nome, cpf = :cpf, ativo = :ativo  WHERE idcliente = :idcliente";
    $stmt = $conn->prepare($update);
    $stmt->bindParam(':idcliente', $id); 
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':ativo', $ativo);
    $stmt->execute(); 
    header('Location: dashboard.php?page=cliente'); 
}

if (isset($_POST['idaltpag'])) {
    $id = $_POST['idaltpag'];
    $tipopagamento = $_POST['pagalt'];
    $status = $_POST['ativoaltpag'];
    $update = "UPDATE tipopagamento SET tipopagamento = :tipopagamento , ativo = :ativo  WHERE idtipopagamento = :idtipopagamento";
    $stmt = $conn->prepare($update);
    $stmt->bindParam(':idtipopagamento', $id); 
    $stmt->bindParam(':tipopagamento', $tipopagamento);
    $stmt->bindParam(':ativo', $status);
    $stmt->execute(); 
    header('Location: dashboard.php?page=tipospagamento'); 
}

?>

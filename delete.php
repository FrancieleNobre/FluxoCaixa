<?php
include_once("./config/conexao.php");
include_once("./config/constantes.php");
include_once("./func/funcoes.php");
$conn = conectar();

if (isset($_GET['idadm'])) {
  $id = $_GET['idadm'];
  $delete = "DELETE FROM adm WHERE idadm = :id";
  $delete = $conn->prepare($delete);
  $delete->bindParam(':id', $id);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header('location:dashboard.php?page=adm');
}

if (isset($_GET['idservico'])) {
    $id = $_GET['idservico'];
    $delete = "DELETE FROM tiposervico WHERE idtiposervico = :id";
    $delete = $conn->prepare($delete);
    $delete->bindParam(':id', $id);
    $conn->beginTransaction();
    $delete->execute();
    $conn->commit();
    header('location:dashboard.php?page=tiposervico');
  }


  if (isset($_GET['idclien'])) {
    $id = $_GET['idclien'];
    $delete = "DELETE FROM cliente WHERE idcliente = :id";
    $delete = $conn->prepare($delete);
    $delete->bindParam(':id', $id);
    $conn->beginTransaction();
    $delete->execute();
    $conn->commit();
    header('location:dashboard.php?page=cliente');
  }

  if (isset($_GET['idpag'])) {
    $id = $_GET['idpag'];
    $delete = "DELETE FROM tipopagamento WHERE idtipopagamento = :id";
    $delete = $conn->prepare($delete);
    $delete->bindParam(':id', $id);
    $conn->beginTransaction();
    $delete->execute();
    $conn->commit();
    header('location:dashboard.php?page=tipospagamento');
  }



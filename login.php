<?php

include_once "./config/conexao.php";
include_once "./config/constantes.php";

$POST = filter_input_array(INPUT_POST);
$email = $_POST['cpfinput'];
$senha = $_POST['senhainput'];
$options = [
    'cost' => 12
];
$conn = conectar();
try {
    $select = $conn->prepare("SELECT idadm, nomeadm, cpfadm, senha FROM adm WHERE cpfadm = :cpfadm");
    $select->bindValue(":cpfadm", $email);
    $conn->beginTransaction();
    $select->execute();
    $conn->commit();
    if ($select->rowCount() > 0) {
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if (password_verify($senha, $select['senha'])) {
            $result = $select;
        } else {
            $result = 'senha';
        }
    } else {
        $result = 'user';
    }
} catch (PDOException $e) {
    echo ('ERROR - ' . $e->getMessage());
    $conn->rollBack();
}
if (isset($result)) {
    ob_start();
    switch ($result) {
        case 'user':
            $response = ['success' => false, 'message' => 'Usúario Inválido!'];
            break;
        case 'senha':
            $response = ['success' => false, 'message' => 'Senha incorreta!'];
            break;
        default:
            session_start();
            $dados = ['idadm' => $select['idadm'], 'nome' => $select['nomeadm'], 'email' => $select['cpfadm']];
            $_SESSION['idadm'] = $select['idadm'];
            $_SESSION['nome'] = $select['nome'];
            $_SESSION['email'] = $select['email'];
            $response = ['success' => true, 'message' => 'Logado com sucesso!', 'dados' => $dados];
            break;
    }
    header('Content-Type: application/json');
    echo (json_encode($response));
    ob_end_flush();
}

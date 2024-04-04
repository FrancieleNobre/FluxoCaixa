<?php
include_once '.config/constantes.php';
include_once '.config/conexao.php';
include_once '.func/funcoes.php';
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$cpf = $dados['cpfinput'];
$senha = $dados['senhainput'];

 $retornoValidar = validarSenhaCriptografia('idadm, nome, cpf, senha', 'adm', 'cpf', 'senha', $cpf, $senha, 'ativo', 'A');
if ($retornoValidar) {
    if ($retornoValidar == 'usuario') {
        echo json_encode(['success' => false, 'message' => 'CPF inválido!']);
    } else if ($retornoValidar == 'senha') {
        echo json_encode(['success' => false, 'message' => 'Senha inválida!']);
    } else {
        $_SESSION['idadm'] = $retornoValidar -> idadm ;
        $_SESSION['nome'] = $retornoValidar -> nome;
        $_SESSION['cpf'] = $retornoValidar -> cpf;
        echo json_encode(['success' => true, 'message' => 'Login efetuado com sucesso! Redirecionando']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Usuário ou senha inválidos!']);
}


?>
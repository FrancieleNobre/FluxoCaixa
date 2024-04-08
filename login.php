<?php
include_once("config/conexao.php");
include_once("config/constantes.php");
include_once("func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// echo json_encode($dados);

$cpf = $dados['cpf'];
$senha = $dados['senha'];
$retornoValidar = verificarSenhaCriptografada('*', 'adm', 'cpfadm', $cpf, 'senha', $senha, 'ativo', 'A');

if ($retornoValidar) {
    if ($retornoValidar == 'usuario') {
        echo json_encode(['success' => false, 'message' => 'CPF invalido']);
    } else if ($retornoValidar == 'senha') {
        echo json_encode(['success' => false, 'message' => 'Senha invalida!']);
    } else {
        $_SESSION['idadm'] = $retornoValidar->idadm;
        $_SESSION['nomeadm'] = $retornoValidar->nomeadm;
        $_SESSION['cpfadm'] = $retornoValidar->cpfadm;

        echo json_encode(['success' => true, 'message' => "Logado com sucesso!"]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'CPF e Senha invalidos!']);
}

<?php
// function listarTabela($campos,$tabela, $campoOrdem)
// {
//     $conn = conectar();
//     try {
//         $conn->beginTransaction();
//         $sqlLista = $conn->prepare("SELECT $campos FROM $tabela ORDER BY $campoOrdem ");
// //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
//         $sqlLista->execute();
//         $conn->commit();
//         if ($sqlLista->rowCount() > 0) {
//             return $sqlLista->fetchAll(PDO::FETCH_OBJ);
//         } else {
//             return 'Vazio';
//         };
//     } catch
//     (PDOExecption $e) {
//         echo 'Exception -> ';
//         return ($e->getMessage());
//         $conn->rollback();
//     };
//     $conn = null;
// }

function listar($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
function listarTabela()
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT c.idcontrato, ce.nome, ts.tiposervico, tp.tipopagamento, a.nomeadm, c.valor, c.prazoentrega, c.parcelas, c.valorentrada  FROM contrato c INNER JOIN cliente ce ON ce.idcliente = c.idcliente INNER JOIN tiposervico ts ON ts.idtiposervico = c.idtiposervico INNER JOIN tipopagamento tp ON tp.idtipopagamento = c.idtipopagamento INNER JOIN adm a ON a.idadm = c.idadm;");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function cadastrar($idgenero, $nomefilme, $cadastro)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO filme(idgenerofilme,nomefilme,cadastro) VALUES (?,?,?);");
        $sqlLista->bindValue(1, $idgenero, PDO::PARAM_INT);
        $sqlLista->bindValue(2, $nomefilme, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $cadastro, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
function genero($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function cadastrargenero($nomegenero)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlinsert = $conn->prepare("INSERT INTO generofilme(genero) VALUES (?);");
        $sqlinsert->bindValue(1, $nomegenero, PDO::PARAM_STR);
        $sqlinsert->execute();
        $idInsertRetorno = $conn->lastInsertId();
        $conn->commit();
        if ($sqlinsert->rowCount() > 0) {
            return $idInsertRetorno;
        } else {
            return 'nGravado';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function listarCliente($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
function cadastrarcliente($nome, $nascimento, $celular, $cadastro)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO cliente(nome,nascimento,celular,cadastro) VALUES (?,?,?,?);");
        $sqlLista->bindValue(1, $nome, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $nascimento, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $celular, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $cadastro, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

// function alterarfilme($nomefn,$generofn,$idfn)
// {
//     $conn = conectar();
//     try {
//         $conn->beginTransaction();
//         $sqlLista = $conn->prepare("UPDATE filme SET nomefilme='?',idgenerofilme='?' WHERE idfilme=?;");
//         $sqlLista->bindValue(1, $nomefn, PDO::PARAM_STR);
//         $sqlLista->bindValue(2, $generofn, PDO::PARAM_INT);
//         $sqlLista->bindValue(3, $idfn, PDO::PARAM_INT);
//         $sqlLista->execute();
//         $conn->commit();
//         if ($sqlLista->rowCount() > 0) {
//             return $sqlLista->fetchAll(PDO::FETCH_OBJ);
//         } else {
//             return 'Vazio';
//         };
//     } catch
//     (PDOExecption $e) {
//         echo 'Exception -> ';
//         return ($e->getMessage());
//         $conn->rollback();
//     };
//     $conn = null;
// }

// function validarSenha($campos, $tabela, $campoBdString, $campoBdString2, $campoParametro, $campoParametro2, $campoBdAtivo, $valorAtivo){
// $conn = conectar();

// try {
//     $conn->beginTransaction();
//     $sqlLista = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoBdString = ? AND $campoBdString2 = ? AND $campoBdAtivo = ?");
//     $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_STR);
//     $sqlLista->bindValue(2, $campoParametro2, PDO::PARAM_STR);
//     $sqlLista->bindValue(3, $valorAtivo, PDO::PARAM_STR);
//     $sqlLista->execute();
//     $conn->commit();

//     if ($sqlLista->rowCount() > 0) {
//         return $sqlLista->fetchAll(PDO::FETCH_OBJ);
//     } else {
//         return 'Vazio';
//     }
// } catch (Throwable $e) {
//     $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//     $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//     $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
//     error_log($error_message, 3, 'log/arquivo_de_log.txt');
//     $conn->rollback();
//     throw $e;
// }


// }

function verificarSenhaCriptografada($campos, $tabela, $campoBdEmail, $campoEmail, $campoBdSenha, $campoSenha, $campoBdAtivo, $campoAtivo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoBdEmail = ? AND $campoBdAtivo = ?");
        $sqlverificar->bindValue(1, $campoEmail, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $campoAtivo, PDO::PARAM_STR);
        $sqlverificar->execute();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            $retornoSql = $sqlverificar->fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornoSql->$campoBdSenha;
            if (password_verify($campoSenha, $senha_hash)) {
                return $retornoSql;
            } else {
                return 'senha';
            }
        } else {
            return 'usuario';
        }
    } catch (Throwable $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function alterarUm($generoum, $idvalor)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlinsert = $conn->prepare("UPDATE generofilme SET genero = ? WHERE idgenerofilme = ?");
        $sqlinsert->bindValue(1, $generoum, PDO::PARAM_STR);
        $sqlinsert->bindValue(2, $idvalor, PDO::PARAM_INT);
        $sqlinsert->execute();
        $conn->commit();
        if ($sqlinsert->rowCount() > 0) {
            return $sqlinsert->fetchAll((PDO::FETCH_OBJ));
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}


function excluir($id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlexcluir = $conn->prepare("DELETE FROM generofilme WHERE idgenerofilme = ?");
        $sqlexcluir->bindValue(1, $id, PDO::PARAM_INT);
        $sqlexcluir->execute();
        $conn->commit();
        if ($sqlexcluir->rowCount() > 0) {
            return true;
        } else {
            return null;
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function alterarTres($valor1, $valor2, $valor3, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlinsert = $conn->prepare("UPDATE cliente SET nome = ?, nascimento = ?, celular = ? WHERE idcliente = ?");
        $sqlinsert->bindValue(1, $valor1, PDO::PARAM_STR);
        $sqlinsert->bindValue(2, $valor2, PDO::PARAM_STR);
        $sqlinsert->bindValue(3, $valor3, PDO::PARAM_STR);
        $sqlinsert->bindValue(4, $id, PDO::PARAM_INT);
        $sqlinsert->execute();
        $conn->commit();
        if ($sqlinsert->rowCount() > 0) {
            return $sqlinsert->fetchAll((PDO::FETCH_OBJ));
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function excluircliente($idcliente)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlexcluir = $conn->prepare("DELETE FROM cliente WHERE idcliente = ?");
        $sqlexcluir->bindValue(1, $idcliente, PDO::PARAM_INT);
        $sqlexcluir->execute();
        $conn->commit();
        if ($sqlexcluir->rowCount() > 0) {
            return true;
            // return $sqlexcluir->fetchAll((PDO::FETCH_OBJ));
        } else {
            return null;
        }
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

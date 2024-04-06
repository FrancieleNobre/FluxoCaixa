<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-white">Dashboard</li>
            <li class="breadcrumb-item text-white" aria-current="page">Contratação</li>
        </ol>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="bg-dark text-white">#</th>
                <th scope="col" class="bg-dark text-white">Nome Cliente</th>
                <th scope="col" class="bg-dark text-white">Tipo de Serviço</th>
                <th scope="col" class="bg-dark text-white">Tipo Pagamento</th>
                <th scope="col" class="bg-dark text-white">Nome Administrador</th>
                <th scope="col" class="bg-dark text-white">Valor contratado</th>
                <th scope="col" class="bg-dark text-white">Valor entrada</th>
                <th scope="col" class="bg-dark text-white">Parcelas</th>
                <th scope="col" class="bg-dark text-white">Prazo de Entrega</th>
                <th scope="col" class="bg-dark text-white">Ação</th>
                <th scope="col" class="bg-dark text-white"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#contratar">CONTRATAR</button></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contrato = listarTabela();
            if ($contrato !== 'Vazio') {
                foreach ($contrato as $contratos) {
                    $idcontrato = $contratos->idcliente;
                    $nomeC = $contratos->nome;
                    $tiposervico = $contratos->tiposervico;
                    $tipopagamento = $contratos->tipopagamento;
                    $nomeadm = $contratos->nomeadm;
                    $valor = $contratos->nomeadm;
                    $valorentrada = $contratos->valorentrada;
                    $parcelas = $contratos->parcelas;
                    $prazoentrega = $contratos->prazoentrega;

            ?>
                    <tr>
                        <th scope="row"><?php echo $idcontrato ?></th>
                        <td><?php echo $nomeC ?></td>
                        <td><?php echo $tiposervico ?></td>
                        <td><?php echo $tipopagamento ?></td>
                        <td><?php echo $nomeadm ?></td>
                        <td><?php echo $valor ?></td>
                        <td><?php echo $valorentrada ?></td>
                        <td><?php echo $parcelas ?></td>
                        <td><?php echo $prazoentrega ?></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#vermaicli<?php echo $idcliente ?>">Ver mais</button>
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#altcli<?php echo $idcliente ?>">Alterar</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delcli<?php echo $idcliente ?>">Excluir</button>
                            </div>
                        </td>
                        <td></td>
                        <!-- Modal Excluir cliente -->
                        <div class="modal fade" id="delcli<?php echo $idcliente ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Você tem certeza que deseja excluir o cliente "<?php echo $nomeC ?>"?!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?idclien=<?php echo $idcliente ?>" class="btn btn-danger">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ver+ cliente -->
                        <div class="modal fade" id="vermaicli<?php echo $idcliente ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>ID:</b> <?php echo $idcliente ?></p>
                                        <p><b>NOME:</b> <?php echo $nomeC ?></p>
                                        <p><b>CPF:</b> <?php echo $cpf ?></p>
                                        <p><b>STATUS:</b> <?php echo $ativo ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                                      
                        </div>
                        <!-- Modal ALTERAR cliente -->
                        <div class="modal fade" id="altcli<?php echo $idcliente ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="update.php" method="post">
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Alterar Serviço</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nomeclialt" class="form-label">NOME:</label>
                                                <input type="text" class="form-control" id="nomeclialt" name="nomeclialt" value="<?php echo $nomeC; ?>">
                                                <input type="text" class="form-control d-none" id="idaltcli" name="idaltcli" value="<?php echo $idcliente; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cpfaltcli" class="form-label">CPF:</label>
                                                <input type="text" class="form-control" id="cpfaltcli" name="cpfaltcli" value="<?php echo $cpf; ?>">
                                            </div>
                                            <label class="form-label">ATIVO:</label>
                                            <select class="form-select" aria-label="Default select example" id="ativoaltcli" name="ativoaltcli">
                                                <option value="A">Ativado</option>
                                                <option value="D">Desativado</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">Alterar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </tr>
                <?php
                }
            } else {
                ?>
                <td class="text-center">Nada para mostrar</td>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<!-- Modal CADASTRAR contratacao -->
<div class="modal fade" id="contratar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="cadastro.php" method="post">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">contratar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Cliente:</label>
                    <select class="form-select" aria-label="Default select example" required="required">
                        <option selected>Selecione o Cliente</option>
                        <?php
                        $clientes = listar('idcliente, nome', 'cliente');
                        foreach ($clientes as $cliente) {
                            $idcliente = $cliente->idcliente;
                            $nomecli = $cliente->nome;
                        ?>
                            <option value="<?php echo $idcliente ?>"><?php echo $nomecli ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="form-label mt-3">Tipo de Serviço:</label>
                    <select class="form-select" aria-label="Default select example" required="required">
                        <option selected>Selecione o Tipo de Serviço</option>
                        <?php
                        $tiposervico = listar('idtiposervico, tiposervico', 'tiposervico');
                        foreach ($tiposervico as $tiposervicos) {
                            $idtiposervico = $tiposervicos->idtiposervico;
                            $tiposervico = $tiposervicos->tiposervico;
                        ?>
                            <option value="<?php echo $idtiposervico ?>"><?php echo $tiposervico ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="mb-3">
                        <label for="valor" class="form-label mt-3">Valor contratado:</label>
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="Informe o valor contratado">
                    </div>
                    <label class="form-label">Tipo de Pagamento:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="avista" checked>
                        <label class="form-check-label" for="avista">
                            À vista
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="aprazo">
                        <label class="form-check-label" for="aprazo">
                            A Prazo
                        </label>
                    </div>
                    <div id="divprazo" style="display: none;">
                    <div class="mb-3">
                        <label for="valorentrada" class="form-label mt-3">Valor Entrada:</label>
                        <input type="text" class="form-control" id="valorentrada" name="valorentrada" placeholder="Informe o valor de entrada">
                    </div>
                    <div class="mb-3">
                        <label for="parcelas" class="form-label">Parcelas:</label>
                        <input type="text" class="form-control" id="parcelas" name="parcelas" placeholder="Informe as parcelas">
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="prazo" class="form-label">Prazo de Entrega:</label>
                        <input type="date" class="form-control" id="prazo" name="prazo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
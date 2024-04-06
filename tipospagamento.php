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
                <th scope="col" class="bg-dark text-white">tipo de pagamento</th>
                <th scope="col" class="bg-dark text-white">status</th>
                <th scope="col" class="bg-dark text-white">cadastro</th>
                <th scope="col" class="bg-dark text-white">Ação</th>
                <th scope="col" class="bg-dark text-white"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadpag">CADASTRAR</button></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $pagamento = listar('*', 'tipopagamento');
            if ($contrato !== 'Vazio') {
                foreach ($pagamento as $pagamento1) {
                    $idpagamento = $pagamento1->idtipopagamento;
                    $tipopagamento = $pagamento1->tipopagamento;
                    $status = $pagamento1->ativo;
                    $cadastro = $pagamento1->cadastro;

            ?>
                    <tr>
                        <th scope="row"><?php echo $idpagamento ?></th>
                        <td><?php echo $tipopagamento ?></td>
                        <td><?php if ($status == 'A') {
                                echo 'Ativado';
                            } else {
                                echo 'Desativado';
                            }
                            ?></td>
                        <td><?php echo $cadastro ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#vermaipag<?php echo $idpagamento ?>">Ver mais</button>
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#altpag<?php echo $idpagamento ?>">Alterar</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delpag<?php echo $idpagamento ?>">Excluir</button>
                            </div>
                        </td>
                        <td></td>
                        <!-- Modal Excluir pagamento -->
                        <div class="modal fade" id="delpag<?php echo $idpagamento ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Tipo De Pagamento</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Você tem certeza que deseja excluir o tipo de pagamento "<?php echo $tipopagamento ?>"?!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?idpag=<?php echo $idpagamento ?>" class="btn btn-danger">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ver+ pagamento -->
                        <div class="modal fade" id="vermaipag<?php echo $idpagamento ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>ID:</b> <?php echo $idpagamento ?></p>
                                        <p><b>TIPO DE PAGAMENTO:</b> <?php echo $tipopagamento ?></p>
                                        <p><b>STATUS:</b> <?php echo $status ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                                      
                        </div>
                        <!-- Modal ALTERAR pagamento -->
                        <div class="modal fade" id="altpag<?php echo $idpagamento ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="update.php" method="post">
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Alterar Serviço</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="pagalt" class="form-label">Tipo De Pagamento:</label>
                                                <input type="text" class="form-control" id="pagalt" name="pagalt" value="<?php echo $tipopagamento; ?>">
                                                <input type="text" class="form-control d-none" id="idaltpag" name="idaltpag" value="<?php echo $idpagamento; ?>">
                                            </div>
                                            <label for="senhainput" class="form-label">Ativo:</label>
                                            <select class="form-select" aria-label="Default select example" id="ativoaltpag" name="ativoaltpag">
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

<!-- Modal CADASTRAR pagamento -->
<div class="modal fade" id="cadpag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="cadastro.php" method="post">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar tipo de pagamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomecadpag" class="form-label">Tipos De Pagamento:</label>
                        <input type="text" class="form-control" id="nomecadpag" name="nomecadpag" placeholder="Informe o tipo de pagamento">
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
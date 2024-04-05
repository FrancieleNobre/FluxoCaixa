<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-white">Dashboard</li>
            <li class="breadcrumb-item text-white" aria-current="page">Tipo de Serviço</li>
        </ol>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="bg-dark text-white">#</th>
                <th scope="col" class="bg-dark text-white">Serviço</th>
                <th scope="col" class="bg-dark text-white">Status</th>
                <th scope="col" class="bg-dark text-white">Ação</th>
                <th scope="col" class="bg-dark text-white"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadser">CADASTRAR</button></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servico = listar('*', 'tiposervico');
            foreach ($servico as $servicos) {
                $idservico = $servicos->idtiposervico;
                $tiposervico = $servicos->tiposervico;
                $ativo = $servicos->ativo;

            ?>
                <tr>
                    <th scope="row"><?php echo $idservico ?></th>
                    <td><?php echo $tiposervico ?></td>
                    <td><?php if ($ativo == 'A') {
                            echo 'Ativado';
                        } else {
                            echo 'Desativado';
                        }
                        ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#vermaisser<?php echo $idservico ?>">Ver mais</button>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#altadmser<?php echo $idservico ?>">Alterar</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delamdser<?php echo $idservico ?>">Excluir</button>
                        </div>
                    </td>
                    <td></td>
                    <!-- Modal Excluir servico -->
                    <div class="modal fade" id="delamdser<?php echo $idservico ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Excluir Serviço</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Você tem certeza que deseja excluir o serviço "<?php echo $tiposervico ?>"?!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="delete.php?idservico=<?php echo $idservico ?>" class="btn btn-danger">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Ver+ servico -->
                    <div class="modal fade" id="vermaisser<?php echo $idservico ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><b>ID:</b> <?php echo $idservico ?></p>
                                    <p><b>SERVIÇO:</b> <?php echo $tiposervico ?></p>
                                    <p><b>STATUS:</b> <?php echo $ativo ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                                  
                    </div>
                    <!-- Modal ALTERAR servico -->
                    <div class="modal fade" id="altadmser<?php echo $idservico ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="update.php" method="post">
                                    <div class="modal-header bg-warning text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Alterar Serviço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="tipaltservi" class="form-label">SERVIÇO:</label>
                                            <input type="text" class="form-control" id="tipaltservi" name="tipaltservi" value="<?php echo $tiposervico; ?>">
                                            <input type="text" class="form-control d-none" id="idseralt" name="idseralt" value="<?php echo $idservico; ?>">
                                        </div>
                                        <label for="senhainput" class="form-label">ATIVO:</label>
                                        <select class="form-select" aria-label="Default select example" id="ativoseralt" name="ativoseralt">
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
            ?>
        </tbody>
    </table>
</div>

<!-- Modal CADASTRAR servico -->
<div class="modal fade" id="cadser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="cadastro.php" method="post">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Serviço</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="servicad" class="form-label">Serviço:</label>
                        <input type="text" class="form-control" id="servicad" name="servicad" placeholder="Informe o nome do Serviço">
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
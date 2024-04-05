<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-white">Dashboard</li>
            <li class="breadcrumb-item text-white" aria-current="page">Cliente</li>
        </ol>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="bg-dark">#</th>
                <th scope="col" class="bg-dark">Nome</th>
                <th scope="col" class="bg-dark">CPF</th>
                <th scope="col" class="bg-dark">Status</th>
                <th scope="col" class="bg-dark">Ação</th>
                <th scope="col" class="bg-dark"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadcli">CADASTRAR</button></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cliente = listar('*', 'cliente');
            foreach ($cliente as $clientes) {
                $idcliente = $clientes->idcliente;
                $nomeC = $clientes->nome;
                $cpf = $clientes->cpf;
                $ativo = $clientes->ativo;

            ?>
                <tr>
                    <th scope="row"><?php echo $idcliente ?></th>
                    <td><?php echo $nomeC ?></td>
                    <td><?php echo $cpf ?></td>
                    <td><?php if ($ativo == 'A') {
                            echo 'Ativado';
                        } else {
                            echo 'Desativado';
                        }
                        ?></td>
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
                                        <label for="senhainput" class="form-label">ATIVO:</label>
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
            ?>
        </tbody>
    </table>
</div>

<!-- Modal CADASTRAR cliente -->
<div class="modal fade" id="cadcli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="cadastro.php" method="post">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomecadcli" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomecadcli" name="nomecadcli" placeholder="Informe o seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="cpfcadcli" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpfcadcli" name="cpfcadcli" placeholder="Informe o seu CPF">
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
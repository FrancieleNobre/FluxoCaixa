<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-white">Dashboard</li>
            <li class="breadcrumb-item text-white" aria-current="page">ADM</li>
        </ol>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="bg-dark">Código</th>
                <th scope="col" class="bg-dark">Nome</th>
                <th scope="col" class="bg-dark">CPF</th>
                <th scope="col" class="bg-dark">Status</th>
                <th scope="col" class="bg-dark">Ação</th>
                <th scope="col" class="bg-dark"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadadm">CADASTRAR</button></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $adm = listar('*', 'adm');
            foreach ($adm as $adms) {
                $id = $adms->idadm;
                $nome = $adms->nome;
                $cpf = $adms->cpf;
                $ativo = $adms->ativo;

            ?>
                <tr>
                    <th scope="row"><?php echo $id ?></th>
                    <td><?php echo $nome ?></td>
                    <td><?php echo $cpf ?></td>
                    <td><?php if ($ativo == 'A') {
                            echo 'Ativado';
                        } else {
                            echo 'Desativado';
                        }
                        ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#vermaisadm<?php echo $id ?>">Ver mais</button>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#altadm<?php echo $id ?>">Alterar</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delamd<?php echo $id ?>">Excluir</button>
                        </div>
                    </td>
                    <td></td>
                    <!-- Modal Excluir Adm -->
                    <div class="modal fade" id="delamd<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Excluir Adm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Você tem certeza que deseja excluir o adm "<?php echo $nome ?>"?!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="delete.php?idadm=<?php echo $id ?>" class="btn btn-danger">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Ver+ Adm -->
                    <div class="modal fade" id="vermaisadm<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><b>ID:</b> <?php echo $id ?></p>
                                    <p><b>NOME:</b> <?php echo $nome ?></p>
                                    <p><b>CPF:</b> <?php echo $cpf ?></p>
                                    <p><b>STATUS:</b> <?php echo $ativo ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                                  
                    </div>
                    <!-- Modal ALTERAR Adm -->
                    <div class="modal fade" id="altadm<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="update.php" method="post">
                                    <div class="modal-header bg-warning text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Alterar Adm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nomeimpadm" class="form-label">Nome:</label>
                                            <input type="text" class="form-control" id="nomeimpadm" name="nomeimpadm" value="<?php echo $nome; ?>">
                                            <input type="text" class="form-control d-none" id="idaltadm" name="idaltadm" value="<?php echo $id; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cpfimpadm" class="form-label">CPF:</label>
                                            <input type="text" class="form-control" id="cpfimpadm" name="cpfimpadm" value="<?php echo $cpf; ?>">
                                        </div>
                                        <label for="senhainput" class="form-label">ATIVO:</label>
                                        <select class="form-select" aria-label="Default select example" id="ativoadmimp" name="ativoadmimp">
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

<!-- Modal CADASTRAR Adm -->
<div class="modal fade" id="cadadm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="cadastro.php" method="post">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Adm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomecadadm" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomecadadm" name="nomecadadm" placeholder="Informe o seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="cpfcadadm" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpfcadadm" name="cpfcadadm" placeholder="Informe o seu CPF">
                    </div>
                    <div class="mb-3">
                        <label for="senhacadadm" class="form-label">SENHA:</label>
                        <input type="password" class="form-control" id="senhacadadm" name="senhacadadm" placeholder="Informe a sua senha">
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
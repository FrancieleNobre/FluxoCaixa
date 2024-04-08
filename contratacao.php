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
                    $idcontrato = $contratos->idcontrato;
                    $nomeC = $contratos->nome;
                    $tiposervico = $contratos->tiposervico;
                    $tipopagamento = $contratos->tipopagamento;
                    $nomeadm = $contratos->nomeadm;
                    $valor = $contratos->valor;
                    $prazoentrega = $contratos->prazoentrega;
                    $valorentrada = $contratos->valorentrada;
                    $parcelas = $contratos->parcelas;

            ?>
                    <tr>
                        <th scope="row"><?php echo $idcontrato ?></th>
                        <td><?php echo $nomeC ?></td>
                        <td><?php echo $tiposervico ?></td>
                        <td><?php echo $tipopagamento ?></td>
                        <td><?php echo $nomeadm ?></td>
                        <td><?php echo $valor ?></td>
                        <td><?php echo $prazoentrega ?></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#vermaiscontrato<?php echo $idcontrato ?>">Ver mais</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delcontrato<?php echo $idcontrato ?>">Excluir</button>
                            </div>
                        </td>
                        <td></td>
                        <!-- Modal Excluir contrato -->
                        <div class="modal fade" id="delcontrato<?php echo $idcontrato ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Contrato</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Você tem certeza que deseja excluir o registro de contrato "<?php echo $idcontrato ?>"?!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?idcontrato=<?php echo $idcontrato ?>" class="btn btn-danger">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ver+ cliente -->
                        <div class="modal fade" id="vermaiscontrato<?php echo $idcontrato ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>ID:</b> <?php echo $idcontrato ?></p>
                                        <p><b>NOME CLIENTE:</b> <?php echo $nomeC ?></p>
                                        <p><b>TIPO DE SERVIÇO:</b> <?php echo $tiposervico ?></p>
                                        <p><b>TIPO DE PAGAMENTO:</b> <?php echo $tipopagamento ?></p>
                                        <p><b>ADMINISTRADOR:</b> <?php echo $nomeadm ?></p>
                                        <p><b>VALOR CONTRATADO:</b> <?php echo $valor ?></p>
                                        <p><b>VALOR DE ENTRADA:</b> <?php echo $valorentrada ?></p>
                                        <p><b>PARCELAS:</b> <?php echo $parcelas ?></p>
                                        <p><b>PRAZO DE ENTREGA:</b> <?php echo $prazoentrega ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Contratar</h5> <!-- Corrigido título -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="selectcliente" class="form-label">Cliente:</label>
                    <select class="form-select" required id="selectcliente" name="selectcliente"> <!-- Adicionado id e name -->
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
                    <label for="selectservico" class="form-label mt-3">Tipo de Serviço:</label>
                    <select class="form-select" required id="selectservico" name="selectservico"> <!-- Adicionado id e name -->
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
                    <label for="selectpag" class="form-label">Tipo de Pagamento:</label>
                    <select class="form-select" id="selectpag" name="selectpag"> <!-- Adicionado id e name -->
                        <option value="1" id="avista">À vista</option>
                        <option value="2" id="aprazo">A Prazo</option>
                    </select>

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
                <input type="hidden" id="administrador" name="administrador" value="1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button> <!-- Removido data-bs-dismiss -->
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const selectpag = document.getElementById('selectpag');
    const divprazo = document.getElementById('divprazo');

    selectpag.addEventListener('change', function() {
        if (selectpag.value == '2') {
            divprazo.style.display = "block";
        } else {
            divprazo.style.display = "none";
        }
    });
</script>
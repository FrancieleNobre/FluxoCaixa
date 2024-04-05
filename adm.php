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
                            <button type="button" class="btn btn-outline-primary">Ver mais</button>
                            <button type="button" class="btn btn-outline-primary">Alterar</button>
                            <button type="button" class="btn btn-outline-primary">Excluir</button>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
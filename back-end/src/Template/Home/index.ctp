<div class="container-fluid">
    <div class="jumbotron">
        <h3 class="display-4">Digite um CEP</h3>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="49000-000" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
            </div>
        </div>
        <hr class="my-4">
        <span class="bd-content-title">Lista de endereços </span>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">CEP</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Complemento</th>
                <th scope="col">Bairro</th>
                <th scope="col">UF</th>
                <th scope="col">Localidade</th>
                <th class="d-flex justify-content-center" scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td width="250px">
                    <?= $this->Html->link('Visualizar', ['action' => 'view', '$id'], ['class' =>'btn btn-outline-success btn-sm']); ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', '$id'], ['class' =>'btn btn-outline-primary btn-sm']); ?>
                    <?= $this->Html->link('Remover', ['action' => 'delete', '$id'], ['class' =>'btn btn-outline-danger btn-sm']); ?>

                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>

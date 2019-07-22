
<div class="container adicionar">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 page-header">
            <h3 class="cor-titulo"><?= __('Cadastro De Usuário') ?></h3>
        </div>
        <div class="col-md-6 col-md-offset-3 table-bordered">
            <br>
            <?= $this->Form->create($user) ?>
            <fieldset>
                <?php
                echo $this->Form->control('first_name', ['label' => 'Nome']);
                echo $this->Form->control('last_name', ['label' => 'Sobrenome']);
                echo $this->Form->control('username', ['label' => 'Username']);
                echo $this->Form->control('email', ['label' => 'Email']);
                echo $this->Form->control('password', ['label' => 'Senha', 'type' => 'password']);
                echo $this->Form->control('confirm_password', ['label' => 'Confirme a Senha', 'type' => 'password']);
                ?>
            </fieldset>

                <?= $this->Form->button(__('Cadastrar'), ['class' => 'btn btn-primary btn-lg btn-margem pull-right']) ?>
                <?= $this->Form->end() ?>
                <?= $this->Html->link('Cancelar',
                    ['controller' => 'users', 'action' => 'login'],
                    ['class' => 'btn btn-danger btn-lg btn-margem pull-right'])
                ?>

        </div>
    </div>
</div>

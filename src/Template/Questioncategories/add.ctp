<div class="container adicionar">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 page-header">
            <h3 class="cor-titulo"><?= __('Adicionar Categoria de Perguntas') ?></h3>
        </div>
        <div class="col-md-6 col-md-offset-3 table-bordered">
            <br>
            <?= $this->Form->create($questioncategory) ?>
            <fieldset>
                <?php
                echo $this->Form->control('description', ['label' => 'Categoria']);
                ?>
            </fieldset>
            <div class="row">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary btn-lg btn-margem pull-right', 'disabled']) ?>
                <?= $this->Form->end() ?>
                <?= $this->Html->link('Cancelar',
                    ['controller' => 'Questioncategories', 'action' => 'index'],
                    ['class' => 'btn btn-danger btn-lg btn-margem pull-right'])
                ?>
            </div>

        </div>
    </div>
</div>
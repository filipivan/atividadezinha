<div class="container adicionar">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 page-header">
            <h3 class="cor-titulo"><?= __('Editar Pergunta') ?></h3>
        </div>
        <div class="col-md-6 col-md-offset-3 table-bordered">
            <br>
            <?= $this->Form->create($question) ?>

            <fieldset>
                <?php
                echo $this->Form->control('description', ['label' => 'Pergunta']);
                echo $this->Form->control('alternative01', ['label' => 'Alternativa 1']);
                echo $this->Form->control('alternative02', ['label' => 'Alternativa 2']);
                echo $this->Form->control('alternative03', ['label' => 'Alternativa 3']);
                echo $this->Form->control('alternative04', ['label' => 'Alternativa 4']);
                echo $this->Form->control('correct', ['label' => 'Alternativa Correta']);
                echo $this->Form->control('difficulty', ['label' => 'Dificuldade', 'options' => ['easy' => 'Fácil', 'medium' => 'Médio', 'hard' => 'Difícil']]);
                echo $this->Form->control('questioncategory_id', ['label' => 'Categoria'], ['options' => $questioncategories]);
                ?>
            </fieldset>
            <div class="row">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary btn-lg btn-margem pull-right']) ?>
                <?= $this->Form->end() ?>
                <?= $this->Html->link('Cancelar',
                    ['controller' => 'questions', 'action' => 'index'],
                    ['class' => 'btn btn-danger btn-lg btn-margem pull-right'])
                ?>
            </div>

        </div>
    </div>
</div>
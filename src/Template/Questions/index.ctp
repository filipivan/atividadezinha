<div class="container">
    <div class="row col-md-12 custyle">
        <div class="page-header titulo-tabela">
            <h3>
                <span class="cor-titulo">Perguntas</span>
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Adicionar Pergunta',
                    ['controller' => 'questions', 'action' => 'add'],
                    ['class' => 'btn btn-primary btn-md pull-right',
                        'escape' => false])
                ?>
            </h3>
        </div>
        <table class="table table-striped custab">
            <thead class="red-thead">
            <tr>
                <th class="texto-thead"><span class="glyphicon glyphicon-resize-vertical"></span><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th>Descrição</th>
                <th class="texto-thead"><span class="glyphicon glyphicon-resize-vertical"></span><?= $this->Paginator->sort('questioncategory_id', 'Categoria') ?></th>
                <th class="text-center">Opções</th>
            </tr>
            </thead>
            <?php foreach ($questions as $question):?>
                <tr>
                    <td><?= $this->Number->format($question->id) ?></td>
                    <td><?= h($question->description) ?></td>
                    <td><?= h($question->questioncategory->description) ?></td>
                    <td class="text-center">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-edit"></span> Editar',
                            ['action' => 'edit', $question->id],
                            ['class' => 'btn btn-default btn-xs',
                                'escape' => false])
                        ?>

                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> Excluir',
                            ['action' => 'delete', $question->id],
                            ['class' => 'btn btn-danger btn-xs',
                                'escape' => false,
                                'confirm' => __('Você deseja excluir # {0}?', $question->id)])
                        ?>


                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
            <?= $this->Paginator->next(__('proxima') . ' >') ?>
            <?= $this->Paginator->last(__('Ultima') . ' >>') ?>
        </ul>
    </div>

</div>
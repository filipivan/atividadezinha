<div class="container">
    <div class="row col-md-12 custyle">
        <div class="page-header titulo-tabela">
            <h3>
                <span class="cor-titulo">Categorias de Perguntas</span>
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Adicionar Categoria de Perguntas',
                    ['controller' => 'Questioncategories', 'action' => 'add'],
                    ['class' => 'btn btn-primary btn-md pull-right',
                     'escape' => false, 'disabled'])
                ?>
            </h3>
        </div>
        <table class="table table-striped custab">
            <thead class="red-thead">
            <tr>
                <th class="texto-thead">ID</th>
                <th class="col-md-8 text-center">Descrição</th>
                <th class="text-center">Opções</th>
            </tr>
            </thead>
            <?php foreach ($questioncategories as $category):?>
                <tr>
                    <td><?= $this->Number->format($category->id) ?></td>
                    <td class="col-md-8 text-center"><?= h($category->description) ?></td>
                    <td class="text-center">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-edit"></span> Editar',
                            ['action' => 'edit', $category->id],
                            ['class' => 'btn btn-default btn-xs',
                                'escape' => false])
                        ?>

                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> Excluir',
                            ['action' => 'delete', $category->id],
                            ['class' => 'btn btn-danger btn-xs',
                                'disabled',
                                'escape' => false,
                                'confirm' => __('Você deseja excluir # {0}?', $category->id)
                            ])
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
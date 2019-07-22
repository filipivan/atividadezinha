<div class="container">
    <div class="row col-md-12 custyle">
        <div class="page-header titulo-tabela">
            <h3>
                <span class="cor-titulo">Usuários</span>
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Adicionar Usuário',
                    ['controller' => 'users', 'action' => 'add'],
                    ['class' => 'btn btn-primary btn-md pull-right',
                    'escape' => false])
                ?>
            </h3>
        </div>
        <table class="table table-striped custab">
            <thead class="red-thead">
            <tr>
                <th class="texto-thead">ID</th>
                <th>Nome</th>
                <th><span class="glyphicon glyphicon-resize-vertical"></span><?= $this->Paginator->sort('last_name', 'Sobrenome')?></th>
                <th><span class="glyphicon glyphicon-resize-vertical"></span><?= $this->Paginator->sort('username', 'Username')?></th>
                <th>Email</th>
                <th class="text-center">Opções</th>
            </tr>
            </thead>
            <?php foreach ($users as $user):?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td class="text-center">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span> Editar'),
                        ['action' => 'edit', $user->id],
                        ['class' => 'btn btn-default btn-xs',
                        'escape' => false])
                    ?>

                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span> Excluir'),
                        ['action' => 'delete', $user->id],
                        ['class' => 'btn btn-danger btn-xs',
                            'escape' => false,
                            'confirm' => __('Você deseja excluir  {0}?', ($user->first_name.' '.$user->last_name))
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
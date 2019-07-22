<script>
    window.location.hash="#";
    window.location.hash="#";
    window.onhashchange=function(){
        window.location.hash="#";
    }
</script>

<div class="container">
    <div class="row col-md-12 custyle">
        <div class="page-header titulo-tabela">
            <h3>
                <span class="cor-titulo">Bem Vindo <?php echo $current_user['first_name'].' '.$current_user['last_name'] ?></span>
            </h3>

        </div>

        <table class="table table-striped custab">
            <legend><span class="cor-titulo">Rank</span></legend>
            <thead class="red-thead">
            <tr>
                <th>Nome do Jogador</th>
                <th>Username</th>
                <th><span class="glyphicon glyphicon-resize-vertical"></span><?= $this->Paginator->sort('points', 'Pontos')?></th>
            </tr>
            </thead>
            <?php foreach ($users as $user):?>
                <tr>
                    <td><?= h($user->first_name)?> <?= h($user->last_name) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->points) ?></td>
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
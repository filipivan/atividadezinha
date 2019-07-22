<?php
    if ($this->request->session()->read('idPerguntas') === null){
        $this->redirect(['controller' => 'users', 'action' => 'home']);
    }
?>

<?= $this->Html->css('descricaopergunta.css') ?>
<script>
    window.location.hash="#";
    window.location.hash="#";
    window.onhashchange=function(){
        window.location.hash="#";
    }
</script>
<div class="container titulo">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 ">
            <h3 class="cor-titulo">Pergunta <?= $this->request->session()->read('posicao') + 1; ?> | Pontuação Atual: <?= $this->request->session()->read('pontos'); ?></h3>
        </div>
        <div class="col-md-6 col-md-offset-3 table-bordered">

            <div class="panel panel-default panel-table">
                <div class="panel-body">
                    <div class="td"><?= $question->description ?></div>
                </div>
            </div>

            <?= $this->Form->create() ?>
            <fieldset>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?= $this->Html->link(__($question->alternative01),
                            ['action' => 'verificaresposta', $question->id, $question->alternative01],
                            ['class' => 'btn btn-default btn-lg', 'confirm' => __('Está Certo Disso?')]
                        );
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?= $this->Html->link(__($question->alternative02),
                            ['action' => 'verificaresposta', $question->id, $question->alternative02],
                            ['class' => 'btn btn-default btn-lg', 'confirm' => __('Está Certo Disso?')]
                        );
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?= $this->Html->link(__($question->alternative03),
                            ['action' => 'verificaresposta', $question->id, $question->alternative03],
                            ['class' => 'btn btn-default btn-lg', 'confirm' => __('Está Certo Disso?')]
                        );
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?= $this->Html->link(__($question->alternative04),
                            ['action' => 'verificaresposta', $question->id, $question->alternative04],
                            ['class' => 'btn btn-default btn-lg', 'confirm' => __('Está Certo Disso?')]
                        );
                        ?>
                    </div>
                </div>
                <br><br>
            </fieldset>
            <?= $this->Form->end() ?>
            <?= $this->Html->link('Parar',
                ['action' => 'parar'],
                ['class' => 'btn btn-danger btn-lg btn-margem pull-right', 'confirm' => __('Deseja Desistir?')])
            ?>
        </div>
    </div>
</div>

<?= $this->Html->css('checkbox.css') ?>

<div class="container adicionar">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 page-header">
            <h3 class="cor-titulo"><?= __('Selecione As CategoriaS de Perguntas') ?></h3>
        </div>
        <div class="col-md-6 col-md-offset-3 table-bordered">
            <br>
            <?= $this->Form->create() ?>
            <fieldset>
                <div class="funkyradio">
                    <div class="funkyradio-danger">
                        <input type="checkbox" name="ck01" id="ck01" value="1"/>
                        <label for="ck01">Ciências</label>
                    </div>
                    <div class="funkyradio-danger">
                        <input type="checkbox" name="ck02" id="ck02" value="2"/>
                        <label for="ck02">Geografia</label>
                    </div>
                    <div class="funkyradio-danger">
                        <input type="checkbox" name="ck03" id="ck03" value="3"/>
                        <label for="ck03">História</label>
                    </div>
                    <div class="funkyradio-danger">
                        <input type="checkbox" name="ck04" id="ck04" value="4" disabled/>
                        <label for="ck04">Inglês</label>
                    </div>
                    <div class="funkyradio-danger">
                        <input type="checkbox" name="ck05" id="ck05" value="5" disabled/>
                        <label for="ck05">Matemática</label>
                    </div>
                    <div class="funkyradio-danger">
                        <input type="checkbox" name="ck06" id="ck06" value="6"/>
                        <label for="ck06">Português</label>
                    </div>
                    <div class="funkyradio-danger">
                        <input type="checkbox" name="ck07" id="ck07" value="7"/>
                        <label for="ck07">Variedades</label>
                    </div>
                </div>
            </fieldset>
            <div class="row">
                <?= $this->Form->button(__('Iniciar Partida'), ['class' => 'btn btn-primary btn-lg btn-margem pull-right']) ?>
                <?= $this->Form->end() ?>
                <?= $this->Html->link('Cancelar',
                    ['controller' => 'users', 'action' => 'home'],
                    ['class' => 'btn btn-danger btn-lg btn-margem pull-right'])
                ?>
            </div>

        </div>
    </div>
</div>
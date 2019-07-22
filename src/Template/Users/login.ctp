<!-- Carregando CSS alternativo para login -->
<?= $this->Html->css('login.css') ?>
<?= $this->Html->script('TweenLite.js') ?>
<body>
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row-fluid user-row">
                        <!-- LOGO -->
                        <?= $this->Html->image('titulo.png', ['class' => 'img-responsive', 'title' => 'Logo Atividadezinha']) ?>

                    </div>
                </div>
                <div class="panel-body">
                    <!-- Iniciado Form -->

                    <?= $this->Flash->render('auth') ?>
                    <?= $this->Form->create() ?>

                        <fieldset>
                            <label class="panel-login">
                                <div class="login_result"></div>
                            </label>
                            <div class="form-group">
                                <?= $this->Form->input('username', ['class' => 'form-control input-lg', 'placeholder' => 'Username', 'label' => false, 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('password', ['class' => 'form-control input-lg', 'placeholder' => 'Senha', 'label' => false, 'required']) ?>
                            </div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <?= $this->Form->button('Entrar', ['class' => 'btn btn-lg btn-success btn-block']); ?>
                                    <?= $this->Html->link('Registrar-se', ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                                </div>

                            </div>

                        </fieldset>
                    <!-- Fechando Formulario -->
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</div>
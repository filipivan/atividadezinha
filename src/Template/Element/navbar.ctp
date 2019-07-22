<?= $this->Html->css('navbar.css') ?>
<nav class="navbar navbar-findcond">
    <div class="container">

        <div class="navbar-header">
            <?php if (isset($current_user)): ?>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php endif; ?>
            <?= $this->Html->image('titulo.png', ['class' => 'tamanho-logo', 'title' => 'Logo Atividadezinha', 'url' => ['controller' => 'users', 'action' => 'login']]) ?>

        </div>

        <?php if (isset($current_user)): ?>
        <div class="collapse navbar-collapse" id="navbar">

            <ul class="nav navbar-nav navbar-right">



                    <li class="active">
                        <?= $this->Html->link('Nova Partida', ['controller' => 'questioncategories', 'action' => 'selectcategories']); ?>
                    </li>


                    <!-- MENU DE ADMINISTRADOR -->
                    <?php if ($current_user['role'] == 'admin'): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administração <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <?= $this->Html->link('Usuários', ['controller' => 'users', 'action' => 'index']); ?>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <?= $this->Html->link('Perguntas', ['controller' => 'questions', 'action' => 'index']); ?>
                                </li>
                            </ul>
                        </li>
                    <?php  endif; ?>

                    <!-- MENU DE Usuario -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $current_user['first_name'].' '.$current_user['last_name'] ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?= $this->Html->link('Editar Informações', ['controller' => 'users', 'action' => 'editforuser', $current_user['id']]); ?>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <?= $this->Html->link('Sair', ['controller' => 'Users', 'action' => 'logout']) ?>
                            </li>
                        </ul>
                    </li>




            </ul>
        </div>
        <?php endif; ?>
    </div>
</nav>
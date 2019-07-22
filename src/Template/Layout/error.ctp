<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Atividadezinha - 404
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.css', 'estilo.css']) ?>
    <?= $this->Html->script(['jquery-3.2.1.js', 'bootstrap.js']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!-- NAVBAR -->
    <?= $this->element('navbar'); ?>

    <?= $this->Flash->render() ?>


    <div class="container">
        <div class="container">
            <div class="jumbotron">
                <div>
                    <h1 class="text-center">404 Not Found<p> </p><p><small class="text-center"> A Página Não Existe :/</small></p></h1>
                </div>
                <div class="text-center ">
                    <?= $this->Html->image('404.jpg', ['class' => 'img-responsive img-error', 'title' => 'ERRO 404']) ?>
                </div>
                <br>
                <div>
                    <p class="text-center">Clique em voltar ou Clique nesse botão.</p>
                </div>
                <div>
                    <p class="text-center">
                        <?= $this->Html->link(__('<span class="glyphicon glyphicon-home"></span> Início'),
                            ['controller' => 'users','action' => 'login'],
                            ['class' => 'btn btn-primary btn-lg',
                                'escape' => false,
                            ])
                        ?>
                    </p>

                </div>
            </div>
        </div>



    </div>
</body>
</html>

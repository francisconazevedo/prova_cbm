<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($title) ?></title>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('font-awesome.min') ?>
    <?= $this->Html->script('jquery-3.2.1.slim.min') ?>
    <?= $this->Html->script('bootstrap.min', ['block' => 'scriptBottom']) ?>
    <?= $this->Html->script('popper.min', ['block' => 'scriptBottom']) ?>

    <!-- Fetch meta, css and script  -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <!-- Page Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Buscar CEP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            </ul>
        </div>
    </nav>
    <br>

    <div class="container">
        <?= $this->Flash->render() ?>
    </div>

    <?= $this->fetch('content') ?>
    <br><br><br>
    <!-- Page Footer -->
    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
    </nav>
<?= $this->fetch('scriptBottom') ?>
</body>
</html>

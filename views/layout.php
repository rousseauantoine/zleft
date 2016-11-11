<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<base href="<?= $root ?>/">
        <link rel="stylesheet" href="styles/global.css" />
		<?php foreach ($css as $c){ ?>
			<link rel="stylesheet" href="styles/<?= $c ?>" />
		<?php } ?>
        <?php
            if(!is_null($viewTitle)){
        ?>
            <title><?= $viewTitle ?></title>
        <?php
            }
        ?>
        <?php foreach ($meta as $m){ ?>
            <meta name="<?= $m['name'] ?>" content="<?= $m['content'] ?>" />
        <?php } ?>
    </head>
    <body>
        <div class="wrapper">
            <header class="top">
                <?php if($this->isUserConnected()){ ?>
                    <a href="<?= Configuration::get('root'); ?>/admin/logout">Log out</a>
                <?php }else{ ?>
                    <a href="<?= Configuration::get('root'); ?>/admin/index">Log in</a>
                <?php } ?>
            </header>
            <div>
                <header>
                    <a href="<?= Configuration::get('root'); ?>">
                <h1>My blog</h1>
            </a>
                </header>
                <div>
                    <?= $content ?>
                </div>
            </div>
            <script src="<?= Configuration::get('jQuery'); ?>"></script>
            <?php foreach ($js as $j){ ?>
                <script src="scripts/<?= $j ?>"></script>
            <?php } ?>
        </div>
    </body>
</html>

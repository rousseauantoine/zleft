<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<base href="<?= $root ?>">
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
        <div>
            <header>
                <a href="index.php">
			<h1>My blog</h1>
		</a>
            </header>
            <div>
                <?= $content ?>
            </div>
        </div>
		<script src="<?php echo Configuration::get('jQuery'); ?>"></script>
		<?php foreach ($js as $j){ ?>
			<script src="scripts/<?= $j ?>"></script>
		<?php } ?>
    </body>
</html>

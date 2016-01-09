<?php
    header('Status: 404 Not Found');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?= $root ?>">
    <link rel="stylesheet" href="styles/global.css" />
    <title>404 error - Page not found</title>
</head>
<body>
    <?php
        if(isset($didYouMean)){
    ?>
        <header>
            <a href="index.php">
                <h1>My blog</h1>
            </a>
        </header>
        <div>
            <h2>Error page :(</h2>
            <?php
                if(count($didYouMean)){
            ?>
                    <p>Did you mean ?</p>
                    <?php
                        foreach($didYouMean as $d){
                    ?>
                            <a href="index.php/entry/<?= $d['ent_id'] ?>">
                                <?= $d['ent_title'] ?>
                            </a><br><hr/><br>
                    <?php
                        }
                    ?>
            <?php
                }else{
            ?>
                <p>We didn't find any related results</p>
            <?php
                }
            ?>
        </div>
    <?php
        }else{
    ?>
        <p>Error - <?= $message ?></p>
    <?php
        }
    ?>
    <script src="<?php echo Configuration::get('jQuery'); ?>"></script>
</body>
</html>

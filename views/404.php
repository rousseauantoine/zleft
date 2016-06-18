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

    <p>Error
        <?php
            if($message != ''){
                echo ' - ' . $message;
            }
        ?>
    </p>

</body>
</html>

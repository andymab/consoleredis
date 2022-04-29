<?php
require_once __DIR__ . '/vendor/autoload.php';
$single_server = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'database' => 15,
);
$client = new \Predis\Client($single_server);
$keys  = $client->keys("*");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php foreach ($keys as $key) : ?>
            <li><?= $key ?>: <?= $client->get($key) ?> <a href="#" class="remove">delete</a></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
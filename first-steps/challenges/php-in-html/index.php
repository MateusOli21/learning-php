<?php

$accountOne = [
    'holder' => "Mateus",
    'balance' => 1500
];

$accountTwo = [
    'holder' => "João",
    'balance' => 1800
];


$accounts = [$accountOne, $accountTwo];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Contas</h1>

    <dl>
        <?php

        foreach($accounts as $account) { ?>

        <dt>
            <h3>Conta</h3>
        </dt>
        <dd>Titular: <?= $account['holder'] ?> </dd>
        <dd>Saldo: <?= $account['balance'] ?></dd>
        <?php } ?>

    </dl>
</body>
</html>
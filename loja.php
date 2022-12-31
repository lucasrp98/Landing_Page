<?php
require_once('app/entities/Ladingpage.php');
$lading = new Dados();
$ladings = $lading->listar();
?>

<html lang="pt-br">

<head>
    <title>Loja de E-commerce</title>
    <meta charset="UTF-8">
    <meta name="author" content="Lucas Ribeiro">
    <meta name="description" content="Site que tem como objetivo a exibição de pulseiras em uma loja online.">
    <meta name="keywords" content="loja, pulseira, corrente">
    <link rel="stylesheet" href="assets/css/landingpage.css">
</head>

<?php foreach ($ladings as $lading) { ?>
    <tr>
        <td><?= $lading->getId(); ?></td>
        <td><?= $lading->getNome(); ?></td>
        <td><?= $lading->getEmail(); ?></td>
        <td><?= $lading->getTelefone(); ?></td>
        <td><?= $lading->getData(); ?></td>
        <td><?= $lading->getHora(); ?></td>
        <td><?= $lading->getMensagem(); ?></td>
    </tr>
<?php } ?>
<?php

require_once('layout/menu.php');
?>

</section>
</body>

</html>
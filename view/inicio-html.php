<?php
/* @var string $title */
/* @var string $typeMessage */
/* @var string $message */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Learning Fast</title>
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-2">
    <a class="navbar-brand" href="/list-courses">Home</a>
    <?php if (isset($_SESSION['logado'])) : ?>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/logout">Logout</span></a>
        </li>
    </ul>
    <?php endif; ?>
</nav>

<div class="container">

    <div class="jumbotron bg-info text-white">
        <h1><?= $title; ?></h1>
    </div>

    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?= $_SESSION['type_message']; ?>">
            <?= $_SESSION['message']; ?>
        </div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['type_message']);
    endif;
    ?>
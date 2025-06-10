<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Insects bug tracker' ?></title>
    <link rel="stylesheet" href="/assets/header.css">
    <link rel="stylesheet" href="/assets/style.css">
    <?php if (!empty($styles)): ?>
        <?php foreach ($styles as $style): ?>
            <link rel="stylesheet" href="<?= htmlspecialchars($style) ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <header>
        <div class="logo">
            <img src="/assets/img/logo.png" alt="Insects logo">
        </div>

        <div class="menu">
            <ul>
                <li><a href="/">Home</a></li>

            </ul>
        </div>
    </header>

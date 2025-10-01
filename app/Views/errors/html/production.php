<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">

    <title><?= lang('Errors.whoops') ?></title>

    <style>
        <?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
    </style>
</head>

<body>

    <div class="container text-center">

        <h1 class="headline"><?= lang('Errors.whoops') ?></h1>
        <p class="lead">Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.</p>
        <!-- <p class="lead">?= lang('Errors.weHitASnag') ?></p> -->
        <a href="javascript:history.back()">← Kembali</a>
    </div>

</body>

</html>
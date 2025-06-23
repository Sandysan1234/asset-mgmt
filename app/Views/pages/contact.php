<?= $this->extend('layouts/template');?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>ini halaman contact</h1>
            <?php foreach($alamat as $al): ?>
                <ul>
                    <li><?= $al['tipe'];?></li>
                    <li><?= $al['alamat'];?></li>
                    <li><?= $al['kota'];?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection();?>
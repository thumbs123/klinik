<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

/** @var array $pasien */

$this->title = 'Daftar Pasien';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Daftar Pasien</h3>
    </div>

    <div class="body-content">
        <div class="row mb-3">
            <div class="col">
                <?= Html::a('Create Pasien', ['pasien/create'], ['class' => 'btn btn-success']) ?>
            </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Wilayah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pasien) > 0): ?>
                    <?php $i = 1; foreach ($pasien as $p): ?>
                        <tr class="table-active">
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['tanggal_lahir'] ?></td>
                            <td><?= $p['alamat'] ?></td>
                            <td><?= $p['no_telp'] ?></td>
                            <td><?= $p->wilayah->nama ?></td>
                            <td>
                                <?= Html::a('Edit', ['update', 'id' => $p->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $p->id], [
                                    'class' => 'btn btn-danger btn-sm',
                                    'data-confirm' => 'Are you sure you want to delete this item?',
                                    'data-method' => 'post',
                                ]) ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No Records Found!</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

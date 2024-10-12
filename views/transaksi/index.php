<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

/** @var array $transaksi */

$this->title = 'Daftar Transaksi';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Daftar Transaksi</h3>
    </div>

    <div class="body-content">
        <div class="row mb-3">
            <div class="col">
                <?= Html::a('Create Transaksi', ['transaksi/create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($transaksi) > 0): ?>
                    <?php $i = 1; foreach ($transaksi as $t): ?>
                        <tr class="table-active">
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $t->pasien->nama ?></td>
                            <td><?= $t->obat->nama ?></td>
                            <td><?= $t->jumlah ?></td>
                            <td><?= number_format($t->total, 2) ?></td>
                            <td><?= $t->status ?></td>
                            <td><?= $t->tanggal ?></td>
                            <td>
                                <?= Html::a('Edit', ['update', 'id' => $t->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $t->id], [
                                    'class' => 'btn btn-danger btn-sm',
                                    'data-confirm' => 'Are you sure you want to delete this item?',
                                    'data-method' => 'post',
                                ]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No Records Found!</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

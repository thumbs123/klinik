<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

/** @var array $tindakan */

$this->title = 'Daftar Tindakan';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Daftar Tindakan</h3>
    </div>

    <div class="body-content">
        <div class="row mb-3">
            <div class="col">
                <?= Html::a('Create Tindakan', ['tindakan/create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($tindakan) > 0): ?>
                    <?php $i = 1; foreach ($tindakan as $p): ?>
                        <tr class="table-active">
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= Html::encode($p['nama']) ?></td>
                            <td><?= !empty($p['deskripsi']) ? Html::encode($p['deskripsi']) : '-' ?></td>
                            <td><?= number_format($p['biaya'], 2) ?></td> 
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
                        <td colspan="4" class="text-center">No Records Found!</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

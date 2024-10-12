<?php

/** @var yii\web\View $this */
/** @var int $jumlahPasien */
/** @var int $jumlahObat */
/** @var int $jumlahTindakan */
/** @var int $jumlahTransaksi */

$this->title = 'Laporan Klinik';
?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-3 mb-3">
        <h3 class="display-5">Laporan Klinik</h3>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-6">
                <canvas id="clinicReportChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('clinicReportChart').getContext('2d');
    var clinicReportChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pasien', 'Obat', 'Tindakan', 'Transaksi'],
            datasets: [{
                label: 'Jumlah',
                data: [<?= $jumlahPasien ?>, <?= $jumlahObat ?>, <?= $jumlahTindakan ?>, <?= $jumlahTransaksi ?>],
                backgroundColor: [
                    '#FF6384',  // Merah muda untuk Pasien
                    '#36A2EB',  // Biru untuk Obat
                    '#FFCE56',  // Kuning untuk Tindakan
                    '#4BC0C0'   // Hijau untuk Transaksi
                ],
                borderColor: [
                    '#FF6384',  // Merah muda untuk Pasien
                    '#36A2EB',  // Biru untuk Obat
                    '#FFCE56',  // Kuning untuk Tindakan
                    '#4BC0C0'   // Hijau untuk Transaksi
                ],
                borderWidth: 1
            }]
        },
    });
</script>

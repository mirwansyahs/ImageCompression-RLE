<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <center>
        <h2 class="h2 mb-4 bg-primary text-white">SELAMAT DATANG</h2>
    </center>

    <!-- Content Row -->

    <!-- <div class="row"> -->

    <!-- Data Kecelakaan Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Data Kecelakaan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <a href="data">
                                <p class="card-text">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                            </a>
                        </div>
                        <div class=" col-auto">
                            <i class="fas fa-inbox fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- Data User Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Data User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <a href="data/user">
                                <p class="card-text">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-secondary">KETERANGAN :<br>Sumbu X = Tanggal
                        Kecelakaan<br>Sumbu Y = Jumlah Korban Kecelakaaan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body container-fluid">
                    <div class="chart-area">
                        <?php
                        $this->db->select('tanggal,korban');
                        $datakecelakaan = $this->db->select('datakecelakaan.*, day(datakecelakaan.tanggal) as tanggal')->get("datakecelakaan")->result();
                        foreach ($datakecelakaan as $dk => $d) {
                            $arr[] = ['label' => $d->tanggal, 'y' => $d->korban];
                        }
                        ?>
                        <script>
                        window.onload = function() {

                            var chart = new CanvasJS.Chart("chartContainer", {
                                animationEnabled: true,
                                theme: "light2",
                                data: [{
                                    label: "X = Jumlah Korban",
                                    type: "line",
                                    indexLabelFontSize: 16,
                                    dataPoints: <?= json_encode($arr, JSON_NUMERIC_CHECK); ?>
                                }]
                            });
                            chart.render();

                        }
                        </script>
                        <div id="chartContainer" style="width: 100%; height: 100%;"></div>
                        <script src="<?= base_url('assets/'); ?>canvasjs/js/canvasjs.min.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
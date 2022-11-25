<p></p>
<html>

<head>
    <style>
    #table {
        font-family: Trebuchet MS;
        border-collapse: collapse;
        width: 100%;

    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;

    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #b5b5b5;
        color: black;
    }
    </style>
</head>

<body onload="window.print()">
    <img src="<?= base_url('assets/img/login/capture.png') ?>" width="100%">
    <div style="text-align:center">
        <h3>Laporan Data Kecelakaan</h3>
    </div><br><br>
    <table id="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th>Nama Pendata</th>
                <!-- <th>Kode</th> -->
                <th>Jenis Kecelakaan</th>
                <th>Tanggal</th>
                <th>Korban</th>
                <th>Detail Korban</th>
                <th>Nama Korban</th>
                <th>Nama Saksi</th>
                <th>Detail Kecelakaan</th>
                <th>Alamat</th>
                <th>Bukti 1</th>
                <th>Bukti 2</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php
        foreach ($datakecelakaan as $dk) : 
        ?>
            <tr align="center">
                <td><?= $i; ?></td>
                <td><?= $dk['namapendata']; ?></td>
                <!-- <td><?= $dk['kode']; ?></td> -->
                <td><?= $dk['jeniskecelakaan']; ?></td>
                <td><?= $dk['tanggal']; ?></td>
                <td><?= $dk['korban']; ?></td>
                <td><?= $dk['ket_korban']; ?></td>
                <td><?= $dk['nama']; ?></td>
                <td><?= $dk['namasaksi']; ?></td>
                <td><?= $dk['detail']; ?></td>
                <td><?= $dk['alamat']; ?></td>
                <td><img src="<?= base_url('/') . $dk['bukti1']; ?>" width="100px"></td>
                <td><img src="<?= base_url('/') . $dk['bukti2']; ?>" width="100px"></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <br><br><br>
    <h4 style="text-align:right">Kuningan, <?php echo date("d M Y"); ?><br>
        Admin Bagian Laka<br><br><br><br><br>
        Fatih</h4>
</body>

</html>
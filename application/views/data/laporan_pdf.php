<html>

<head>
    <style>
    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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
        background-color: #4CAF50;
        color: white;
    }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Laporan Data Kecelakaan</h3>
    </div>
    <table id="table">
        <tr>
            <th>Nama Pendata</th>
            <th>Kode</th>
            <th>Jenis Kecelakaan</th>
            <th>Tanggal</th>
            <th>Korban</th>
            <th>Detail Korban</th>
            <th>Nama Korban</th>
            <th>Nama Saksi</th>
            <th>Detail Kecelakaan</th>
            <th>Alamat</th>
            <th>Barang Bukti 1</th>
            <th>Barang Bukti 2</th>
            <th>Barang Bukti 3</th>
        </tr>
        <?php
        foreach ($datakecelakaan as $dk) : 
        ?>
        <tr>

            <td><?= $dk['namapendata']; ?></td>
            <td><?= $dk['kode']; ?></td>
            <td><?= $dk['jeniskecelakaan']; ?></td>
            <td><?= $dk['tanggal']; ?></td>
            <td><?= $dk['korban']; ?></td>
            <td><?= $dk['ket_korban']; ?></td>
            <td><?= $dk['nama']; ?></td>
            <td><?= $dk['namasaksi']; ?></td>
            <td><?= $dk['detail']; ?></td>
            <td><?= $dk['alamat']; ?></td>
            <td><img src="<?= base_url('assets/img/datakecelakaan/') . $dk['bukti1']; ?>" class="card-img">
            </td>
            <td><img src="<?= base_url('assets/img/datakecelakaan/') . $dk['bukti2']; ?>" class="card-img">
            </td>
            <td><img src="<?= base_url('assets/img/datakecelakaan/') . $dk['bukti3']; ?>" class="card-img">
            </td>
        </tr>
        <?php
        endforeach
        ?>
    </table>

</body>

</html>
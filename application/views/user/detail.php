<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Kecelakaan
                </div>
                <div class="card-body">
                    <!-- <p class="card-text"><?= $detail['kode'] ?></p> -->
                    <p class="card-text"><?= $detail['jeniskecelakaan'] ?></p>
                    <p class="card-text"><?= $detail['tanggal'] ?></p>
                    <p class="card-text"><?= $detail['korban'] ?></p>
                    <p class="card-text"><?= $detail['ket_korban'] ?></p>
                    <p class="card-text"><?= $detail['nama'] ?></p>
                    <p class="card-text"><?= $detail['namasaksi'] ?></p>
                    <p class="card-text"><?= $detail['detail'] ?></p>
                    <p class="card-text"><?= $detail['alamat'] ?></p>
                    <p class=" card-text"><img src="<?= base_url('/') . $detail['bukti1']; ?>" class="card-img"></p>
                    <p class="card-text">ukuran sebelum kompresi :
                        <?= $bukti1['original_size_r']+$bukti1['original_size_g']+$bukti1['original_size_b']  ?></p>
                    <p class="card-text">ukuran setelah kompresi :
                        <?= $bukti1['compressed_size_r']+$bukti1['compressed_size_g']+$bukti1['compressed_size_b'] ?>
                    </p>
                    <p class=" card-text"><img src="<?= base_url('/') . $detail['bukti2']; ?>" class="card-img"></p>
                    <p class="card-text">ukuran sebelum kompresi :
                        <?= $bukti2['original_size_r']+$bukti2['original_size_g'] +$bukti2['original_size_b'] ?></p>
                    <p class="card-text">ukuran setelah kompresi :
                        <?= $bukti2['compressed_size_r']+$bukti2['compressed_size_g']+$bukti2['compressed_size_b'] ?>
                    </p>
                    <!-- <p class="card-text"><img src="<?= base_url('/') . $detail['bukti3']; ?>"
                            class="card-img"></p> -->
                    <!-- <p class="card-text"><img src="<?= base_url('/') . $detail['bukti4']; ?>"
                            class="card-img"></p> -->
                    <a href="<?= base_url(); ?>user/tambahdatakecelakaan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Form Edit Data Kecelakaan
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('data/edit/' . $id); ?>
                        <div class="form-group">
                            <label for="namapendata">Nama Pendata</label>
                            <input type="text" name="namapendata" class="form-control" id="namapendata"
                                value="<?= $datakecelakaan['namapendata'] ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('namapendata'); ?></small>
                        </div>
                        <!-- <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode"
                                value="<?= $datakecelakaan['kode'] ?>">
                            <small class="form-text text-danger"><?= form_error('kode'); ?></small>
                        </div> -->
                        <div class="form-group">
                            <label for="jeniskecelakaan">Jenis Kecelakaan</label>
                            <select class="form-control" name="jeniskecelakaan" class="form-control"
                                id="jeniskecelakaan" value="<?= $datakecelakaan['jeniskecelakaan'] ?>">
                                <option value="Tunggal">Tunggal</option>
                                <option value="Beruntun">Beruntun</option>
                            </select>
                            <small class="form-text text-danger"><?= form_error('jeniskecelakaan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal"
                                value="<?= $datakecelakaan['tanggal'] ?>">
                            <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="korban">Korban</label>
                            <input type="text" name="korban" class="form-control" id="korban"
                                value="<?= $datakecelakaan['korban'] ?>">
                            <small class="form-text text-danger"><?= form_error('korban'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="ket_korban">Keterangan Korban</label>
                            <input type="text" name="ket_korban" class="form-control" id="ket_korban"
                                value="<?= $datakecelakaan['ket_korban'] ?>">
                            <small class="form-text text-danger"><?= form_error('ket_korban'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="<?= $datakecelakaan['nama'] ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="namasaksi">Nama Saksi</label>
                            <input type="text" name="namasaksi" class="form-control" id="namasaksi"
                                value="<?= $datakecelakaan['namasaksi'] ?>">
                            <small class="form-text text-danger"><?= form_error('namasaksi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail</label>
                            <input type="text" name="detail" class="form-control" id="detail"
                                value="<?= $datakecelakaan['detail'] ?>">
                            <small class="form-text text-danger"><?= form_error('detail'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat"
                                value="<?= $datakecelakaan['alamat'] ?>">
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="bukti1">Bukti 1</label>
                                </div>
                                <div class="col-sm-3">
                                    <img src="<?= base_url('/') . $datakecelakaan['bukti1']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti1" name="bukti1">
                                        <label class="custom-file-label" for="bukti1">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="bukti2">Bukti 2</label>
                                </div>
                                <div class="col-sm-3">
                                    <img src="<?= base_url('/') . $datakecelakaan['bukti2']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti2" name="bukti2">
                                        <label class="custom-file-label" for="bukti2">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="bukti3">Bukti 3</label>
                                </div>
                                <div class="col-sm-3">
                                    <img src="<?= base_url('/') . $datakecelakaan['bukti3']; ?>"
                                        class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti3" name="bukti3">
                                        <label class="custom-file-label" for="bukti3">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="bukti4">Bukti 4</label>
                                </div>
                                <div class="col-sm-3">
                                    <img src="<?= base_url('/') . $datakecelakaan['bukti4']; ?>"
                                        class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti4" name="bukti4">
                                        <label class="custom-file-label" for="bukti4">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Edit
                            Data</button>
                        <input type="button" value="Kembali" class="btn btn-warning float-right mx-2"
                            onclick="history.back();"></input>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
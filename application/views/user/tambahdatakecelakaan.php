<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newdatakecelakaan"><i
            class="fas fa-plus"></i> Add New
        Data Kecelakaan</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kecelakaan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">Kode</th> -->
                            <th scope="col">Jenis Kecelakaan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Korban</th>
                            <th scope="col">Keterangan Korban</th>
                            <th scope="col">Nama Korban</th>
                            <th scope="col">Nama Saksi</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Barang Bukti 1</th>
                            <th scope="col">Barang Bukti 2</th>
                            <!-- <th scope="col">Barang Bukti 3</th> -->
                            <!-- <th scope="col">Barang Bukti 4</th> -->
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datakecelakaan as $dk) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <!-- <td><?= $dk['kode']; ?></td> -->
                            <td><?= $dk['jeniskecelakaan']; ?></td>
                            <td><?= $dk['tanggal']; ?></td>
                            <td><?= $dk['korban']; ?></td>
                            <td><?= $dk['ket_korban']; ?></td>
                            <td><?= $dk['nama']; ?></td>
                            <td><?= $dk['namasaksi']; ?></td>
                            <td><?= $dk['detail']; ?></td>
                            <td><?= $dk['alamat']; ?></td>
                            <td><img src="<?= base_url('/') . $dk['bukti1']; ?>" class="card-img">
                            </td>
                            <td><img src="<?= base_url('/') . $dk['bukti2']; ?>" class="card-img">
                            </td>
                            <!-- <td><img src="<?= base_url('/') . $dk['bukti3']; ?>"
                                    class="card-img">
                            </td> -->
                            <td>
                                <a href="<?= base_url(); ?>user/detail/<?= $dk['id']; ?>" class="badge badge-warning"><i
                                        class="fas fa-info-circle"></i> Detail</a>
                                <a href="<?= base_url(); ?>user/editdata/<?= $dk['id']; ?>"
                                    class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url(); ?>user/hapus/<?= $dk['id']; ?>" class="badge badge-danger"
                                    onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newdatakecelakaan" tabindex="-1" role="dialog" aria-labelledby="SubLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubLabel">Add New Data Kecelakaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('User/tambahdatakecelakaan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Kecelakaan">
                    </div> -->
                    <div class="form-group">
                        <label for="jeniskecelakaan">Jenis Kecelakaan</label>
                        <select class="form-control" id="jeniskecelakaan" name="jeniskecelakaan">
                            <option value="Tunggal">Tunggal</option>
                            <option value="Beruntun">Beruntun</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            placeholder="Tanggal Kecelakaan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="korban" name="korban"
                            placeholder="Berapa Korban Kecelakaan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ket_korban" name="ket_korban"
                            placeholder="Keterangan Korban Kecelakaan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Nama Korban Kecelakaan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="namasaksi" name="namasaksi"
                            placeholder="Nama Saksi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="detail" name="detail"
                            placeholder="Detail Kecelakaan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            placeholder="Alamat Kecelakaan">
                    </div>
                    <div class="form-group">
                        <div class="col">Bukti 1</div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti1" name="bukti1"
                                            accept="image/*">
                                        <label class="custom-file-label" for="bukti1">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <div class="col">Bukti 2</div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti2" name="bukti2"
                                            accept="image/*">
                                        <label class="custom-file-label" for="bukti2">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form">
                        <div class="col">Bukti 3</div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti3" name="bukti3">
                                        <label class="custom-file-label" for="bukti3">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
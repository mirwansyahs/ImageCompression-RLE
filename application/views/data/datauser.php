<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newdatauser"><i class="fas fa-plus"></i>
        Add New Data User</a>

    <!-- <div class="row">
        <div class="col-md-4">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Data User..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

    <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
    <?php endif; ?>

    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data user</h6>
        </div>
        <?php if (empty($user)) : ?>
        <div class="alert alert-danger" role="alert"> Data User Tidak Ditemukan.</div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Email</th>
                            <th scope="col">Image</th>
                            <th scope="col">Password</th>
                            <th scope="col">Role Id</th>
                            <th scope="col">Tanggal Dibuat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datauser as $du) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $du['name']; ?></td>
                            <td><?= $du['email']; ?></td>
                            <td><img src="<?= base_url('assets/img/profile/') . $du['image']; ?>" class="card-img">
                            </td>
                            <td><?= $du['password']; ?></td>
                            <td><?= $du['role']; ?></td>
                            <!-- <td><?= date('d F Y', $du['date_created']); ?></td> -->
                            <td><?= $du['date_created'] ?></td>
                            <td>
                                <a href="<?= base_url(); ?>data/detailuser/<?= $du['id']; ?>"
                                    class="badge badge-warning"><i class="fas fa-info-circle"></i> Detail</a>
                                <a href="<?= base_url(); ?>data/edituser/<?= $du['id']; ?>"
                                    class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url(); ?>data/hapusdatauser/<?= $du['id']; ?>"
                                    class="badge badge-danger" onclick="return confirm('Yakin?');"><i
                                        class="fas fa-trash"></i> Delete</a>
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
<div class="modal fade" id="newdatauser" tabindex="-1" role="dialog" aria-labelledby="SubLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubLabel">Add New Data user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="<?= base_url('Data/tambahuser'); ?>" method="post" enctype="multipart/form-data"> -->
            <?php echo form_open_multipart('data/tambahuser'); ?>

            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama user">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email user">
                </div>
                <div class="form-group">
                    <div class="col">Image</div>
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Password user">
                </div> -->
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1"
                        placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2"
                        placeholder="Repeat Password">
                </div>
                <div class="form-group">
                    <label for="role_id">Role Id</label>
                    <select class="form-control" id="role_id" name="role_id">
                        <option value="1">Admin</option>
                        <option value="2">Anggota Polisi</option>
                    </select>
                </div>
                <input type="hidden" name="date_created" value="<?php echo date("d-m-Y"); ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
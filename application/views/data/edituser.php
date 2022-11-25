<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Form Edit Data User
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('data/edituser/' . $id); ?>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $user['name'] ?>">
                            <small class="form-text text-danger"><?= form_error('name'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email"
                                value="<?= $user['email'] ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="image">Image</label>
                                </div>
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
                                        class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control" id="password"
                                value="<?= $user['password'] ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role Id</label>
                            <select class="form-control" id="role_id" name="role_id" value="<?= $user['role_id'] ?>">
                                <option value="1">Administrator</option>
                                <option value="2">User</option>
                            </select>
                            <small class="form-text text-danger"><?= form_error('role_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="date_created">Tanggal Dibuat</label>
                            <input type="text" name="date_created" class="form-control" id="date_created"
                                value="<?= $user['date_created']; ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('date_created'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Edit Data</button>
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
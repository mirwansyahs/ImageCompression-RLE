<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Form Edit Role
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('admin/edit/' . $id); ?>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control" id="role"
                                value="<?= $user_role['role'] ?>">
                            <small class="form-text text-danger"><?= form_error('role'); ?></small>
                        </div>
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
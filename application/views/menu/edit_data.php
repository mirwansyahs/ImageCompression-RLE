<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Form Edit Data Sub Menu Management
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('menu/edit_data/' . $id); ?>
                        <div class="form-group">
                            <label for="menu_id">Menu</label>
                            <input type="text" name="menu_id" class="form-control" id="menu_id">
                            <small class="form-text text-danger"><?= form_error('menu_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                            <small class="form-text text-danger"><?= form_error('title'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" id="url">
                            <small class="form-text text-danger"><?= form_error('url'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" name="icon" class="form-control" id="icon">
                            <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                        </div>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah
                        Data</button>
                    <input type="button" value="Kembali" class="btn btn-warning float-right mx-2"
                        onclick="history.back();"></input>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
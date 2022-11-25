<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data User
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $detailuser['name'] ?></h5>
                    <p class="card-text"><?= $detailuser['email'] ?></p>
                    <p class="card-text"><img src="<?= base_url('assets/img/profile/') . $detailuser['image']; ?>"
                            class="card-img"></p>
                    <!-- <p class=" card-text"><?= $detailuser['password'] ?></p> -->
                    <p class="card-text"><?= $detailuser['role_id'] ?></p>
                    <p class="card-text"><?= $detailuser['date_created'] ?></p>
                    <a href="<?= base_url(); ?>data/user" class="btn btn-warning float-right">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
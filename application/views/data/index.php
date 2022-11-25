<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newdatakecelakaan"><i
            class="fas fa-plus"></i> Add New Data Kecelakaan</a>
    <a href="<?php echo base_url('Data/print') ?>" class="btn btn-warning mb-3"><i class="fas fa-file-pdf"></i>
        Export</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kecelakaan</h6>
        </div>
        <?php if (empty($datakecelakaan)) : ?>
        <div class="alert alert-danger" role="alert"> Data Kecelakaan Tidak Ditemukan.</div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope=" col">#</th>
                            <th scope="col">Nama Pendata</th>
                            <!-- <th scope="col">Kode</th> -->
                            <th scope="col">Jenis Kecelakaan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Korban</th>
                            <th scope="col">Detail Korban</th>
                            <th scope="col">Nama Korban</th>
                            <th scope="col">Nama Saksi</th>
                            <th scope="col">Detail Kecelakaan</th>
                            <th scope="col">Alamat Kecelakaan</th>
                            <th scope="col">Bukti 1</th>
                            <th scope="col">Bukti 2</th>
                            <!-- <th scope="col">Bukti 3</th> -->
                            <!-- <th scope="col">Bukti 4</th> -->
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datakecelakaan as $dk) :
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
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
                            <td><img src="<?= base_url('/') . $dk['bukti1']; ?>" class="card-img">
                            </td>
                            <td><img src="<?= base_url('/') . $dk['bukti2']; ?>" class="card-img">
                            </td>
                            <!-- <td><img src="<?= base_url('/') . $dk['bukti3']; ?>" class="card-img">
                            </td> -->
                            <!-- <td><img src="<?= base_url('/') . $dk['bukti4']; ?>"
                                    class="card-img">
                            </td> -->
                            <td>
                                <a href="<?= base_url(); ?>data/detail/<?= $dk['id']; ?>" class="badge badge-warning"><i
                                        class="fas fa-info-circle"></i> Detail</a>
                                <a href="<?= base_url(); ?>data/edit/<?= $dk['id']; ?>" class="badge badge-success"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url(); ?>data/hapus/<?= $dk['id']; ?>" class="badge badge-danger"
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
            <form action="<?= base_url('Data/tambah'); ?>" method="post" enctype="multipart/form-data">
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
                            placeholder="Detail Korban Kecelakaan">
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
                    <!-- <div class="row">
                        <div class="col-12 text-center">
                            <video id="video" style="width: 256px;" autoplay></video>
                            <canvas id="canvas" style="display: none;"></canvas>
                        </div>
                        <button type="button" class="btn btn-primary mr-3" id="ambil">Ambil Gambar</button>
                        <button type="button" class="btn btn-primary mr-3" id="ulang"
                            style="display: none;">Ulangi</button>
                    </div> -->
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
                    <!-- <div class="row">
                        <div class="col-12 text-center">
                            <video id="video" style="width: 256px;" autoplay></video>
                            <canvas id="canvas" style="display: none;"></canvas>
                        </div>
                        <button type="button" class="btn btn-primary mr-3" id="ambil">Ambil Gambar</button>
                        <button type="button" class="btn btn-primary mr-3" id="ulang"
                            style="display: none;">Ulangi</button>
                    </div> -->
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
                    <!-- <div class="row">
                        <div class="col-12 text-center">
                            <video id="video" style="width: 256px;" autoplay></video>
                            <canvas id="canvas" style="display: none;"></canvas>
                        </div>
                        <button type="button" class="btn btn-primary mr-3" id="ambil">Ambil Gambar</button>
                        <button type="button" class="btn btn-primary mr-3" id="ulang"
                            style="display: none;">Ulangi</button>
                    </div> -->
                    <!-- <div class="form">
                        <div class="col">Bukti 4</div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti4" name="bukti4">
                                        <label class="custom-file-label" for="bukti4">Choose file</label>
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

<script>
// var video = document.querySelector("#video");
// let click_button = document.querySelector("#ambil");
// let ulangi = document.querySelector("#ulang");
// let canvas = document.querySelector("#canvas");
// var width = 0;
// var height = 0;

// click_button.addEventListener('click', function() {
//     let video = document.querySelector("#video");
//     canvas.style.display = "inline";
//     width = video.offsetWidth;
//     height = video.offsetHeight;
//     video.style.display = "none";
//     click_button.style.display = "none";
//     ulangi.style.display = "";
//     canvas.width = width;
//     canvas.height = height;
//     ctx = canvas.getContext('2d');
//     canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

//     let result = [];
//     for (let y = 0; y < canvas.height; y++) {
//         result.push([]);
//         for (let x = 0; x < canvas.width; x++) {
//             let data = ctx.getImageData(x, y, 1, 1).data;
//             result[y].push(data[0]);
//         }
//     }

//     console.log(result[0]);

//     console.log(encode(result[0]));

//     console.log(decode(encode(result[0])));

// });

// ulangi.addEventListener('click', function() {
//     let video = document.querySelector("#video");
//     canvas.style.display = "none";
//     video.style.display = "";
//     click_button.style.display = "";
//     ulangi.style.display = "none";
// });

// // minta izin user
// navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||
//     navigator.msGetUserMedia || navigator.oGetUserMedia;

// // jika user memberikan izin
// if (navigator.getUserMedia) {
//     // jalankan fungsi handleVideo, dan videoError jika izin ditolak
//     navigator.getUserMedia({
//         audio: false,
//         video: true,
//         // video: {
//         //     facingMode = {
//         //         exact: "environment"
//         //     }
//         // }
//     }, handleVideo, videoError);
// }

// // fungsi ini akan dieksekusi jika  izin telah diberikan
// function handleVideo(stream) {
//     video.srcObject = stream;
// }

// // fungsi ini akan dieksekusi kalau user menolak izin
// function videoError(e) {
//     // do something
//     alert("Izinkan menggunakan webcam!");
// }

// function onImageChange(event) {
//     const imageFile = URL.createObjectURL(event.target.files[0]);
//     createImage(imageFile, convertImage);
// }

// function createImage(imageFile, callback) {
//     const image = document.createElement('img');
//     image.onload = () => callback(image);
//     image.setAttribute('src', imageFile);
// }

// function convertImage(image) {
//     const canvas = drawImageToCanvas(image);
//     const ctx = canvas.getContext('2d');

//     let result = [];
//     for (let y = 0; y < canvas.height; y++) {
//         result.push([]);
//         for (let x = 0; x < canvas.width; x++) {
//             let data = ctx.getImageData(x, y, 1, 1).data;
//             result[y].push(data[0]);
//             result[y].push(data[1]);
//             result[y].push(data[2]);
//         }
//     }

//     console.log(result);

//     console.log(result[0]);
//     console.log(encode(result[0]));
//     console.log(decode(encode(result[0])));
// }

// function drawImageToCanvas(image) {
//     const canvas = document.createElement('canvas');
//     canvas.width = image.width;
//     canvas.height = image.height;
//     canvas.getContext('2d').drawImage(image, 0, 0, image.width, image.height);
//     return canvas;
// }

// function convertArray(array) {
//     return JSON.stringify(array);
// }

// function encode(arr) {
//     let encoding = [],
//         previous,
//         count;

//     for (count = 1, previous = arr[0], i = 1; i < arr.length; i++) {
//         if (arr[i] !== previous) {
//             encoding.push(count, previous);
//             count = 1;
//             previous = arr[i];
//         } else {
//             count++;
//         }
//     }

//     /**
//      * Add a last pair
//      */
//     encoding.push(count, previous);

//     return encoding;
// }

// function decode(encoded) {
//     let uncompressed = [];

//     /**
//      * Create a new array with decoded data
//      */
//     encoded.map((element, ind) => {
//         if (ind % 2 === 0) {
//             uncompressed.push(...Array(element).fill(encoded[ind + 1]));
//         }
//     });

//     return uncompressed;
// }
</script>
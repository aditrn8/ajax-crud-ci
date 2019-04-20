<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/jquery.dataTables.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/dataTables.bootstrap4.css' ?>">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>CRUD Dasar With AJAX | Aditya Ridwan Nugraha
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add">Tambah Data Gan!</a></div>
                </h1>
            </div>
            <table class="table table-striped" id="myData">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="show_data">

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <form>
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru Gan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Barang</label>
                            <div class="col-md-10">
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukin Nama Barang nya gan!" value="<?= set_value('nama_barang') ?>" required>
                                <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Jumlah</label>
                            <div class="col-md-10">
                                <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" placeholder="Masukin Jumlah nya Gan!" value="<?= set_value('jumlah_barang') ?>">
                                <?= form_error('jumlah_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Keterangan</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="keterangan_barang" id="keterangan_barang" cols="30" rows="10" placeholder="Jangan lupa masukin keterangannya gan"><?= set_value('keterangan_barang') ?></textarea>
                                <?= form_error('keterangan_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="batal">Batalin gan!</button>
                        <button type="button" type="submit" id="btn_save" class="btn btn-primary">Simpen Gan!</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal Tambah Data -->

    <!-- Modal Edit Data -->
    <form>
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Barang Gan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="hidden" name="id_barang_edit" id="id_barang_edit" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Barang</label>
                            <div class="col-md-10">
                                <input type="text" name="nama_barang" id="nama_barang_edit" class="form-control" placeholder="Masukin Nama Barang nya gan!">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Jumlah</label>
                            <div class="col-md-10">
                                <input type="number" name="jumlah_barang" id="jumlah_barang_edit" class="form-control" placeholder="Masukin Jumlah nya Gan!">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Keterangan</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="keterangan_barang_edit" id="keterangan_barang_edit" cols="30" rows="10" placeholder="Jangan lupa masukin keterangannya gan"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="batal">Batalin gan!</button>
                        <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update Gan!</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal Edit Data -->

    <!--Modal Hapus-->
    <form>
        <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Yakin mau di hapus gan?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Enggak Gan!</button>
                        <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yoi Gan!</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Modal Hapus-->
    </div>
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.2.1.js' ?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.dataTables.js' ?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/js/dataTables.bootstrap4.js' ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() { //Buat awalan biar syntak ajax bisa dijalan kan
            tampil_barang(); // Function tampil kan semua barang dari tb_barang

            $('#myData').dataTable();

            function tampil_barang() {
                $.ajax({
                    type: 'ajax', //Karena kita akan membuat ajax, type itu wajib kita isi
                    url: '<?= site_url('barang/data_barang') ?>', // untuk meload localhost/ajax-practice-1/barang/data_barang
                    async: false,
                    dataType: 'json', // Untuk me load data json dari controller tadi yg kita return
                    success: function(data) { // 'data' itu dapat dari json yg kita encode menjadi data
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].id_barang + '</td>' +
                                '<td>' + data[i].nama_barang + '</td>' +
                                '<td>' + data[i].jumlah_barang + '</td>' +
                                '<td>' + data[i].keterangan_barang + '</td>' +
                                '<td style="text-align:right">' +
                                '<a href="javascript:void(0);" class="btn btn-warning item_edit btn-sm" data-id_barang="' + data[i].id_barang + '" data-nama_barang="' + data[i].nama_barang + '" data-jumlah_barang="' + data[i].jumlah_barang + '" data-keterangan_barang="' + data[i].keterangan_barang + '">Edit</a>' + ' ' +
                                '<a href="javascript:void(0);" class="btn btn-danger item_hapus btn-sm" data-id_barang="' + data[i].id_barang + '">Hapus</a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                    }
                });
            }

            // Ini buat save
            $('#btn_save').on('click', function() {
                var nama_barang = $('#nama_barang').val();
                var jumlah_barang = $('#jumlah_barang').val();
                var keterangan_barang = $('#keterangan_barang').val();
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('barang/save_barang') ?>',
                    dataType: 'JSON',
                    data: {
                        nama_barang: nama_barang,
                        jumlah_barang: jumlah_barang,
                        keterangan_barang: keterangan_barang,
                    },
                    success: function(data) {
                        $('#nama_barang').val("");
                        $('#jumlah_barang').val("");
                        $('#keterangan_barang').val("");
                        $('#Modal_Add').modal('hide');
                        tampil_barang();
                    }
                });
                return false;
            });

            // ini buat batal, biar datanya hilang kalo dipencet "Batalin Gan"
            $('#batal').on('click', function() {
                $('#nama_barang').val("");
                $('#jumlah_barang').val("");
                $('#keterangan_barang').val("");
                $('#Modal_Add').modal('hide');
                tampil_barang();
            });

            // ini buat batal, biar datanya hilang kalo dipencet "x"
            $('#close').on('click', function() {
                $('#nama_barang').val("");
                $('#jumlah_barang').val("");
                $('#keterangan_barang').val("");
                $('#Modal_Add').modal('hide');
                tampil_barang();
            });

            // buat modal delete
            $('#show_data').on('click', '.item_hapus', function() {
                var id = $(this).data('id_barang');

                $('#Modal_Delete').modal('show');
                $('#id_delete').val(id);
            });

            //buat jalanin fungsi delete si modal
            $('#btn_delete').on('click', function() {
                var id_barang = $('#id_delete').val();
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('barang/delete_barang') ?>',
                    dataType: 'JSON',
                    data: {
                        id_barang: id_barang
                    },
                    success: function(data) {
                        $('#id_delete').val("");
                        $('#Modal_Delete').modal('hide');
                        tampil_barang();
                    }
                });
                return false;
            });
            //buat modal edit
            $('#show_data').on('click', '.item_edit', function() {
                var id_barang = $(this).data('id_barang');
                var nama_barang = $(this).data('nama_barang');
                var jumlah_barang = $(this).data('jumlah_barang');
                var keterangan_barang = $(this).data('keterangan_barang');

                $('#Modal_Edit').modal('show');

                $('#id_barang_edit').val(id_barang);
                $('#nama_barang_edit').val(nama_barang);
                $('#jumlah_barang_edit').val(jumlah_barang);
                $('#keterangan_barang_edit').val(keterangan_barang);
            });

            $('#btn_update').on('click', function() {
                var id_barang = $('#id_barang_edit').val();
                var nama_barang = $('#nama_barang_edit').val();
                var jumlah_barang = $('#jumlah_barang_edit').val();
                var keterangan_barang = $('#keterangan_barang_edit').val();
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('barang/update_barang') ?>',
                    dataType: "JSON",
                    data: {
                        id_barang: id_barang,
                        nama_barang: nama_barang,
                        jumlah_barang: jumlah_barang,
                        keterangan_barang: keterangan_barang
                    },
                    success: function(data) {
                        $('#id_barang').val("");
                        $('#nama_barang_edit').val("");
                        $('#jumlah_barang_edit').val("");
                        $('#keterangan_barang_edit').val("");
                        $('#Modal_Edit').modal('hide');
                        tampil_barang();
                    }
                });
                return false;
            });
        });
    </script>

</html>
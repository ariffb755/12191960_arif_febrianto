<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">

        <?php foreach ($buku as $b) { ?>
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/books/') . $b->gambar; ?>" width="180" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        Title<li class="list-group-item"><?= $b->judul_buku; ?></li>
                        Category<li class="list-group-item"><?= $b->nama_kategori; ?></li>
                        Author<li class="list-group-item"><?= $b->pengarang; ?></li>
                        Publication Year<li class="list-group-item"><?= $b->thn_terbit; ?></li>
                        ISBN<li class="list-group-item"><?= $b->isbn; ?></li>
                        Location<li class="list-group-item"><?= $b->lokasi; ?></li>
                        Book Status<li class="list-group-item"><?php
                                                                if ($b->status_buku == "1") {
                                                                    echo "<span style='border-radius: 50px;' class='btn btn-success btn-xs'>Available</span>";
                                                                } else if ($b->status_buku == "0") {
                                                                    echo "<span style='border-radius: 50px;' class='btn btn-warning btn-xs'>On Borrowing</span>";
                                                                }
                                                                ?></li>
                    </ul>

                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="goBack()">Back</button>
    </div><?php } ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModal">Book Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <?php foreach ($buku as $b) { ?>
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/books/') . $b->gambar; ?>" width="180" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Title = <?= $b->judul_buku; ?></li>
                                        <li class="list-group-item">Category = <?= $b->nama_kategori; ?></li>
                                        <li class="list-group-item">Pengarang = <?= $b->pengarang; ?></li>
                                        <li class="list-group-item">Tahun Terbit = <?= $b->thn_terbit; ?></li>
                                        <li class="list-group-item">ISBN = <?= $b->isbn; ?></li>
                                        <li class="list-group-item">Location = <?= $b->lokasi; ?></li>
                                        <li class="list-group-item">Status = <?php
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="document.location.reload(true)">Tutup</button>
            </div><?php } ?>

        </div>
    </div>
</div>
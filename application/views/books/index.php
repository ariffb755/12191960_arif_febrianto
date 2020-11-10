<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="table-datatable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Option</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($buku as $b) {
                ?>
                    <tr>
                        <td scope="row"><?= $no++; ?></td>
                        <td><img src="<?= base_url('assets/img/books/') . $b->gambar; ?>" width="80" alt="Cover Buku"></td>
                        <td><?= $b->judul_buku; ?></td>
                        <td><?= $b->lokasi; ?></td>
                        <td>
                            <?php
                            if ($b->status_buku == "1") {
                                echo "<span style='border-radius: 50px;' class='btn btn-success btn-xs'>Available</span>";
                            } else if ($b->status_buku == "0") {
                                echo "<span style='border-radius: 50px;' class='btn btn-warning btn-xs'>On Borrowing</span>";
                            }
                            ?>
                        </td>
                        <td nowrap="nowrap">
                            <a class="btn btn-success btn-xs" href="<?= base_url('admin/detail_buku/') . $b->id_buku; ?>" data-toggle="modal" data-target="#newMenuModal"><span class="fas fa-search-plus"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- modal -->
    <div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModal">Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
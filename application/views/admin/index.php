<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-sm-6">
            <div class="card border-primary">
                <div class="card-body">
                    <h1 class="card-title"><?= $this->db->get('buku')->num_rows(); ?></h1>
                    <p class="card-text">Number of books registered</p>
                    <a href="#" class="btn btn-primary">View Details <span class="fa fa-arrow-right"></span></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card border-primary">
                <div class="card-body">
                    <h1 class="card-title"><?= $this->db->get('user')->num_rows(); ?></h1>
                    <p class="card-text">Number of registered members</p>
                    <a href="#" class="btn btn-primary">View Details <span class="fa fa-arrow-right"></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 mt-4">
            <div class="card border-primary">
                <div class="card-body">
                    <h1 class="card-title"><?= $this->db->get_where('transaksi', array('status_peminjaman' => 0))->num_rows(); ?></h1>
                    <p class="card-text">The loan is not finished</p>
                    <a href="#" class="btn btn-primary">View Details <span class="fa fa-arrow-right"></span></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-4">
            <div class="card border-primary">
                <div class="card-body">
                    <h1 class="card-title"><?= $this->db->get_where('transaksi', array('status_peminjaman' => 1))->num_rows(); ?></h1>
                    <p class="card-text">Borrowing is complete ok</p>
                    <a href="#" class="btn btn-primary">View Details <span class="fa fa-arrow-right"></span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- list -->
    <div class="row">

        <div class="card border-primary mb-3 mt-4 ml-3" style="max-width: 24rem;">
            <div class="card-header">Books</div>
            <div class="card-body text-primary">
                <?php foreach ($buku as $b) { ?>
                    <a href="#" class="list-group-item">
                        <?php if ($b->status_buku == 1) {
                            echo "<span class='badge badge-success'>Available";
                        } else {
                            echo "<span class='badge badge-warning'>On Borrowing";
                        } ?></span>
                        <i class="glyphicon glyphicon-book"></i><?= $b->judul_buku; ?>
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="card border-primary mb-3 mt-4 ml-4" style="max-width: 18rem;">
            <div class="card-header">User Registered</div>
            <div class="card-body text-primary">
                <?php foreach ($anggota as $a) { ?>
                    <a href="#" class="list-group-item">
                        <span class="badge"><?= $a->gender; ?></span>
                        <i class="glyphicon glyphicon-user"></i><?= $a->name; ?>
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="card border-primary mb-3 mt-4 ml-4" style="max-width: 26rem;">
            <div class="card-header">Final Borrowings</div>
            <div class="card-body text-primary">
                <div class="table-responsive">
                    <table class="tabel table-bordered tablehover table-striped">
                        <thead>
                            <tr>
                                <th>Transaction Date</th>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th>Total Fines</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($transaksi as $p) {
                            ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($p->tgl_pencatatan)); ?></td>
                                    <td><?= date('d/m/Y', strtotime($p->tgl_pinjam)); ?></td>
                                    <td><?= date('d/m/Y', strtotime($p->tgl_kembali)); ?></td>
                                    <td><?= "Rp. " . number_format($p->total_denda) . " ,-"; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
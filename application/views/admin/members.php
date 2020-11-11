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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($users as $u) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><img src="<?= base_url('assets/img/profile/') . $u->image; ?>" width="80" alt="Cover Buku"></td>
                        <td><?= $u->name; ?></td>
                        <td><?= $u->email; ?></td>
                        <td><?= $u->gender; ?></td>
                        <td><?= $u->phone; ?></td>
                        <td><?= $u->address; ?></td>
                        <td nowrap="nowrap">
                            <a class="btn btn-success btn-xs" href="http://wa.me/<?= $u->phone; ?>"><span class="fab fa-whatsapp"></span></a>
                            <a class="btn btn-danger btn-xs" href="<?= base_url('admin/deleteMember/') . $u->id; ?>"><span class="fas fa-trash-alt"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
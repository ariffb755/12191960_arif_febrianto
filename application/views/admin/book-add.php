<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/addbookaction'); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Category</label>
                <select name="id_kategori" class="form-control">
                    <option value="">--Select Category--</option>
                    <?php foreach ($kategori as $k) { ?>
                        <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                    <?php } ?>
                </select>
                <?= form_error('id_kategori', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <label>Book Title</label>
                <input type="text" name="judul_buku" id="judul_buku" class="form-control">
                <?= form_error('judul_buku', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <label>Author</label>
                <input type="text" name="pengarang" id="pengarang" class="form-control">
                <?= form_error('pengarang', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <label>Publication Year</label>
                <input type="date" name="thn_terbit" id="thn_terbit" class="form-control">
                <?= form_error('thn_terbit', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <label>Publisher</label>
                <input type="text" name="penerbit" id="penerbit" class="form-control">
                <?= form_error('penerbit', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <label>ISBN</label>
                <input type="text" name="isbn" id="isbn" class="form-control">
                <?= form_error('isbn', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <label>Number of Books</label>
                <input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control" min="0">
                <?= form_error('jumlah_buku', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <label>Location</label>
                <select name="lokasi" id="lokasi" class="form-control">
                    <option value="Rak 1">Rak 1</option>
                    <option value="Rak 2">Rak 2</option>
                    <option value="Rak 3">Rak 3</option>
                </select>
            </div>

            <div class="form-group">
                <label>Cover</label>
                <input type="file" name="foto" id="foto" class="form-control">
                <?= form_error('foto', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <label>Book Status</label>
                <select name="status_buku" id="status_buku" class="form-control">
                    <option value="1">Available</option>
                    <option value="0">On Borrowing</option>
                </select>
                <?= form_error('status_buku', '<p style="color:red;">', '</p>'); ?>
            </div>

            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary">
                <input type="reset" value="Reset" class="btn btn-danger">
            </div>

        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<div class="constraint">
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>

    <!-- card untuk tambah data -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Silahkan tambah data
                </div>
                <div class="card-body">
                    <form action="<?= base_url('home/tambahData'); ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?= set_value('address'); ?>">
                            <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url(); ?>" class="btn btn-success float-left" type="submit" name="submit">Kembali</a>
                        <button class="btn btn-primary float-right" type="submit" name="submit">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir card -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
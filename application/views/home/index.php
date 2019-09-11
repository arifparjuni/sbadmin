<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Of Data</h1>
    <?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data<strong> berhasil!</strong> <?= $this->session->flashdata('message'); ?><button type="button" class="close" data-dismiss="alert" arial-label="Close">
            <span arial-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <a href="<?= base_url('home/tambahData'); ?>" class="btn btn-primary mb-3">Tambah Data</a>

    <!-- table -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peoples as $p) : ?>
            <tr>
                <th scope="row"><?= ++$start; ?></th>
                <td><?= $p['name']; ?></td>
                <td><?= $p['email']; ?></td>
                <td>
                    <a href="<?= base_url('home/detailData/') . $p['id']; ?>" class="badge badge-warning">Detail</a>
                    <a href="<?= base_url('home/editData/') . $p['id']; ?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url('home/deleteData/') . $p['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin mau didelete?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->pagination->create_links(); ?>
    <!-- akhir table -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
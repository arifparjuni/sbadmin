<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- card untuk detail data -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detail Data
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Name :</b> <?= $peoples['name']; ?></li>
                        <li class="list-group-item"><b>Email :</b> <?= $peoples['email']; ?></li>
                        <li class="list-group-item"><b>Address :</b> <?= $peoples['address']; ?></li>
                        <li class="list-group-item"><a href="<?= base_url('home'); ?>" class="btn btn-primary float-right">Kembali</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir card -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
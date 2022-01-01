<div class="container">
    <div class="my-5">

        <div class="row">
            <div class="col-12 col-md-7 mx-auto">
                <h5><?= $title; ?></h5>
                <form action="<?= base_url('customer/add') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kontak</label>
                        <input type="text" name="kontak" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2"></textarea>
                    </div>
                             
                    <div class="form-group">
                        <label for="">Type Diskon</label>
                        <select name="type_diskon" class="form-control">
                            <option value="1">Persentase %</option>
                            <option value="2">Fix</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Foto KTP</label>
                        <input type="file" name="foto_ktp" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
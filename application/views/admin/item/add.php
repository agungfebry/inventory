<div class="container">
    <div class="my-5">

        <div class="row">
            <div class="col-12 col-md-7 mx-auto">
            <h5><?=$title;?></h5>
                <form action="<?= base_url('item/add') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Item</label>
                        <input type="text" name="nama_item" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Unit</label>
                        <select name="unit" class="form-control">
                            <option value="1">Kg</option>
                            <option value="2">Pcs</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="stock" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Harga Satuan</label>
                        <input type="number" name="harga" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="images" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="my-5">
        <div class="row">
            <div class="col-12 col-md-7 mx-auto">
                <h5><?= $title; ?></h5>

                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $item['id']; ?>">
                    <div class="form-group">
                        <label for="">Nama Item</label>
                        <input type="text" name="nama_item" value="<?=$item['nama_item'] ? $item['nama_item'] : set_value('nama_item')?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Unit</label>
                        <select name="unit" class="form-control">
                            <option value="1" <?=$item['unit']==1 ? 'selected' : '';?>>Kg</option>
                            <option value="2" <?=$item['unit']==2 ? 'selected' : '';?>>Pcs</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="stock" value="<?=$item['stock'] ? $item['stock'] : set_value('stock');?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Harga Satuan</label>
                        <input type="number" name="harga" value="<?=$item['harga'] ? $item['harga'] : set_value('harga');?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="images" class="form-control">
                        <img src="<?=base_url('uploads/item/'.$item['images'])?>" width="100" class="mt-2">
                        <br>
                        <span class="badge badge-success"><?=$item['images'];?></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
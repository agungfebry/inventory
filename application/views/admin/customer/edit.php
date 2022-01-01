<div class="container">
    <div class="my-5">

        <div class="row">
            <div class="col-12 col-md-7 mx-auto">
                <h5><?= $title; ?></h5>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$customer['id'];?>">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="<?= isset($customer['nama']) ? $customer['nama'] : set_value('nama');?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="<?= isset($customer['kontak']) ? $customer['kontak'] : set_value('kontak');?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= isset($customer['email']) ? $customer['email'] : set_value('email');?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2"><?= isset($customer['alamat']) ? $customer['alamat'] : set_value('alamat');?></textarea>
                    </div>
                             
                    <div class="form-group">
                        <label for="">Type Diskon</label>
                        <select name="type_diskon" class="form-control">
                            <option value="1" <?=$customer==1 ? 'selected' : '';?> >Persentase %</option>
                            <option value="2" <?=$customer==2 ? 'selected' : '';?>>Fix</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Foto KTP</label>
                        <input type="file" name="foto_ktp" class="form-control">
                        <img src="<?=base_url('uploads/customer/'.$customer['foto_ktp']);?>" class="mt-2" width="100" alt=""> <br>
                        <span class="badge badge-success"><?= $customer['foto_ktp'];?></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
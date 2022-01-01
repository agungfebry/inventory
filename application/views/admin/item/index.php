<div class="container">
    <div class="my-5">

        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>


        <a href="<?= base_url('item/add') ?>" class="btn btn-success">+ Add New Item</a>
        <table class="table table-bordered table-sm mt-3">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Item</th>
                    <th>Unit</th>
                    <th>Stock</th>
                    <th>Harga Satuan</th>
                    <th>Image</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($item as $val) : ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $val['nama_item']; ?></td>
                        <td><?= $val['unit']; ?></td>
                        <td><?= $val['stock']; ?></td>
                        <td>Rp. <?= $val['harga']; ?></td>
                        <td class="text-center"><img src="<?= base_url('uploads/item/' . $val['images']) ?>" width="100" alt=""></td>
                        <td width="15%" class="text-center">
                            <a href="<?= base_url('item/edit/' . $val['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('item/delete/' . $val['id']); ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="container">
    <div class="my-5">

        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>


        <a href="<?= base_url('customer/add') ?>" class="btn btn-success">+ Add New Customer</a>
        <table class="table table-bordered table-sm mt-3">
            <thead class="text-center">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Type Diskon</th>
                    <th>KTP</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($customer as $val) : ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $val['nama']; ?></td>
                        <td><?= $val['kontak']; ?></td>
                        <td><?= $val['email']; ?></td>
                        <td><?= $val['alamat']; ?></td>
                        <td><?= $val['type_diskon']==1 ? 'Persentase %' : 'Fix'; ?></td>
                        <td class="text-center"><img src="<?= base_url('uploads/customer/' . $val['foto_ktp']) ?>" width="100" alt=""></td>
                        <td width="15%" class="text-center">
                            <a href="<?= base_url('customer/edit/' . $val['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('customer/delete/' . $val['id']); ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
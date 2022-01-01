<div class="container">
    <div class="my-5">

        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>


        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="">Kode Transaksi</label>
                    <input type="text" class="form-control" value="Order-<?= date('ymdhis') ?>" readonly name="kode_transaksi">
                </div>
                <div class="form-group mb-3">
                    <label for="">Customer</label>
                    <select name="customer" class="form-control">
                        <?php foreach ($cs as $customer) : ?>
                            <option value="<?= $customer['id'] ?>"><?= $customer['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Tanggal</label>
                    <input type="text" class="form-control" value="<?= date('d-m-Y') ?>" name="tanggal" readonly>
                </div>
                <hr>
                <input type="text" class="form-control" id="get_item" placeholder="Cari barang...">
                <ul name="" class="list-unstyled px-2" id="value_item"></ul>
                <table class="table mt-3 bordered border-0">
                    <tbody id="isi">

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">Total Diskon</td>
                            <td><input type="number" name="total_diskon" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Total Belanja</td>
                            <td><input type="number"  id="grand_total" name="grand_total" class="form-control"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#get_item').keyup(function() {
            $('#value_item').html('');

            let nama_item = $('#get_item').val();

            $.ajax({
                url: '<?= base_url('sales/get_item/') ?>',
                type: 'POST',
                cache: false,
                data: {
                    nama_item: nama_item
                },
                success: function(res) {
                    $.each(JSON.parse(res), function(key, value) {
                        $('#value_item').append(`
                            <li class="py-1" id="get_detail_item" value="` + value.id + `" style="cursor:pointer">` + value.nama_item + `</li>
                        `);
                        $('#value_item').show();
                    });
                }
            });
        });

        $(document).on('click', 'li', function() {
            let id = $(this).val();
            let html = '';
            var total_belanja = '';
            var total = '';

            $.ajax({
                url: '<?= base_url('sales/get_item_detail/'); ?>',
                data: {
                    id: id
                },
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    $('#value_item').hide();
                    $('#get_item').val('');
                    html += `<tr>
                            <td><button class="btn btn-sm btn-danger text-center" id="remove_item">x</button></td>
                            <td>
                                <input type="text" class="form-control" value="` + res.nama_item + `" placeholder="Nama Barang" readonly>
                            </td>
                            <td width="20%">
                                <input type="number" class="form-control" value="` + res.harga + `" placeholder="Harga" readonly>
                            </td>
                            <td width="20%">
                                <input type="number" class="form-control" id="qty" name="qty" placeholder="jumlah qty">
                            </td>
                            <td width="20%">
                                <input type="number" class="form-control" name="disc" placeholder="jumlah diskon">
                            </td>`;

                    $(document).on('keyup', '#qty', function() {
                        $('#grand_total').val('');
                        var ss = res.harga * $('#qty').val();

                        $('input[name=total_belanja]').val(ss);
                        total += total + ss;
                        $('#grand_total').val(total);

                    });

                    html += `
                            <td width="20%">
                            <input type="number" class="form-control" name="total_belanja" id="total" value="" placeholder="Rp. " readonly>
                            </td>`;
                    `</tr>`;
                    $('#isi').append(html);
                }

            });
            $(document).on('click', '#remove_item', function() {
                $(this).closest('tr').remove();
            });

        });
    });
</script>
<div class="container-fluid">
    <h4 style="color: black;">Keranjang Belanja</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr style="text-align: center; color:white; background-color:#0076D2;" >
            <th>Nomor</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
            <th>Action</th>
        </tr>

        <?php
        $no = 1;
        foreach ($keranjang as $k) : ?>
            <tr style="background-color: white; text-align:center; color:black;">
                <td><?php echo $no++ ?></td>
                <td><?php echo $k['nama_produk'] ?></td>
                <td><?php echo $k['jumlah'] ?></td>
                <td align="right">Rp. <?php echo number_format($k['harga_produk'], 0, ',', '.') ?></td>
                <td align="right">Rp. <?php echo number_format($k['total_harga'], 0, ',', '.') ?></td>  
                <td>
                    <a href="<?php echo base_url('tampilan_user/hapus_keranjang/').$k['id_keranjang']?>" style="color:white;">
                    <div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></a>
                </td>          
            </tr>
        <?php endforeach; ?>
    </table>

    <div align="right">
        <a href="<?php echo base_url('tampilan_user/home') ?>">
            <div class="btn btn-sm btn-primary">Lanjutkan Belanja</div>
        </a>
        <a href="<?php echo base_url('tampilan_user/pembayaran') ?>">
            <div class="btn btn-sm btn-success">Pembayaran</div>
    </div>

</div>
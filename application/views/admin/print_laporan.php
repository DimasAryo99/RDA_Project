<div class="container-fluid">
    <div class="card-body">
        <div class="table text-gray-900">
            <table class="table table-bordered text-gray-900" id="table1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        ?>
                    <?php foreach ($datafilter as $row): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->tgl_pesan; ?></td>
                        <td><?php echo $row->nama_toko; ?></td>
                        <td>Rp. <?php echo number_format($row->Pendapatan, 0,',','.') ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo form_close(); ?>
            <br><br>
        </div>
    </div>
</div>
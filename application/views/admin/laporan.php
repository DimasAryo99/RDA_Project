<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <h5 class="card-header">Filter By Tanggal</h5>
            <div class="card-body">
                <form action="<?php echo base_url(); ?>Superadmin/filter" method="POST" target='_blank'>
                    <input type="hidden" name="nilai" value="1">
                    <b>Tanggal Awal</b><br>
                    <input type="date" name="awal" required=""><br>

                    <br> <b>Tanggal Akhir</b><br>
                    <input type="date" name="akhir" required=""><br><br> <br>
                    <input class="btn btn-primary" type="submit" value="Print"><br>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <h5 class="card-header">Filter By Bulan</h5>
            <div class="card-body">
                <form action="<?php echo base_url(); ?>Superadmin/filter" method="POST" target='_blank'>
        
                    <input type="hidden" name="nilai" value="2">

                    <b>Pilih Tahun</b>
                    <select name="tahun1" required="">
                        <?php foreach($tahun as $row): ?>
                            <option value="<?php echo $row->Tahun ?>"><?php echo $row->Tahun ?></option>
                        <?php endforeach ?>
                    </select>

                    <br> <br> <b>Bulan Awal</b> <br>
                    <select name="bulanawal" required="">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select> <br>

                    <br> <b>Bulan Akhir</b> <br>
                    <select name="bulanakhir" required="">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select> <br>

                    <br>
                    <input class="btn btn-primary" type="submit" value="Print"><br>
                </form>
            </div>
        </div>
    </div>
    
    
</div>

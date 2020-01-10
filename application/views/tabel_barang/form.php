<h1>Form Tambah Barang</h1>
<form action="<?php echo $action;?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="kode_barang" value="<?php echo $kode_barang?>">
        jenis_barang:<input type="teks" name="jenis_barang" value="<?php echo $jenis_barang; ?>"
        <?php echo form_error('jenis_barang', '<div class="invalid-feedback">', '</div>');?>><br>
        merk : <input type="teks" name="merk" value="<?php echo $merk;?>"
        <?php echo form_error('merk', '<div class="invalid-feedback">', '</div>');?>><br>
         model:<input type="teks" name="model" value="<?php echo $model; ?>"
        <?php echo form_error('model', '<div class="invalid-feedback">', '</div>');?>><br>
        warna : <input type="teks" name="warna" value="<?php echo $warna;?>"
        <?php echo form_error('warna', '<div class="invalid-feedback">', '</div>');?>><br>
         serialnumber:<input type="teks" name="serialnumber" value="<?php echo $serialnumber; ?>"
        <?php echo form_error('serialnumber', '<div class="invalid-feedback">', '</div>');?>><br>
        gambar : <input type="teks" name="gambar" value="<?php echo $gambar;?>"
        <?php echo form_error('gambar', '<div class="invalid-feedback">', '</div>');?>><br>
        deskripsi:<input type="teks" name="deskripsi" value="<?php echo $deskripsi; ?>"
        <?php echo form_error('deskripsi','<div class="invalid-feedback">', '</div>');?>><br>
        status : <input type="teks" name="status" value="<?php echo $status;?>"
        <?php echo form_error('status','<div class="invalid-feedback">', '</div>');?>><br>
        lokasi:<input type="teks" name="lokasi" value="<?php echo $lokasi; ?>"
        <?php echo form_error('lokasi','<div class="invalid-feedback">','</div>');?>><br>
<button type="submit"><?php echo $tombol;?></button>
</form>
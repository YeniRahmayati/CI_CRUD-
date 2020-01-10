<h1>List Tabel Barang</h1>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Barang</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Warna</th>
            <th>Serial Number</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Lokasi</th>
            <th><a href="<?= base_url();?>index.php/tabel_barang/add">Tambah Data</a></th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($tabel_barang as $baris){?>
        <tr>
            <td><?= $no++;?></td>
            <td><?= $baris->jenis_barang;?></td>
            <td><?= $baris->merk;?></td>
            <td><?= $baris->model;?></td>
            <td><?= $baris->warna;?></td>
            <td><?= $baris->serialnumber;?></td>
            <td><?= $baris->gambar;?></td>
            
            <td><?= $baris->deskripsi;?></td>
            <td><?= $baris->status;?></td>
            <td><?= $baris->lokasi;?></td>
            <td><a href="<?=site_url('tabel_barang/delete/').$baris->kode_barang?>">Hapus</a> <a href="<?=site_url('tabel_barang/update/').$baris->kode_barang?>">Ubah</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
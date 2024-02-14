<?php if ($_SESSION['role'] == 'Asisten') { ?>
    <div class="content">
    <div class="detail" style="margin-top:70px;">
        <h2><?= $data['detailTugas']['nama_tugas']; ?></h2>
        <p>Frekuensi : 
            <?php
            $namafrekuensi = $this->model('Tugas_model')->getFrekuensiById($data['detailTugas']['id_frekuensi']);
            echo $namafrekuensi['nama_frekuensi'];                        
            ?> 
        </p>
        <p>Tanggal Tugas : <?= $data['detailTugas']['tgl_tugas']; ?></p>
        <p>Deskripsi : </p>
        <textarea  style="font-family: poppins;font-size: 14px;border:3px solid;border-color:#51A8B1;border-radius:5px" name="detailTugas" id="" cols="200" rows="20" readonly><?= $data['detailTugas']['deskripsi_tugas']; ?></textarea>
        
        <div class="buttons" style="padding-left: 0px;">
            
        <button onclick="window.location.href='<?= BASEURL; ?>/Tugas/edit/<?= $data['detailTugas']['id_tugas']; ?>'">Edit</button>

        <a href="<?= BASEURL; ?>/tugas/index" class="kembali">Kembali</a>
        </div>
    
    </div>
</div>
<?php }?>

<?php if ($_SESSION['role'] == 'Administrator'|| $_SESSION['role'] == 'Praktikan') { ?>
    <div class="content">
        <div class="detail" style="margin-top:70px;" >
            <h2><?= $data['detailTugas']['nama_tugas']; ?></h2>
            <p>Frekuensi : 
                <?php
                $namafrekuensi = $this->model('Tugas_model')->getFrekuensiById($data['detailTugas']['id_frekuensi']);
                echo $namafrekuensi['nama_frekuensi'];                        
                ?> 
            </p>
            <p>Tanggal Tugas : <?= $data['detailTugas']['tgl_tugas']; ?></p>
            <p>Deskripsi : </p>
            <textarea  style="font-family: poppins;font-size: 14px;border:3px solid;border-color:#51A8B1;border-radius:5px" name="detailTugas" id="" cols="200" rows="20" readonly><?= $data['detailTugas']['deskripsi_tugas']; ?></textarea>
            <div class="buttons" style="padding-left: 0px;">
                <a href="<?= BASEURL; ?>/tugas/index" class="kembali">Kembali</a>
            </div>
        </div>
    </div>
<?php }?>


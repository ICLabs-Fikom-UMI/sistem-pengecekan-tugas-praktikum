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
        <p><?= $data['detailTugas']['deskripsi_tugas']; ?></p>
        <div class="buttons">
            <button onclick="submitFormById('tambahForm')">Edit</button>
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
            <p><?= $data['detailTugas']['deskripsi_tugas']; ?></p>
            <div class="buttons">
                <a href="<?= BASEURL; ?>/tugas/index" class="kembali">Kembali</a>
            </div>
        </div>
    </div>
<?php }?>

